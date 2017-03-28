<link rel="stylesheet" href="/css/home.css">


<section class="container clearfix ">
    <div class="fl">
        <div class="home-about-us">
            <h3>新闻
            <span class="more">
                <a href="<?php echo yii\helpers\Url::to(['news/index'])?>">more</a>
            </span>
            </h3>
            <div class="home-about-us-content">
                <?php foreach($news as $n):?>
                    <h2 class="home-news-title">
                        <?php echo $n['title']?>
                    </h2>
                    <div class="home-news-descr">
                        <?php echo $n['descr']?>
                    </div>
                <?php endforeach;?>

            </div>
        </div>
        <div class="home-contact-us">
            <h3>用水常识
            <span class="more">
                <a href="<?php echo yii\helpers\Url::to(['known/index'])?>">more</a>
            </span>
            </h3>
            <div class="home-contact-us-content">
                <?php foreach($knowns as $k):?>
                    <div><h2 class="knowns-title"><?php echo $k['title']?></h2>
                        <div class="knowns-descr"><?php echo $k['descr']?></div>
                    </div>

                <?php endforeach;?>
            </div>
        </div>
    </div>
    <div class="fl">
        <div class="home-product fl">
            <h3>办事公开
            <span class="more">
                <a href="<?php echo yii\helpers\Url::to(['open/index'])?>">more</a>
            </span>
            </h3>

            <div class="home-product-content clearfix" >

            </div>
        </div>
    </div>

</section>


<script>
    function wordWrap() {
        var copyThis = $(this.cloneNode(true)).hide().css({
            'position': 'absolute',
            'width': 'auto',
            'overflow': 'visible'
        });
        $(this).after(copyThis);
        if(copyThis.width()>$(this).width()){
            $(this).text($(this).text().substring(0,$(this).html().length-4));
            $(this).html($(this).html()+'...');
            copyThis.remove();
            wordLimit();
        }else{
            copyThis.remove(); //清除复制
            return;
        }
    }
    var wordLimit=function(){

        $(".home-news-title").each(wordWrap());
        $(".home-news-descr").each(wordWrap());
        $(".home-news-descr p").each(wordWrap());
        $(".home-news-descr span").each(wordWrap());
        $(".home-news-descr p span").each(wordWrap());
        $(".knowns-descr p span").each(wordWrap());
        $(".knowns-descr p").each(wordWrap());
        $(".knowns-descr").each(wordWrap());
        $(".knowns-descr span").each(wordWrap());
    }
    wordLimit();
</script>











