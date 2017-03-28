<link rel="stylesheet" href="/assets/admin/css/compiled/user-list.css" type="text/css" media="screen" />
<!-- main container -->
<div class="content">
    <div class="container-fluid">
        <div id="pad-wrapper" class="users-list">
            <div class="row-fluid header">
                <h3>列表</h3>               
            </div>

            <!-- Products table -->
            <div class="row-fluid table">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th class="span3 sortable">
                            <span class="line"></span>内容详情
                        </th>
                        <th class="span3 sortable align-right">
                            <span class="line"></span>操作
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- row -->
                    <?php foreach($some as $s):?>
                        <tr class="first">
                            <td>
                                <?php echo $s['detail']?>
                            </td>
                          

                            <td class="align-right">
                                <a href="<?php echo yii\helpers\Url::to(['column/mod', 'columnid' => $s->columnid]); ?>">编辑</a>
                            </td>
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
