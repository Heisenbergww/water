<link rel="stylesheet" href="/mobile/css/news.css">
<!--主体部分-------------------------------------------------------------->

<section class="section"></section>
<section class="section1 clearfix container">
    <?php foreach($articles as $art):?>
    <a href="<?php echo yii\helpers\Url::to(['aboutus/newdetail', 'articleid' => $art['articleid']]) ?>">
        <div class="news">
            <div class="news_pic">
                <img src="/<?php echo $art['cover']?>" alt="">
            </div>
            <div class="news_words">
                <h3 class="news_child_title">
                    <?php echo $art['title']?>
                </h3>
                <div class="news_child_short_des">
                    <?php echo $art['brief']?>
                </div>
            </div>
        </div>
    </a>
    <?php endforeach;?>   
   
</section>
