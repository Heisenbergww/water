<?php
    use yii\bootstrap\ActiveForm;
    use yii\helpers\Html;
    use yii\bootstrap\Alert;
    use \kucha\ueditor\UEditor;
?>
<?php $this->beginPage() ?> 
<?php $this->beginBody() ?> 

<meta name="csrf-token" content="<?= Yii::$app->request->csrfToken ?>"/>
<style>.span8 div{ display:inline; } .help-block-error { color:red; display:inline; }</style>
<link rel="stylesheet" href="/assets/admin/css/compiled/new-user.css" type="text/css" media="screen" />
<!-- main container -->
<div class="content">
    <div class="container-fluid">
        <div id="pad-wrapper" class="new-user">
            <div class="row-fluid header">
                <h3>添加文章</h3></div>
            <div class="row-fluid form-wrapper">
                <!-- left column -->
                <div class="span12 with-sidebar">
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
                                    <label class="control-label" for="product-title">文章标题</label>
                                    <input type="text" id="product-title" class="span9" name="Article[title]" value="<?php echo $model['title'];?>">
                                </div>
                                <p class="help-block help-block-error"></p>
                            </div>

                             <div class="form-group field-product-cover required">
                                <div class="span12 field-box">
                                    <label class="control-label" for="product-cover">文章封面</label>
                                    <input type="hidden" name="Article[cover]" value="">
                                    <input type="file" id="product-cover" class="span9" name="Article[cover]" value=""></div>
                                    <img width="150" src="<?php echo $model['cover'];?>">
                                <p class="help-block help-block-error"></p>
                            </div>

                             <div class="form-group field-wysi required">
                                <div class="span12 field-box">
                                    <label class="control-label" for="wysi">文章简介</label>
                                    <br>
                                    <textarea placeholder="注意事项：文章列表显示，介绍本篇文章，尽量简介明了，控制在三行以内..." id="wysi" class="span9 wysihtml5" name="Article[brief]" style="margin-left:120px">
                                    <?php echo $model['brief'];?>
                                    </textarea>
                                </div>
                                <p class="help-block help-block-error"></p>
                            </div>

                            <div class="form-group field-wysi required">
                                <div class="span12 field-box">
                                    <label class="control-label" for="wysi">编辑文章</label>
                                    <br>
                                <div style="margin-left:120px">
                                <?php 
                                    echo UEditor::widget([
                                        'model'=>$model,
                                        'attribute'=>'descr',
                                        'clientOptions' => [
                                            // 'initialFrameHeight' => '400',
                                            // 'initialFrameWidth' => '700',
                                            'lang' =>'zh-cn', 
                                            //定制菜单
                                            'toolbars' => [
                                                [
                                                    'fullscreen', 'source', '|', 'undo', 'redo', '|',
                                                    'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc', '|',
                                                    'rowspacingtop', 'rowspacingbottom', 'lineheight', '|',
                                                    'customstyle', 'paragraph', 'fontfamily', 'fontsize', '|',
                                                    'directionalityltr', 'directionalityrtl', 'indent', '|',
                                                    'justifyleft', 'justifycenter', 'justifyright', 'justifyjustify', '|', 'touppercase', 'tolowercase', '|',
                                                    'link', 'unlink', 'anchor', '|', 'imagenone', 'imageleft', 'imageright', 'imagecenter', '|',
                                                    'simpleupload', 'insertimage', 'emotion', 'scrawl', 'insertvideo', 'music', 'attachment', 'map', 'gmap', 'insertframe', 'insertcode', 'webapp', 'pagebreak', 'template', 'background', '|',
                                                    'horizontal', 'date', 'time', 'spechars', 'snapscreen', 'wordimage', '|',
                                                    'inserttable', 'deletetable', 'insertparagraphbeforetable', 'insertrow', 'deleterow', 'insertcol', 'deletecol', 'mergecells', 'mergeright', 'mergedown', 'splittocells', 'splittorows', 'splittocols', 'charts', '|',
                                                    'print', 'preview', 'searchreplace', 'help', 'drafts'
                                                ],
                                            ]
                                    ]]);?>
                                    </div>
                                </div>
                                <p class="help-block help-block-error"></p>
                            </div>
                            <?php  echo $form->field($model, 'isshow')->radioList(['不显示', '显示'], ['class' => 'span8']);?>
                           
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
            </div>
        </div>
    </div>
</div>

<?php $this->endBody() ?> 
<?php $this->endPage() ?>
<!-- end main container -->	
