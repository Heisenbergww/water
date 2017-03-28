<link rel="stylesheet" href="/assets/admin/css/compiled/user-list.css" type="text/css" media="screen" />
<!-- main container -->
<div class="content">
    <div class="container-fluid">
        <div id="pad-wrapper" class="users-list">
            <div class="row-fluid header">
                <h3>商品列表</h3>
                <div class="span10 pull-right">
                    <a href="<?php echo yii\helpers\Url::to(['product/add']) ?>" class="btn-flat success pull-right">
                        <span>&#43;</span>
                        添加新商品
                    </a>
                </div>
            </div>

            <!-- Products table -->
            <div class="row-fluid table">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="span3 sortable">
                                <span class="line"></span>商品名称
                            </th>
                            <th class="span2 sortable">
                                <span class="line"></span>商品ID
                            </th>
                            <th class="span2 sortable">
                                <span class="line"></span>添加时间
                            </th>
                            <th class="span3 sortable align-right">
                                <span class="line"></span>操作
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    <!-- row -->
                    <?php foreach($products as $product): ?>
                    <tr class="first">
                        <td>
                            <img src="/<?php echo $product['cover']?>" class="img-circle avatar hidden-phone" />
                            <a href="#" class="name"><?php echo $product['title']?></a>
                        </td>
                        <td>
                            <?php echo $product['productid']?>
                        </td>
                        <td>
                           <?php echo date('Y-m-d H:m:s',$product['createtime'])?>
                        </td>
                       
                        <td class="align-right">
                        <a href="<?php echo yii\helpers\Url::to(['product/mod', 'productid' => $product->productid]); ?>">编辑</a>
                        <a href="<?php echo yii\helpers\Url::to(['product/del','productid'=>$product->productid]);?>">删除</a>
                        <a href="<?php echo yii\helpers\Url::to(['product/relation','productid'=>$product->productid]);?>">关联</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="pagination pull-right">
                <?php echo yii\widgets\LinkPager::widget([
                    'pagination' => $pager,
                    'prevPageLabel' => '&#8249;',
                    'nextPageLabel' => '&#8250;',
                ]); ?>
            </div>
            <!-- end Products table -->
        </div>
    </div>
</div>
<!-- end main container -->
