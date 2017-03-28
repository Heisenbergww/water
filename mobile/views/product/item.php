<link rel="stylesheet" href="/mobile/css/item.css">
<!--主体部分-------------------------------------------------------------->
<section class="section"></section>
<section class="section1 clearfix">
    <h1 class="product-title"><?php echo $product['title']?></h1>
    <div class="description clearfix">
        <div class="description-content clearfix">
            <?php echo $product['descr']?>
        </div>
    </div>
    <div class="product-contact-us clearfix">
        <a href="<?php echo yii\helpers\Url::to(['/mobile/contactus/index'])?>">Contact Us</a>
        <p>Please feel free to contact us,we will  repply you as soon as possiple.</p>
    </div>
    <div class="product-about-us clearfix">
        <h4 class="product-submenu"><span></span>About Us</h4>
        <div class="about-us-content">
            <?php echo $column['detail']?>
        </div>
        <div class="view-more">
            <a href="<?php echo yii\helpers\Url::to(['/mobile/aboutus/index'])?>">View More</a>
        </div>
</section>

<? if (isset($resnew)) :?>
    <section class="container-fluid clearfix section3">
        <div class="row clearfix">
            <h3>You May Alse Like</h3>
            <?php foreach($resnew as $r):?>
                <a href="<?php echo yii\helpers\Url::to(['product/detail', 'productid' => $r['productid']]) ?>">
                    <div class="category_product">
                        <div class="product">
                            <div class="product_pic">
                                <img src="/<?php echo $r["cover"]?>" alt="">
                            </div>
                            <p class="product_word"><?php echo $r['title']?></p>
                        </div>
                    </div>
                </a>
            <?php endforeach;?>
        </div>
    </section>
<? endif ?>

<script>
    $(document).ready(function () {
        writeCookie();
        function writeCookie() {
            var ProductId = window.location.search;
            ProductId = ProductId.replace('?productid=','');
            if($.cookie('pp')) {
                var ProductIds = $.cookie('pp') + '.' + ProductId;
                $.cookie('pp', ProductIds, { expires: 1, path: '/' });
            }else{
                $.cookie('pp', ProductId, { expires: 1, path: '/' });
            }
        }
    })


</script>






