<link rel="stylesheet" href="/mobile/css/pdf_download.css">

<!--主体部分-->
<section class="section"></section>
<section class="section0"></section>

<?php foreach($products as $pro):?>
<section class="section1 clearfix container">
    <h1><?php echo $pro['title']?></h1>    
    <div class="category_pdf">
        <?php foreach($pro["product"] as $pp):?>
        <div class="pdf">
            <div class="pdf_pic">
                <img   src="<?php echo $pp["cover"]?>" alt="">
            </div>
            <p class="pdf_word"><?php echo $pp["title"]?></p>
            <a href="<?php echo $pp["pdf"]?>" class="download_btn"><i class="fa fa-download" aria-hidden="true"></i>DOWNLOAD</a>
        </div>
        <div class="tanchuang">
            <img class="tanchuang_img" src="<?php echo $pp["cover"]?>" alt="">
            <img  class="close" src="/mobile/img/close.png" alt="">
        </div>
        <?php endforeach;?>
    </div>
    
    
</section>
<?php endforeach;?>






