<?php
    use yii\helpers\Html;
    use yii\filters\PageCache;
?>
<link rel="stylesheet" href="assets/admin/css/compiled/user-list.css" type="text/css" media="screen" />
<!-- main container -->
<div class="content">
    
    <div class="container-fluid">
        <div id="pad-wrapper" class="users-list">
            <div class="row-fluid header">
                <h3>contact us留言板列表</h3>
            </div>

            <!-- Products table -->
            <div class="row-fluid table">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="span1 sortable">
                                <span class="line"></span>序号
                            </th>
                            <th class="span1 sortable">
                                <span class="line"></span>姓名
                            </th>
                            <th class="span1 sortable">
                                <span class="line"></span>手机号
                            </th>
                            <th class="span1 sortable">
                                <span class="line"></span>邮箱
                            </th>
                            <th class="span2 sortable">
                                <span class="line"></span>详细内容
                            </th>
                            <th class="span2 sortable">
                                <span class="line"></span>浏览过的
                            </th>
                            <th class="span2 sortable">
                                <span class="line"></span>用户ip
                            </th>
                            <th class="span2 sortable">
                                <span class="line"></span>时间
                            </th>
<!--                             <th class="span3 sortable align-right">
                                <span class="line"></span>操作
                            </th> -->
                        </tr>
                    </thead>
                    <tbody>
                    <!-- row -->
                   <?php foreach($messages as $mes):?>
                    <tr class="first">
                        <td>
                            <?php echo $mes['messageid'];?>
                        </td>
                        <td>
                           <?= Html::encode($mes['name']) ?>
                        </td>
                        <td>
                            <?= Html::encode($mes['phone']) ?>
                        </td>
                        <td>
                            <?= Html::encode($mes['email']) ?>
                        </td>
                        <td>
                            <?= Html::encode($mes['detail']) ?>
                        </td>
                        <td class="seen-products">
                            <?= Html::encode($mes['pls']) ?>
                        </td>
                        <td>
                            <?= Html::encode($mes['ip']) ?>
                        </td>
                        <td>
                           <?php echo date('Y-m-d H:i:s',$mes['createtime']);?>
                        </td>
                       <!--  <td class="align-right">
                            <a href="">编辑</a>
                            <a href="">删除</a>
                        </td> -->
                    </tr>
                    <?php endforeach;?>
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
<script src="/assets/js/jquery-3.1.0.min.js"></script>
<script>
    $(document).ready(function () {
        for(var k = 0; k < $('.seen-products').length; k++){
            var seenProducts = $('.seen-products')[k].innerText;
            if(seenProducts!= ''){
                var productList = seenProducts.split(',');
                var lastProduct = productList[productList.length - 1];
                lastProduct = lastProduct.split("&");
                productList.sort();
                var newProductList = [];
                for(var i=0;i<productList.length;i++) {
                    var items=productList[i];
                    //判断元素是否存在于new_arr中，如果不存在则插入到new_arr的最后
                    if($.inArray(items,newProductList)==-1) {
                        newProductList.push(items);
                    }
                }
                $('.seen-products')[k].innerText = '';
                for(var j=0;j<newProductList.length;j++){
                    var pItem = document.createElement('a');
                    var npl=newProductList[j].split("&");
                    pItem.innerText += '商品ID' + npl[0] + '、';
                    pItem.href = '/product/detail.html?productid=' + npl[0];
                    $('.seen-products')[k].appendChild(pItem);
                }
                var pItemLast = document.createElement('a');
                pItemLast.innerText += '最后浏览的商品ID为' + lastProduct[0];
                pItemLast.href = '/product/detail.html?productid=' + lastProduct[0];
                $('.seen-products')[k].appendChild(pItemLast);
            }else{
                $('.seen-products')[k].innerText = '该访客未浏览商品';
            }
        }

    })
</script>