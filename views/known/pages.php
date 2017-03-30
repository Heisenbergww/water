<link rel="stylesheet" href="/css/news_pages.css">
<!--主体部分-->
<style>
    .menu ul li:nth-of-type(3) a span {
        color: #01acf1;
    }
</style>
<section class="section0 clearfix  ">
    <div class="container-fluid">
        <nav id="breadcrumb">
            <ol class="breadcrumb">
                <li><a href="<?php echo yii\helpers\Url::to(['home/index'])?>" class="">主页/</a></li>
                <li><a href="<?php echo yii\helpers\Url::to(['known/index'])?>" class="">用水常识/</a></li>
                <li class="">常识</li>
            </ol>
        </nav>
    </div>
</section>
<section class="section2 clearfix container-fluid Special_Technology_content">
    <div class="row">
        <div class="col-lg-12">
            <div class="news_body">
                <div class="news">
                    <h3>用水常识</h3>
                </div>
                <div class="news_title">
                    <p><?php echo $model['title']?></p>
                </div>
                <div class="news_content">
                    <?php echo $model['descr']?>
                </div>
                <div class="news_footer">
                    <div class="date">
                        <p>更新日期:<?php echo date('Y-m-d H:i:s',$model['createtime'])?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>