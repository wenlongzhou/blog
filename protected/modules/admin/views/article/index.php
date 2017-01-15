<?php if (Yii::app()->user->hasFlash('success')) { ?>
    <div class="alert alert-success alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <strong><?php echo Yii::app()->user->getFlash('success')?></strong>
    </div>
<?php } ?>
<div class="row">
    <div class="col-lg-12">
        <a href="<?php echo $this->createUrl('article/add') ?>" class="btn btn-default" style="margin-top:50px"><i
                class="fa fa-plus"></i>&nbsp;添加</a>
        <hr/>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                &nbsp;
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th style="width:10%">index</th>
                            <th style="width:20%">标题</th>
                            <th style="width:50%">路径</th>
                            <th style="width:10%">标签</th>
                            <th style="width:10%">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($data as $k => $v) { ?>
                            <tr class="odd gradeX">
                                <td><?php echo (int)$k + 1; ?></td>
                                <td><?php echo $v['title']; ?></td>
                                <td><?php echo $v['path']; ?></td>
                                <td><?php echo $v['value']; ?></td>
                                <td>
                                    <a href="<?php echo $this->createUrl('article/update', array('id' => $v['id'])); ?>"
                                       class="btn btn-primary btn-xs">修改</a>
                                    <a href="<?php echo $this->createUrl('article/delete', array('id' => $v['id'],'link' => $v['path'])); ?>"
                                       class="btn btn-danger btn-xs" onclick="return confirm('确认要删除吗？')">删除</a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->