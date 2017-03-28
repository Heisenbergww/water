<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <meta name="Keywords" Content=""/>
    <meta name="description" Content=""/>
    <title>MINSCO</title>
    <link rel="stylesheet" href="/mobile/css/main.css">
    <link rel="stylesheet" href="/mobile/css/font-awesome.min.css">
    <script src="/mobile/js/jquery-3.1.0.min.js"></script>
</head>
<body>
    <!--头部---------------------------------------------------------->
    <header class="clearfix top_menu_fixed">
        <nav class="top_menu ">
            <i class="top_menu_bar" aria-hidden="true"><img src="/mobile/img/menu.png" alt="" ></i>
            <div class="logo">
                <a href="<?php echo yii\helpers\Url::to(['home/index'])?>">
                    <img src="/mobile/img/logo.png" alt="">
                </a>
            </div>
        </nav>
    </header>
    <a href="" name="top_tag"></a>

<?php echo $content;?>

    <!-- 底部 -->


    <footer class="">
        <div class=" footer-info clearfix">
            <img src="/img/logo_footer.jpg" alt="">
            <div class="social">
                <ul>
                    <li class=""><a target="_blank" href="https://www.facebook.com/Tianjin-Minsco-International-Trade-CoLtd-1202723259816041/?ref=aymt_homepage_panel"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li class=""><a target="_blank" href="https://twitter.com/MinscoSummer"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li class=""><a target="_blank" href="http://www.linkedin.com/pulse/activities/0_22kAPE-E9GTOG4xoYtx0eO?trk=hp-feed-recent-activity"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                </ul>
            </div>
            <p>Tianjin Minsco International Trade CO., LTD</p>
        </div>
        <a href="#top_tag" class="to_top">
            <nav class="bottom_menu">
                <div class="">
                   <p><img src="/mobile/img/top_.png" alt="">TOP</p>
                </div>
            </nav>
        </a>
    </footer>
<!--侧边菜单-->
    <nav class="side_menu">
        <nav class="side_menu_content">
            <i class="side_menu_content_bar" aria-hidden="true"><img src="/mobile/img/home_close.png" alt="" style="margin-top: 10px"></i>
            <div>
                <p><a href="<?php echo yii\helpers\Url::to(['home/index'])?>">Home</a></p>
                <p><a href="<?php echo yii\helpers\Url::to(['product/index'])?>">Products</a></p>
                <p><a href="<?php echo yii\helpers\Url::to(['aboutus/index'])?>">About Us</a></p>
                <p><a href="<?php echo yii\helpers\Url::to(['aboutus/technology'])?>">Certificates</a></p>
                <p><a href="<?php echo yii\helpers\Url::to(['support/faq'])?>">FAQ</a></p>
                <p><a href="<?php echo yii\helpers\Url::to(['contactus/index'])?>">Contact Us</a></p>

            </div>
        </nav>
    </nav>



<script src="/mobile/js/main.js"></script>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-89275117-1', 'auto');
        ga('send', 'pageview');

    </script>

    <script type="text/javascript">
        /* <![CDATA[ */
        var google_conversion_id = 865051535;
        var google_custom_params = window.google_tag_params;
        var google_remarketing_only = true;
        /* ]]> */
    </script>
    <script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
    </script>
    <noscript>
        <div style="display:inline;">
            <img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/865051535/?guid=ON&amp;script=0"/>
        </div>
    </noscript>

    <script src="/js/jquery.cookie.js"></script>
</body>
</html>