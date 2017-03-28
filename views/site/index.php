<?php
use yii\helpers\Html;
use yii\widgets\Pjax;
use app\assets\AppAsset;
/* @var $this yii\web\View */
/* @var $time string */
AppAsset::register($this);
$this->title = 'Yii2 Pjax Refresh Button';
?>




<script src="/assets/8bca96da/jquery.js"></script>
<script src="/assets/ffbc42de/yii.js"></script>
<script src="/assets/c40f7189/jquery.pjax.js"></script>
<script src="/assets/1a0df6c8/js/bootstrap.js"></script>
<script type="text/javascript">jQuery(document).ready(function () {
        jQuery(document).pjax("#w0 a", {"push":true,"replace":false,"timeout":1000,"scrollTo":false,"container":"#w0"});
        jQuery(document).on("submit", "#p0 form[data-pjax]", function (event) {jQuery.pjax.submit(event, {"push":true,"replace":false,"timeout":1000,"scrollTo":false,"container":"#p0"});});
    });</script>
<div class="site-index">
    <?php Pjax::begin(); ?>
    <?= Html::a("Refresh", ['site/index'], ['class' => 'btn btn-lg btn-primary']) ?>
    <h1>Current time: <?= $time ?></h1>
    <?php Pjax::end(); ?>
</div>

