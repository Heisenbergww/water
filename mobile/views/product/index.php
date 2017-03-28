<link rel="stylesheet" href="/mobile/css/product.css">
<link rel="stylesheet" href="/mobile/css/font-awesome.min.css">

<!--主体部分-->

<section class="product_menu_low">
    <h3><?php echo $catetitlef['title']?><span><img src="/mobile/img/open_down.png" alt=""></span></h3>
</section>

<!--弹出层菜单-->
<section class="product_menu_top product_menu_top_fixed">
    <div class="product_menu_top_up_level">
        <div class="product_menu_top_fa the_all_product">
            <a href="<?php echo yii\helpers\Url::to(['product/index']) ?>" class="product_menu_top_fa_title">
                <h3 >All Products</h3>
            </a>
            <hr>
        </div>
        <?php foreach($menu as $m):?>
            <div class="product_menu_top_fa the_category_product">
                <h3 class="product_menu_top_fa_title"><?php echo $m['title']?><span><img src="/mobile/img/open_down.png" alt=""></span></h3>
                <?php foreach($m['children'] as $cate):?>
                    <a href="<?php echo yii\helpers\Url::to(['product/index', 'cateid' => $cate['cateid']]) ?>" class="product_menu_top_fa_content">
                        <p><?php echo $cate['title']?></p>
                    </a>
                <?php endforeach;?>
                <hr>
            </div>
        <?php endforeach;?>
    </div>
    <div class="product_menu_top_down_level"></div>
</section>

<section class="section1 clearfix container">
    <?php foreach($products as $pro):?>
    <a href="<?php echo yii\helpers\Url::to(['product/detail', 'productid' => $pro['productid']]) ?>">
        <div class="category_product">
            <div class="product">
                <div class="product_pic">
                    <img src="/<?php echo $pro["cover"]?>" alt="">
                </div>
                <p class="product_word"><?php echo $pro['title']?></p>
            </div>
        </div>
    </a>
    <?php endforeach;?>
</section>


<div class="pagination clearfix" style="" id="pagination_product">
    <?php echo yii\widgets\LinkPager::widget([
        'pagination' => $pager,
    'prevPageLabel' => '&#8249;',
    'nextPageLabel' => '&#8250;',
    ]); ?>
</div>

<script>
    $(document).ready(function(){
        
//        点击展开顶部二级菜单
        var productCategoryFa=$(".product_menu_top_fa_title");
        productCategoryFa.click(function(){
            $(this).nextAll().toggle();
            $(this).nextAll("hr").css({"display":"block"});
        })
//        点击展开顶部菜单
        $(".product_menu_low").click(function(){
            $(".product_menu_top").show();
        })
        $(".product_menu_top_down_level").click(function(){
            $(".product_menu_top").hide();
        })
    })
</script>