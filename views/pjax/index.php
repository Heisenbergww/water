<?php
use yii\widgets\Pjax;
use yii\helpers\Html;
?>

<?php Pjax::begin(); ?>
<div class="pjax">
    this is pjax part!!!!!!!!!!
    <?= Html::a("Refresh", ['pjax/index'], ['class' => 'btn btn-lg btn-primary']) ?>
    <h1>Current time: <?= $time ?></h1>
</div>
<?php Pjax::end(); ?>
