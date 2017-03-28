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
<!-- main container -->
<div class="content">
    <div class="container-fluid">
        <div id="pad-wrapper" class="new-user">
            <div class="row-fluid header">
                <h3>添加商品</h3></div>
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
                           <?php echo  $form->field($model, 'cateid')->dropDownList($opts, ['id' => 'cates']);?>
                            <div class="form-group field-product-title required">
                                <div class="span12 field-box">
                                    <label class="control-label" for="product-title">商品名称</label>
                                    <input type="text" id="product-title" class="span9" name="Product[title]" value="<?php echo Html::encode($model['title']);?>">
                                </div>
                                <p class="help-block help-block-error"></p>
                            </div>
<!--                            <div class="form-group field-product-title required">-->
<!--                                <div class="span12 field-box">-->
<!--                                    <label class="control-label" for="product-title">商品SKU</label>-->
<!--                                    <input type="text" id="product-title" class="span9" name="Product[sku]" value="--><?php //echo $model['sku'];?><!--">-->
<!--                                </div>-->
<!--                                <p class="help-block help-block-error"></p>-->
<!--                            </div>-->
<!--                            <div class="form-group field-product-title required">-->
<!--                                <div class="span12 field-box">-->
<!--                                    <label class="control-label" for="product-title">推荐顺序</label>-->
<!--                                    <input type="text" id="product-title" class="span9" name="Product[orderid]" value="--><?php //echo $model['orderid'];?><!--">-->
<!--                                </div>-->
<!--                                <p class="help-block help-block-error"></p>-->
<!--                            </div>                     -->

                            <div class="form-group field-wysi required">
                                <div class="span12 field-box">
                                    <label class="control-label" for="wysi">商品详情(Specifications)</label>
                                    <div style="margin-left:120px;">
                                    <?php 
                                    echo UEditor::widget([
                                        'model'=>$model,
                                        'attribute'=>'descr',
                                        'clientOptions' => [
                                            'lang' =>'zh-cn', 
                                            'toolbars' => [
                                                [
                                                    'fullscreen', 'source', '|', 'undo', 'redo', '|',
                                                    'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc', '|',
                                                    'rowspacingtop', 'rowspacingbottom', 'lineheight', '|',
                                                    'customstyle', 'paragraph', 'fontfamily', 'fontsize', '|',
                                                    'directionalityltr', 'directionalityrtl', 'indent', '|',
                                                    'justifyleft', 'justifycenter', 'justifyright', 'justifyjustify', '|', 'touppercase', 'tolowercase', '|',
                                                    'link', 'unlink', 'anchor', '|', 'imagenone', 'imageleft', 'imageright', 'imagecenter', '|',
                                                    'simpleupload', 'insertimage', 'emotion', 'scrawl', 'insertvideo', 'music', 'attachment', 'map', 'insertframe', 'insertcode', 'webapp', 'pagebreak', 'template', 'background', '|',
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
<!--                            --><?php // echo $form->field($model, 'is_tui')->radioList(['不推荐', '推荐'], ['class' => 'span8']);?>
                            <?php  echo $form->field($model, 'cover')->fileInput(['class' => 'span9','accept'=>'image/*']);?>
                            <?php if (!empty($model->cover)):?>
                            <img width="150px" src="/<?php echo $model->cover;?>">
                            <?php endif;?>
<!--                            <hr>-->
<!--                            --><?php //echo $form->field($model, 'pics[]')->fileInput(['class' => 'span9', 'accept'=>'image/*','multiple' => true,]);
//                                ?>
<!--                            --><?php
//                                foreach((array)($model->pics) as $k=>$pic) {
//                            ?>
<!--                                <img style="width: 150px" src="/--><?php //echo $pic ?><!--">-->
<!--                                <a href="--><?php //echo yii\helpers\Url::to(['product/removepic', 'key' => $k, 'productid' => $model->productid]) ?><!--">删除</a>-->
<!--                            --><?php
//                            }
//                            ?>
<!--                            <br><br>-->
<!--                            <input type='button' id="addpic" value='增加一个'>-->
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
