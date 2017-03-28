<link rel="stylesheet" href="/css/news.css">
<!--主体部分-->
<section class="section1 clearfix  ">
    <div class="container-fluid">
<!--        <h1>NEWS</h1>-->
        <nav id="breadcrumb">
            <ol class="breadcrumb">
                <li><a href="<?php echo yii\helpers\Url::to(['home/index'])?>" class="">HOME/</a></li>
                <li class="">NEWS</li>
            </ol>
        </nav>
    </div>
</section>
<section class="section2 clearfix">
    <h1 style="text-align: center">NEWS</h1>
    <?php foreach($articles as $art):?>
        <div class="container_news">
            <div class="row clearfix news_child">
                <div class="col-lg-5">
                    <img src="/<?php echo $art['cover']?>" alt="">
                </div>
                <div class="col-lg-7">
                <a href="<?php echo yii\helpers\Url::to(['aboutus/newdetail', 'articleid' => $art['articleid']]) ?>">
                        <h3 class="news_child_title">
                            <?php echo $art['title']?>
                        </h3>
                    </a>
                    <div class="news_child_short_des">
                        <?php echo $art['brief']?>
                    </div>
                    <div class="news_child_short_time">
                        <?php echo date('Y-m-d H:i:s',$art['createtime'])?>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach;?>
</section>

<div class="pagination pull-right" style="margin-right: 200px">
     <?php echo yii\widgets\LinkPager::widget([
        'pagination' => $pager,
        'prevPageLabel' => '&#8249;',
        'nextPageLabel' => '&#8250;',
    ]); ?>
</div>
