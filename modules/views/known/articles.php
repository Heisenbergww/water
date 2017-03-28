<link rel="stylesheet" href="/assets/admin/css/compiled/user-list.css" type="text/css" media="screen" />
<!-- main container -->
<div class="content">
    <div class="container-fluid">
        <div id="pad-wrapper" class="users-list">
            <div class="row-fluid header">
                <h3>用水常识列表</h3>
                <div class="span10 pull-right">
                    <a href="<?php echo yii\helpers\Url::to(['known/add']) ?>" class="btn-flat success pull-right">
                        <span>&#43;</span>
                        添加用水常识
                    </a>
                </div>
            </div>

            <!-- Products table -->
            <div class="row-fluid table">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="span3 sortable">
                                <span class="line"></span>标题
                            </th>
                            <th class="span2 sortable">
                                <span class="line"></span>是否展示
                            </th>
                            <th class="span2 sortable">
                                <span class="line"></span>发布人
                            </th>
                            <th class="span3 sortable">
                                <span class="line"></span>添加时间
                            </th>
                            <th class="span3 sortable align-right">
                                <span class="line"></span>操作
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    <!-- row -->
                    <?php foreach($articles as $art):?>
                    <tr class="first">
                        <td>
                           <?php echo $art['title']?>
                        </td>
                        <td>
                            <?php 
                            $is=['不展示','展示'];echo $is[$art->isshow];
                            ?>
                        </td>
                        <td>
                            <?php echo $art['adminuser']?>
                        </td>
                        <td>
                           <?php echo date('Y-m-d H:i:s',$art['createtime'])?>
                        </td>
                       
                        <td class="align-right">
                        <a href="<?php echo yii\helpers\Url::to(['known/mod', 'articleid' => $art->articleid]); ?>">编辑</a>
                        <a href="<?php echo yii\helpers\Url::to(['known/on','articleid'=>$art->articleid]);?>">展示</a>
                        <a href="<?php echo yii\helpers\Url::to(['known/off','articleid'=>$art->articleid]);?>">不展示</a>
                        <a href="<?php echo yii\helpers\Url::to(['known/del','articleid'=>$art->articleid]);?>">删除</a>
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
