<link rel="stylesheet" href="/assets/admin/css/compiled/user-list.css" type="text/css" media="screen" />
<!-- main container -->
<div class="content">
    <div class="container-fluid">
        <div id="pad-wrapper" class="users-list">
            <div class="row-fluid header">
                <h3>轮播列表</h3>
                <div class="span10 pull-right">
                    <a href="<?php echo yii\helpers\Url::to(['home/add']) ?>" class="btn-flat success pull-right">
                        <span>&#43;</span>
                        添加新轮播
                    </a>
                </div>
            </div>

            <!-- Products table -->
            <div class="row-fluid table">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="span2 sortable">
                                <span class="line"></span>图片
                            </th>
                            <th class="span2 sortable">
                                <span class="line"></span>自定义序号
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
                    <?php foreach($homes as $hom): ?>
                    <tr class="first">
                        <td>
                              <img src="/<?php echo $hom['cover'];?>  " class="img-circle avatar hidden-phone" />
                        </td>
                        <td>
                          <?php echo $hom['orderid'];?>  
                        </td>
                        <td>
                         <?php echo date('Y-m-d H:i;s',$hom['createtime']);?>
                        </td>
                        <td class="align-right">
                        <a href="<?php echo yii\helpers\Url::to(['home/del','imageid'=>$hom->imageid]);?>">删除</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="pagination pull-right">
               

            </div>
            <!-- end Products table -->
        </div>
    </div>
</div>
<!-- end main container -->
