<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\bootstrap\Alert;
use yii\filters\PageCache;
?>
<link rel="stylesheet" href="/mobile/css/join_us.css">

<!--主体部分-------------------------------------------------------------->
<section class="section">
    <img src="/<?php echo $front['join_img']?>" alt="" width="100%">
</section>
<section class="section1">
    <div class="join_us_content_child">
        <h2>Requirement:</h2>
        <p>1. There is no limit to the area</p>
        <p>2. The minimum order quantity is one container</p>
        <p>3. At least 1 lawful and registered local shop or sale place managed by yourself，or  you have your own sales channel.</p>
        <p>4. Have some knowledge and strong interest in Iron bed</p>
    </div>
</section>
<?php
if( Yii::$app->getSession()->hasFlash('success') ) {
    echo Html::script('alert("Submitted successfully!");', ['defer' => true]);
}
if( Yii::$app->getSession()->hasFlash('error') ) {
    echo Html::script('alert("Submit fails, check the mailbox format and whether Missing!");', ['defer' => true]);
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
<section class="section2">
    <div class="join_us_form_child">
        <h2>Leaving  Message</h2>
        <p>Name</p>
        <input name="Join[name]" type="text" value="<?= Html::encode($model->name) ?>" placeholder="" class="input_left">
        <p>Tel</p>
        <input name="Join[tel]"  type="text" value="<?= Html::encode($model->tel) ?>" placeholder="">
        <p>Email</p>
        <input name="Join[email]"  type="email" value="<?= Html::encode($model->email) ?>" placeholder="">
        <p>Country</p>
        <input name="Join[country]"  type="text" value="<?= Html::encode($model->country) ?>" placeholder="">
        <p>Products of interest</p>
        <select name="Join[interest]">
            <?php foreach ($cate as $c): ?>
                <option value="<?= Html::encode($model->interest=$c->title) ?>"><?= Html::encode($c->title) ?></option>
            <?php endforeach;?>
        </select>
        <p>Message</p>
        <textarea name="Join[comment]" type="text" placeholder="" class="message_s"></textarea>
        <input  class="contact_us_submit" type="submit" value="Submit">
    </div>
</section>
 <?php ActiveForm::end();?>





