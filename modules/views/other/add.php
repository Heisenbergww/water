<?php
    use yii\bootstrap\ActiveForm;
    use yii\helpers\Html;
    use yii\bootstrap\Alert;
?>
<style>
    .span8 div{
        display:inline;
    }
    .help-block-error {
        color:red;
        display:inline;
    }
</style>
<link rel="stylesheet" href="/assets/admin/css/compiled/new-user.css" type="text/css" media="screen" />
<!-- main container -->
<div class="content">
    <div class="container-fluid">
        <div id="pad-wrapper" class="new-user">
            <div class="row-fluid header">
                <h3>编辑公司</h3>
            </div>
            <div class="row-fluid form-wrapper">
                <!-- left column -->
                <div class="span9 with-sidebar">
                    <div class="container">
                            <?php
                           if( Yii::$app->getSession()->hasFlash('info') ) {
                                echo Alert::widget([
                                    'options' => [
                                    'class' => 'alert-success', //这里是提示框的class
                                    ],
                                'body' => Yii::$app->getSession()->getFlash('info'), //消息体
                                ]);
                            }?>
                            <?php
                            $form = ActiveForm::begin([
                                'fieldConfig' => [
                                    'template' => '<div class="span12 field-box">{label}{input}</div>{error}',
                                ],
                                'options' => [
                                    'class' => 'new_user_form inline-input',
                                    'enctype' => 'multipart/form-data'
                                ],
                            ]);
                            echo $form->field($model, 'companyname')->textInput(['class' => 'span9']);
                            echo $form->field($model, 'companyaddress')->textInput(['class' => 'span9']);
                            echo $form->field($model, 'companytel')->textInput(['class' => 'span9']);
                            echo $form->field($model, 'companyemail')->textInput(['class' => 'span9']);
                            echo $form->field($model, 'companyfax')->textInput(['class' => 'span9']);
                            echo $form->field($model, 'companymobile')->textInput(['class' => 'span9']);
                            echo $form->field($model, 'website')->textInput(['class' => 'span9']);
//                            echo $form->field($model, 'manufactureaddress')->textInput(['class' => 'span9']);
//                            echo $form->field($model, 'cover')->fileInput(['class' => 'span9']);
//                            if (!empty($model->cover)):
//                            ?>
<!--                                <img width="200" src="/--><?php //echo $model->cover;?><!--">-->
<!--                                <hr>-->
<!--                            --><?php
//                                endif;
//                            ?>
                            <div class="span11 field-box actions">
                                <?php echo Html::submitButton('提交', ['class' => 'btn-glow primary']); ?>
                                <span>OR</span>
                                <?php echo Html::resetButton('取消', ['class' => 'reset']); ?>
                            </div>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>

                <!-- side right column -->
                <div class="span3 form-sidebar pull-right">
                    <div class="alert alert-info hidden-tablet">
                        <i class="icon-lightbulb pull-left"></i>
                        请在左侧表单当中填入要修改的公司名称、地址、电话、邮箱、及图片
                    </div>                        
                    <h6>前台说明</h6>
                    <p>控制显示关于我们页面---公司详情的显示数据</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end main container -->