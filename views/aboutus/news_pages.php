<link rel="stylesheet" href="/css/news_pages.css">
<!--主体部分-->
<section class="section0 clearfix  ">
    <div class="container-fluid">
        <nav id="breadcrumb">
            <ol class="breadcrumb">
                <li><a href="<?php echo yii\helpers\Url::to(['home/index'])?>" class="">HOME/</a></li>
                <li><a href="<?php echo yii\helpers\Url::to(['aboutus/news'])?>" class="">news/</a></li>
                <li class="">download pdf</li>
            </ol>
        </nav>
    </div>
</section>
<section class="section2 clearfix container-fluid Special_Technology_content">
    <div class="row">   
        <div class="col-lg-12">
          <?php echo $model['descr']?>
        </div>
    </div>
</section>

