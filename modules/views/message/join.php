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
                <h3>join us留言板列表</h3>
            </div>

            <!-- Products table -->
            <div class="row-fluid table">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="span2 sortable">
                                <span class="line"></span>序号
                            </th>
                            <th class="span2 sortable">
                                <span class="line"></span>姓名
                            </th>
                            <th class="span2 sortable">
                                <span class="line"></span>手机号
                            </th>
                            <th class="span2 sortable">
                                <span class="line"></span>国家
                            </th>
                            <th class="span2 sortable">
                                <span class="line"></span>邮箱
                            </th>
                            <th class="span2 sortable">
                                <span class="line"></span>偏好
                            </th>
                            <th class="span6 sortable">
                                <span class="line"></span>详细内容
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
                            <?= Html::encode($mes['tel']) ?>
                        </td>
                        <td>
                            <?= Html::encode($mes['country']) ?>
                        </td>
                        <td>
                            <?= Html::encode($mes['email']) ?>
                        </td>
                        <td>
                            <?= Html::encode($mes['interest']) ?>
                        </td>
                        <td>
                            <?= Html::encode($mes['comment']) ?>
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
