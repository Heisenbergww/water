<?php

namespace app\modules\models;

use yii\db\ActiveRecord;
use Yii;
use Tool;
use Salt;

class Admin extends ActiveRecord
{
    public $rememberMe = true;
    public $repass;

    public static function tableName()
    {
        return "{{%admin}}";
    }

    public function attributeLabels()
    {
        return [
        'adminuser'=>'管理员账号',
        'adminemail'=>'管理员邮箱',
        'adminpass'=>'管理员密码',
        'repass'=>'确认密码',
        'createtime'=>'创建时间',
        ];
    }

    public function rules()
    {
         return[
         ['adminuser','required','message'=>'管理员账号不能为空','on'=>['login','seekpass','changepass','adminadd','changeemail','changepassword']],
         ['adminuser','unique','message'=>'管理员账号已被注册','on'=>['adminadd']],
         ['adminpass','required','message'=>'管理员密码不能为空','on'=>['login','changepass','adminadd','changeemail']],
         ['rememberMe','boolean','on'=>['login']],
         ['adminpass','validatePass','on'=>['login','changeemail']],
         ['adminemail','required','message'=>'电子邮箱不能为空','on'=>['seekpass','adminadd','changeemail']],
         ['adminemail','unique','message'=>'电子邮箱已被注册','on'=>['adminadd','changeemail']],
         ['adminemail','email','on'=>['seekpass','changeemail']],
         ['adminemail','validateEmail','message'=>'电子邮箱格式不正确','on'=>['seekpass']],
         ['repass','required','message'=>'确认密码不能为空','on'=>['changepass','adminadd']],
         ['repass','compare','compareAttribute'=>'adminpass','message'=>'两次密码输入不一致','on'=>['changepass','adminadd']],
         ];
   }
    // 验证密码是否正确
   public function validatePass()
   {
        if (!$this->hasErrors()) {
          $userModel = $this->findByUsername($this->adminuser);
          if (!$userModel) {
              $this->addError("adminpass","用户名或密码错误");
          }else{
              $hash = Salt::vertifySalt($this->adminpass, $userModel->salt);
              $isPass = $hash == $userModel->adminpass ? true : false;
              if ($isPass) {
                  return true;
              }else{
                  $this->addError("adminpass","用户名或密码错误");
              }
          }
        }
    }

    public function findByUsername($adminName)
    {
        $user = self::find()->where('adminuser=:user',[":user"=>$adminName])->asArray()->one();
        if($user){
            return new static($user);
        } else {
            return false;
        }
    }

    public function validateEmail()
    {
        if (!$this->hasErrors()) {
          $data = self::find()->where('adminuser=:user and adminemail=:email',[':user'=>$this->adminuser,':email'=>$this->adminemail])->one();
          if (is_null($data)) {
            $this->addError("adminemail","管理员账号不匹配");
          }
        }
    }

    public function login($data)
    {
        $this->scenario = 'login';
        if ($this->load($data) && $this->validate()) {
            $lifetime = $this->rememberMe?24*3600:0;
            $session = Yii::$app->session;
            session_set_cookie_params($lifetime);
            $session['admin']=[
            'adminuser'=>$this->adminuser,
            'isLogin'=>1,
            ];
            $this->updateAll(['logintime'=>time(),'loginip'=>ip2long(Yii::$app->request->userIP)],'adminuser=:user',[":user"=>$this->adminuser]);
            return (bool)$session['admin']['isLogin'];
        }
        return false;
    }

public function seekPass($data)
{
  $this->scenario = 'seekpass';
  if ($this->load($data) && $this->validate()) {
    $time = time();
    $token = $this->createToken($data['Admin']['adminuser'],$time);
    var_dump($data['Admin']['adminemail']);
    $mailer = Yii::$app->mailer->compose('seekpass',['adminuser'=>$data['Admin']['adminuser'],'time'=>$time,'token'=>$token]);
    $mailer->setTo($data['Admin']['adminemail']);
    $mailer->setSubject("慕课商城");
    if ($mailer->send()) {
      return true;
    }
  }
  return false;
}

public function createToken($adminuser,$time)
{
  return md5(md5($adminuser).base64_encode(Yii::$app->request->userIP).md5($time));
}

    public function changePass($data)
    {
        $this->scenario = 'changepass';
        if ($this->load($data) && $this->validate()) {
          $hash = Salt::generateSalt($this->adminpass);
          $this->adminpass = $hash['password'];
          $this->salt = $hash['salt'];
          return (bool)$this->updateAll(['adminpass'=>$this->adminpass,'salt'=>$this->salt],'adminuser=:user',[':user'=>$this->adminuser]);
        }
        return false;
    }

    public function reg($data)
    {
        $this->scenario = 'adminadd';
        if ($this->load($data) && $this->validate()) {
          $hash = Salt::generateSalt($this->adminpass);
          $this->adminpass = $hash['password'];
          $this->salt = $hash['salt'];
          $this->createtime = time();
          if ($this->save(false)) {
            return true;
          }
          return false;
        }
        return false;
    }

    public function changeemail($data)
    {
        $this->scenario = 'changeemail';
        if ($this->load($data) && $this->validate()) {
          return (bool)$this->updateAll(['adminemail'=>$this->adminemail],'adminuser=:user',[':user'=>$this->adminuser]);
        }
        return false;
    }









}