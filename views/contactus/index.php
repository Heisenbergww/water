<?php
    use yii\bootstrap\ActiveForm;
    use yii\helpers\Html;
    use yii\bootstrap\Alert;
    use yii\filters\PageCache;
?>
<link rel="stylesheet" href="/css/contact_us.css">

<div class="layout-right fl contact-us">
    <h3><a href="">Home</a>>Contact Us</h3>
    <div class="contact-us-wrap clearfix">
        <h3>Contact Us</h3>
        <div class="company-info clearfix">
            <div class="company-info-left">
                <p><?php echo $company['companyname']?></p>
                <p><span>Email：</span><a href="mailto:<?php echo $company['companyemail']?>"><?php echo $company['companyemail']?></a></p>
                <p><span>TEL：</span><?php echo $company['companytel']?></p>
                <p><span>Address:</span><?php echo $company['companyaddress']?></p>
                <p><span>Mobile：</span><?php echo $company['companymobile']?></p>
                <p><span>Fax：</span><?php echo $company['companyfax']?></p>
                <p><span>Website：</span><?php echo $company['website']?></p>
            </div>
        </div>
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
        <div class="contact-us-form">
            <h3>Leaving Message</h3>
            <input name="Message[name]" type="text" value="<?= Html::encode($model->name) ?>" placeholder="Name">
            <input name="Message[phone]"  type="text" value="<?= Html::encode($model->phone) ?>" placeholder="Tel">
            <input name="Message[email]"  type="text" value="<?= Html::encode($model->email) ?>" placeholder="Email">
            <input name="Message[pls]"  type="text"  style="display: none" id="pls">
            <textarea name="Message[detail]" type="text" placeholder="Message" class="message_s"></textarea>
            <input  class="contact-us-submit" type="submit" value="Submit">
        </div>
         <?php ActiveForm::end();?>
    </div>
</div>

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






