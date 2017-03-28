<!--单独引用-->
<link rel="stylesheet" href="/mobile/css/home.css">
<link rel="stylesheet" href="/mobile/owlcarousel/owl.carousel.min.css">
<link rel="stylesheet" href="/mobile/owlcarousel/owl.theme.default.min.css">
<script src="/mobile/owlcarousel/owl.carousel.min.js"></script>
<link rel="stylesheet" href="/mobile/css/swiper-3.3.1.min.css">



<!--主体部分-------------------------------------------------------------->
<!--轮播-->
<section class="section0  clearfix banners">
    <div class="owl-carousel owl-theme ppt">
        <?php foreach($model as $im):?>
        <div class="item">
            <a href=""><img src="/<?php echo $im['cover']?>" alt=""></a>
        </div>
        <?php endforeach;?>
    </div>
</section>


<nav class="clearfix">
    <div>
        <ul class=" ">
            <li><a href="/mobile/home/index.html" class=""><span>Home</span></a></li>
            <li><a href="/mobile/product/index.html"><span>Products</span></a></li>
            <li><a href="/mobile/aboutus/index.html"><span>About Us</span></a></li>
            <li><a href="/mobile/aboutus/technology.html"><span>Certificates</span></a></li>
            <li><a href="/mobile/support/faq.html"><span>FAQ</span></a></li>
            <li><a href="/mobile/contactus/index.html"><span>Contact Us</span></a></li>
        </ul>
    </div>
</nav>

<section class="clearfix home-about-us home-column">
    <h6>About Us<span><a href="/mobile/aboutus/index.html">more</a></span></h6>
    <div class="column-container">
        <?php echo $column['detail'] ?>
    </div>
</section>

<section class="clearfix home-contact-us home-column">
    <h6>Contact Us<span><a href="/mobile/contactus/index.html">more</a></span></h6>
    <div class="column-container">
        <p><span>Company Name：</span><?php echo $company['companyname']?></p>
        <p><span>Email：</span><a href="mailto:<?php echo $company['companyemail']?>"><?php echo $company['companyemail']?></a></p>
        <p><span>TEL：</span><?php echo $company['companytel']?></p>
        <p><span>Address:</span><?php echo $company['companyaddress']?></p>
        <p><span>Mobile：</span><?php echo $company['companymobile']?></p>
        <p><span>Fax：</span><?php echo $company['companyfax']?></p>
        <p><span>Website：</span><?php echo $company['website']?></p>
    </div>
</section>

<section class="clearfix home-product home-column">
    <h6>Product<span><a href="/mobile/product/index.html">more</a></span></h6>
    <div class="column-container">
        <div class="swiper-container-home swiper-container">
            <div class="swiper-wrapper">
                <?php foreach($product as $pro):?>
                    <div class="swiper-slide">
                        <a href="<?php echo yii\helpers\Url::to(['product/detail', 'productid' => $pro['productid']]) ?>">
                            <div class="recommend">
                                <div class="recommend_pic">
                                    <img   src="/<?php echo $pro['cover']?>" alt="">
                                </div>
                                <p class="recommend_word"><?php echo $pro['title']?></p>
                            </div>
                        </a>
                    </div>
                <?php endforeach;?>
            </div>
            <!-- 如果需要导航按钮 -->
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>
</section>



<!--单独引用-->
<!--轮播-->
<script src="/mobile/js/swiper.min.js"></script>
<script>
    $(document).ready(function(){
        //轮播
        $('.owl-carousel').owlCarousel({
            items: 1,
            loop: true,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true
        })
    })
    //轮播2
    var mySwiperHome = new Swiper ('.swiper-container-home', {
        pagination : '.swiper-pagination',
        paginationType : 'fraction',
        paginationClickable: true,
        prevButton:'.swiper-button-prev',
        nextButton:'.swiper-button-next',
        slidesPerView: 2,
        slidesPerColumn: 2,
//        autoplay: 3000,
        autoplayDisableOnInteraction:false
    })
</script>

