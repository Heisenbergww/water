<?php
    use yii\bootstrap\ActiveForm;
    use yii\helpers\Html;
    use yii\bootstrap\Alert;
?>
<meta name="csrf-token" content="<?= Yii::$app->request->csrfToken ?>"/>
<style>.span8 div{ display:inline; } .help-block-error { color:red; display:inline; }</style>
<link rel="stylesheet" href="/assets/admin/css/compiled/new-user.css" type="text/css" media="screen" />
<!-- main container -->
<div class="content">
    <div class="container-fluid">
        <div id="pad-wrapper" class="new-user">
            <div class="row-fluid header">
                <h3>添加轮播</h3></div>
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
                                    <label class="control-label" for="product-title">排序</label>
                                    <input type="text" id="product-title" class="span9" name="Home[orderid]" value="" placeholder="填写数字，规定轮播图片显示顺序">
                                </div>
                                <p class="help-block help-block-error"></p>
                            </div>
                           
                            <div class="form-group field-product-cover required">
                                <div class="span12 field-box">
                                    <label class="control-label" for="product-cover">图片封面</label>
                                    <input type="hidden" name="Home[cover]" value="">
                                    <input type="file" id="product-cover" class="span9" name="Home[cover]"></div>
                                <p class="help-block help-block-error"></p>
                            </div>
                            
                            <hr>
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
                        <i class="icon-lightbulb pull-left"></i>请在左侧表单当中填入要添加的轮播图片显示顺序号,图片</div>
                    <h6>主要事项</h6>
                    <p>请不要随意提交非图片类文件到后台</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end main container -->	
