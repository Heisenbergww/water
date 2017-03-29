<link rel="stylesheet" href="/css/home.css">


<section class="container clearfix ">
    <div class="fl">
        <div class="home-about-us">
            <div class="title-part">
                <h2><span class="title-title">新闻/<e>news</e></span><a href="<?php echo yii\helpers\Url::to(['news/index'])?>">more+</a>
                </h2>
            </div>
            <div class="content-part">
                <!-- 最多两个 -->
                <?php foreach($news as $n):?>
                <div class="content-child">
                    <div class="ccleft"><img src="<?php echo $n['cover']?>" alt=""></div>
                    <a class="ccright" href="<?php echo yii\helpers\Url::to(['news/pages', 'articleid' => $n['articleid']]) ?>">
                        <h3><?php echo $n['title']?></h3>
                        <p class="cctime"><?php echo date('Y-m-d H:i:s',$n['createtime'])?></p>
                        <div class="cc-short-descr"><?php echo $n['descr']?></div>
                    </a>
                </div>
                <?php endforeach;?>
            </div>  
        </div>


        <div class="home-contact-us">
            <div class="title-part">
        <h2><span class="title-title">用水常识/<e>water knowledge</e></span><a href="<?php echo yii\helpers\Url::to(['known/index'])?>">more+</a></h2>
    </div>
    <div class="water-pic"><img src="/img/home-pic3.png" alt=""></div>
    <div class="water-part">
        <!-- 最多4个 -->
        <?php foreach($knowns as $k):?>
                   
                    <a class="water-child" href="<?php echo yii\helpers\Url::to(['known/pages', 'articleid' => $k['articleid']]) ?>">
            <div><?php echo $k['title']?></div>
        </a>

                <?php endforeach;?>
        
    </div>

                
            </div>
        </div>
    </div>
    <div class="fl">
        <div class="home-product ">
            <div class="title-part">
                <h2><span class="title-title">办事公开/<e>affairs publicity</e></span> <a href="<?php echo yii\helpers\Url::to(['open/index'])?>">more+</a></h2>
            </div>
            <div class="home-open clearfix">


                <div class="open-parts clearfix">
                    <a class="open-part" href="<?php echo yii\helpers\Url::to(['open/pages', 'articleid' => 6]) ?>">
                        <img src="/img/introduce.png" alt="" class="open-pic">
                        <p class="open-tag">单位介绍</p>
                    </a>
                    <a class="open-part">
                        <img src="/img/low.png" alt="" class="open-pic">
                        <p class="open-tag">政策法规</p>
                    </a>
                    <a class="open-part">
                        <img src="/img/computer.png" alt="" class="open-pic">
                        <p class="open-tag">网上服务</p>
                    </a>
                    <a class="open-part">
                        <img src="/img/people.png" alt="" class="open-pic">
                        <p class="open-tag">岗位规范</p>
                    </a>
                    <a class="open-part">
                        <img src="/img/process.png" alt="" class="open-pic">
                        <p class="open-tag">业务流程</p>
                    </a>
                    <a class="open-part">
                        <img src="/img/charge.png" alt="" class="open-pic">
                        <p class="open-tag">收费标准</p>
                    </a>
                    <a class="open-part">
                        <img src="/img/yewu.png" alt="" class="open-pic">
                        <p class="open-tag">业务信息</p>
                    </a>
                    <a class="open-part">
                        <img src="/img/line.png" alt="" class="open-pic">
                        <p class="open-tag">服务热线</p>
                    </a>
                </div>


                <div class="open-departments">
                    <div class="open-left-dep"><img src="/img/waterdrop.png" alt=""></div>
                    <div class="open-right-dep clearfix">
                        <a class="open-department">机构职能</a>
                        <a class="open-department">服务站点</a>
                        <a class="open-department">基层单位</a>
                        <a class="open-department">机构设置</a>
                        <a class="open-department">监督电话</a>
                        <a class="open-department">热线电话</a>
                        <a class="open-department">供水区域</a>
                    </div>

                </div>
            </div>

            
        </div>

        <div class="pics-show ">
            <div class="pic-show"><img src="/img/home-pic1.png" alt=""></div>
            <div class="pic-show"><img src="/img/home-pic2.png" alt=""></div>
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











