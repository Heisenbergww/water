<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\bootstrap\Alert;
use \kucha\ueditor\UEditor;
?>
<?php $this->beginPage() ?>
<?php $this->beginBody() ?>
<meta name="csrf-token" content="<?= Yii::$app->request->csrfToken ?>"/>
<style>.span8 div{ display:inline; } .help-block-error { color:red; display:inline; } strong{color:red;} </style>
<link rel="stylesheet" href="/assets/admin/css/compiled/new-user.css" type="text/css" media="screen" />
<script src="/assets/js/jquery-1.10.2.min.js"></script>
<style>
    .new_label{
        font-style: normal !important;
        color: #696a71 !important;
    }
    .new_label strong{
        color: black !important;
        font-weight: normal !important;
    }
    #pl{
        border-radius: 9px;
        border: 1px solid #4a90e2;
        margin: 20px 0;
        padding: 7px 0;
        text-align: center;
        cursor: pointer;
    }
    #zhu{
        margin-left: 15px;
        font-size:14px;
    }
    #pl::-webkit-input-placeholder {
        font-style:normal;
        color: #4a90e2;

    }
</style>
<!-- main container -->
<div class="content">
    <div class="container-fluid">
        <div id="pad-wrapper" class="new-user">
            <div class="row-fluid header">
                <h3>编辑商品关联</h3></div>
            <div class="row-fluid form-wrapper">
                <!-- left column -->
                <div class="span9 with-sidebar">
                    <div class="container">
                        <?php if( Yii::$app->getSession()->hasFlash('success') ) {
                            echo Alert::widget([
                                'options' => [
                                    'class' => 'alert-success', //这里是提示框的class
                                ],
                                'body' => Yii::$app->getSession()->getFlash('success'), //消息体
                            ]);
                        }
                        if( Yii::$app->getSession()->hasFlash('error') ) {
                            echo Alert::widget([
                                'options' => [
                                    'class' => 'alert-error',
                                ],
                                'body' => Yii::$app->getSession()->getFlash('error'),
                            ]);
                        }
                        ?>
                        <?php
                        $form = ActiveForm::begin([
                            'action'=> ['product/relations'],
                            'fieldConfig' => [
                                'template' => '<div class="span12 field-box">{label}{input}</div>{error}',
                            ],
                            'options' => [
                                'class' => 'new_user_form inline-input',
                                'enctype' => 'multipart/form-data'
                            ],
                        ]);?>

                        <div class="form-group field-product-title required">
                            <div class="span12 field-box">
                                <h4 class="control-label new_label" >产品ID：<strong><?php echo Html::encode($product['productid']);?></strong></h4>
                                <h4 class="control-label new_label">产品名称：<strong><?php echo Html::encode($product['title']);?></strong></h4>
                                <? if (isset($resnew)) :?>
                                    <h4 class="control-label new_label">已关联产品：
                                        <?php foreach($resnew as $r):?>
                                            <strong>商品<?php echo $r['productid']?> </strong>
                                        <?php endforeach;?>
                                    </h4>
                                <? else: ?>
                                    <h4 class="control-label" style="display: none"><strong>当前产品无关联产品</strong></h4>
                                <? endif ?>


                            </div>
                            <p class="help-block help-block-error"></p>

                            <h3>选择关联商品</h3>
                            <input type="text" id="pl" name="<?php echo Html::encode($product['productid']);?>" value="" placeholder="点击加载关联产品">
                            <span id="zhu">注：您最多可提交5个产品</span>
                            <input type="text"  name="<?php echo Html::encode($product['productid']);?>" value="<?php echo Html::encode($product['productid']);?>" style="display:none">
                            <ul id="list">
                            </ul>
                            <script>
                                $(document).ready(function () {
                                    var csrfToken = $('meta[name="csrf-token"]').attr("content");
                                    var count=0;
                                    $('#pl').focus(function(){
                                        if(count==0){
                                            $.ajax({
                                                url: "/admin/product/backrelation.html",
                                                type: "POST",
                                                dataType: "json",
                                                data: {
                                                    "productid": $('#pl').attr("name"),
                                                    "_csrf": csrfToken,
                                                },
                                                success: function (Data) {
                                                    if (Data.status) {
                                                        var l=Data.products.length;
                                                        for(i=0;i<l;i++){
                                                            var D=Data.products[i]['productid'];
                                                            var input=$("<input>",{
                                                                name:'productid'+ D,
                                                                "type":"checkbox",
                                                                val:D,
                                                            });
                                                            var li=$("<li>",{
                                                                name:'Product[productid]',
                                                                text:'商品ID'+ D,
                                                            });
                                                            li.append(input);
                                                            $("#list").append(li);
                                                        }//
                                                    } else {
                                                        alert("o(*≧▽≦)ツ");
                                                    }
                                                },
                                                error: function () {
                                                    alert('network error!');
                                                }
                                            })
                                            count=count+1;
                                        }

                                    })

                                    //表单高度
                                    $('#list').css({'max-height':'230px','overflow-y':'scroll'});

                                })

                            </script>
                        </div>


                        <div class="span11 field-box actions">
                            <?php echo Html::submitButton('提交', ['class' => 'btn-glow primary']); ?>
                            <span>OR</span>
                            <?php echo Html::resetButton('取消', ['class' => 'reset']); ?>
                        </div>
                         <?php ActiveForm::end();?>
                    </div>
                </div>
                <!-- side right column -->
                <div class="span3 form-sidebar pull-right">
                    <div class="alert alert-info hidden-tablet">
                        <i class="icon-lightbulb pull-left"></i>请在左侧表单当中填入要添加的商品信息,包括商品名称,描述,图片，pdf等</div>
                    <h6>商城用户说明、上传注意事项</h6>
                    <p>1.用于前台展示</p>
                    <p>2.每个字段必须填写</p>
                    <p>3.上传时请不要上传非图片以及pdf类型的文件，且上传文件<strong>名称</strong>中不能包含<strong>‘.’</strong>,以免出错！(例如：test.jpg和  test.pdf为合法文件)</p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->endBody() ?>
<?php $this->endPage() ?>

<!-- end main container -->	
