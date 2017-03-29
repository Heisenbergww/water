<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="<?= Yii::$app->request->csrfToken ?>"/>
    <meta name="Keywords" Content="Minsco,China,Steel,Steel Rebar,Wire Rods,Hot Rolled Coil,Cold Rolled Steel Coil,Galvanized Steel Coil,Galvalumed Steel Coil,Prepainted Galvanized Steel Coil,Hot Rolled Steel Plate,Galvanized Steel Sheet,H-beam,I beam,Angle Steel and U-channel,Hot Dip Galvanized Round Pipe,Seamless Steel Pipe,Black Pipe,HRC,CRC,GI,GL & PPGI,HRP,CRP,GI plate"/>
    <meta name="description" Content="MINSCO-China Professional Steel Supplier. We specialize on the steel production, stocking ,selling & trading in both domestic and aboard."/>
    <title>MINSCO</title
    <link type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="/css/normal.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <script src="/js/jquery-1.9.0.min.js"></script>
    <script type="text/javascript">
        if (window != window.top) {
        window.top.location.replace(window.location)
        }
    </script>
    <!--轮播‪-->
<!--    <link rel="stylesheet" href="/owlcarousel/owl.carousel.min.css">-->
<!--    <link rel="stylesheet" href="/owlcarousel/owl.theme.default.min.css">-->
<!--    <script src="/owlcarousel/owl.carousel.min.js"></script>-->
    <!--轮播2-->
    <link rel="stylesheet" type="text/css" href="/css/ppt.css">
    <script type="text/javascript" src="/js/jquery.glide.min.js"></script>


</head>
<body style="overflow-x:hidden">
    <header class="navbar_fa">
        <nav class="navbar">
            <div class="container clearfix">
                <a href="" name="top_top">
                </a>
                <div class="logo-right fr">
                    <div class="language fr">
                        <p><?php echo Yii::t('app', '哈尔滨利民经济技术开发区自来水有限公司');?></p>
                    </div>
                </div>
            </div>
        </nav>
        <div class="menu container clearfix">
            <div class="logo fl">
                <a href="/" name="logo"><img src="/img/logo.png" alt="" ></a>
            </div>
            <ul class="clearfix fr">
                <li><a href="/" class=""><span><?php echo Yii::t('app', '首页');?></span></a></li>
                <li><a href="<?php echo yii\helpers\Url::to(['news/index'])?>"><span><?php echo Yii::t('app', '新闻');?></span></a></li>
                <li><a href="<?php echo yii\helpers\Url::to(['known/index'])?>"><span><?php echo Yii::t('app', '用水常识');?></span></a></li>
                <li><a href="<?php echo yii\helpers\Url::to(['open/index'])?>"><span><?php echo Yii::t('app', '办事公开');?></span></a></li>
                <li><a href="<?php echo yii\helpers\Url::to(['open/pages', 'articleid' => 6]) ?>"><span><?php echo Yii::t('app', '公司简介');?></span></a></li>
                <li><a href="<?php echo yii\helpers\Url::to(['open/pages', 'articleid' => 6]) ?>"><span><?php echo Yii::t('app', '联系我们');?></span></a></li>
            </ul>
        </div>
    </header>

    <section class="banner clearfix" >
        <div class="row clearfix">
            <div class="slider ppt">
                <ul class="slides">
                    <?php foreach($this->params['banner'] as $im):?>
                        <li class="slide item">
                            <img height="" src="/<?php echo $im['cover']?>" alt="">
                        </li>
                    <?php endforeach;?>
                </ul>
            </div>
        </div>
    </section>

<?php echo $content;?>

    <footer class="clearfix">
        <div class="container info-bottom clearfix footer">
            <div class="row">
                <div class="col-lg-12 ">
                    <img src="/img/logo_footer.jpg" alt="">
                    <div class="social">
                        <ul>
                            <li class="facebook">
                                <a target="_blank" href="https://www.facebook.com/Tianjin-Minsco-International-Trade-CoLtd-1202723259816041/?ref=aymt_homepage_panel">
                                    <!--                                <i class="fa fa-facebook" aria-hidden="true"></i>-->
                                </a>
                            </li>
                            <li class="twitter">
                                <a target="_blank" href="https://twitter.com/MinscoSummer">
                                    <!--                                <i class="fa fa-twitter" aria-hidden="true"></i>-->
                                </a>
                            </li>
                            <li class="in">
                                <a target="_blank" href="http://www.linkedin.com/pulse/activities/0_22kAPE-E9GTOG4xoYtx0eO?trk=hp-feed-recent-activity">
                                    <!--                                <i class="fa fa-linkedin" aria-hidden="true"></i>-->
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer_menu">
                        <ul>
                            <li><a href="/" class=""><?php echo Yii::t('app', '首页');?></a></li>
                            <li><a href="<?php echo yii\helpers\Url::to(['news/index'])?>"><?php echo Yii::t('app', '新闻');?></a></li>
                            <li><a href="<?php echo yii\helpers\Url::to(['known/index'])?>"><?php echo Yii::t('app', '用水常识');?></a></li>
                            <li><a href="<?php echo yii\helpers\Url::to(['open/index'])?>"><?php echo Yii::t('app', '办事公开');?></a></li>
                            <li><a href="<?php echo yii\helpers\Url::to(['open/pages', 'articleid' => 6]) ?>"><?php echo Yii::t('app', '公司简介');?></a></li>
                            <li><a href="<?php echo yii\helpers\Url::to(['open/pages', 'articleid' => 6]) ?>"><?php echo Yii::t('app', '联系我们');?></a></li>
                        </ul>
                    </div>
                    <p><?php echo Yii::t('app', '哈尔滨利民经济技术开发区自来水有限公司');?></p>
                </div>
            </div>
        </div>
    </footer>
    
    


    <!--回顶部-->
    <div class="go_top">
        <div class="go_top_bt">
            <img src="/img/tp.png" alt="" >
        </div>
    </div>


<!--    <script>-->
<!--        $(document).ready(function(){-->
<!--            //轮播1-->
<!--            $('#owl-carousel_first').owlCarousel({-->
<!--                items: 1,-->
<!--                loop: true,-->
<!--//                lazyLoad: true,-->
<!--//                autoHeight:true,-->
<!--                autoplay: true,-->
<!--                autoplayTimeout: 3000-->
<!--            })-->
<!--        })-->
<!--    </script>-->
    <script type="text/javascript">
        $(document).ready(function () {
            var glide = $('.slider').glide({
//            autoplay:true,//是否自动播放 默认值 true如果不需要就设置此值
                animationTime:200, //动画过度效果，只有当浏览器支持CSS3的时候生效
                arrows:false, //是否显示左右导航器
                arrowsWrapperClass: "arrowsWrapper",//滑块箭头导航器外部DIV类名
                arrowMainClass: "slider-arrow",//滑块箭头公共类名
                arrowRightClass:"slider-arrow--right",//滑块右箭头类名
                arrowLeftClass:"slider-arrow--left",//滑块左箭头类名
//            arrowRightText:">",//定义左右导航器文字或者符号也可以是类
//            arrowLeftText:"<",
                nav:true, //主导航器也就是本例中显示的小方块
                navCenter:true, //主导航器位置是否居中
                navClass:"slider-nav",//主导航器外部div类名
                navItemClass:"slider-nav__item", //本例中小方块的样式
                navCurrentItemClass:"slider-nav__item--current" //被选中后的样式
            });
        })
    </script>
    <script src="/js/main.js"></script>
  
    </body>
    </html>
