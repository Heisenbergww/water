<link rel="stylesheet" href="/css/news.css">
<!--主体部分-->
<style>
    .menu ul li:nth-of-type(3) a span {
        color: #01acf1;
    }
</style>
<section class="section2 clearfix">

    <div class="news-com clearfix">
        <h1 class="news-h">用水常识</h1>
        <p class="news-p">water knowledge</p>
        <div class="news-items container clearfix">
            <div class="news-show-pic fl">
                <img src="/img/water-2.png" alt="">
                <img src="/img/water-1.png" alt="">
            </div>
            <div class="news-summary fl">
                <h1 class="news-head">用水常识</h1>
                <?php foreach($articles as $art):?>
                <div class="news-item clearfix">
                    <a href="<?php echo yii\helpers\Url::to(['known/pages', 'articleid' => $art['articleid']]) ?>">
                        <div class="news-item-r fl">
                            <h5 class="news-item-head"><?php echo $art['title']?></h5>
                            <p class="new-item-desc"><?php echo $art['brief']?></p>
                        </div>
                    </a>
                </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</section>

<div class="pagination pull-right" style="margin-right: 200px">
    <?php echo yii\widgets\LinkPager::widget([
        'pagination' => $pager,
        'prevPageLabel' => '&#8249;',
        'nextPageLabel' => '&#8250;',
    ]); ?>
</div>