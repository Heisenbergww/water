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
                <h3>编辑底部社交账号</h3>
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
                            echo $form->field($model, 'facebook')->textInput(['class' => 'span9']);
                            echo $form->field($model, 'twitter')->textInput(['class' => 'span9']);
                            echo $form->field($model, 'youtube')->textInput(['class' => 'span9']);
                            echo $form->field($model, 'linkedin')->textInput(['class' => 'span9']);
                            echo $form->field($model, 'instagram')->textInput(['class' => 'span9']);
                            ?>
                            <hr>
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
                        请在左侧表单当中填入要修改的账号地址
                    </div>                        
                    <h6>前台说明</h6>
                    <p>控制显示footer显示的社交账号跳转：请按照
                    <strong style="color: red">https://www.facebook.com/</strong>
                    格式填写修改
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end main container -->