<?php
    use yii\bootstrap\ActiveForm;
    use yii\helpers\Html;
    use yii\bootstrap\Alert;
    use yii\filters\PageCache;
?>
<link rel="stylesheet" href="/mobile/css/contact_us.css">

<!--主体部分-------------------------------------------------------------->
<section class="section"></section>
<section class="section1 clearfix container">
    <div class="company_contact_info">
        <p><span>Company Name：</span><?php echo $company['companyname']?></p>
        <p><span>Email：</span><a href="mailto:<?php echo $company['companyemail']?>"><?php echo $company['companyemail']?></a></p>
        <p><span>TEL：</span><a href="tel:<?php echo $company['companytel']?>"><?php echo $company['companytel']?></a></p>
        <p><span>Fax：</span><?php echo $company['companyfax']?></p>
        <p><span>Mobile：</span><a href="tel:<?php echo $company['companymobile']?>"><?php echo $company['companymobile']?></a></p>
        <p><span>Website：</span><a href="<?php echo $company['website']?>"><?php echo $company['website']?></a></p>
        <p><span>Address:  </span><?php echo $company['companyaddress']?></p>
    </div>
</section>
<section class="section3 clearfix container">
 <?php 
if( Yii::$app->getSession()->hasFlash('success') ) {
    echo Html::script('alert("Submitted successfully!");', ['defer' => true]);
}
if( Yii::$app->getSession()->hasFlash('error') ) {
echo Html::script('alert("Submit fails, check the mailbox format and whether Missing!");', ['defer' => true]);
 }
?>
    <div class="leave_message">
        <h1>Leaving  Message</h1>
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
            <input name="Message[pls]"  type="text"  style="display: none" id="pls">
            <input name="Message[name]" type="text" placeholder="Name" value="<?= Html::encode($model->name) ?>">
            <input name="Message[email]"  type="text" placeholder="Email" value="<?= Html::encode($model->email) ?>">
            <input name="Message[phone]"  type="text" placeholder="TEL" value="<?= Html::encode($model->phone) ?>">
            <textarea name="Message[detail]" type="text" placeholder="Message" ><?= Html::encode($model->detail) ?></textarea>
            <input  class="contact_us_submit" type="submit" placeholder="" value="Submit">
        <?php ActiveForm::end();?>
    </div>
</section>

<!-- Google Code for contact us Conversion Page -->
<script type="text/javascript">
    /* <![CDATA[ */
    var google_conversion_id = 865051535;
    var google_conversion_language = "en";
    var google_conversion_format = "3";
    var google_conversion_color = "ffffff";
    var google_conversion_label = "wn-KCPDy7WwQj8e-nAM";
    var google_remarketing_only = false;
    /* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
    <div style="display:inline;">
        <img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/865051535/?label=wn-KCPDy7WwQj8e-nAM&amp;guid=ON&amp;script=0"/>
    </div>
</noscript>
<script>
    $(document).ready(function () {
        getProductIdOnly();
        function getProductIdOnly() {
            if($.cookie('pp')){
                var productIds = $.cookie('pp');
                var productList = productIds.split(".");
                $('#pls').val(productList);
            }
        }
    });
</script>



