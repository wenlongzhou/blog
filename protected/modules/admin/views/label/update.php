<br/>
<div class="panel panel-default">
    <div class="panel-heading">
        <a href='<?php echo $this->createUrl('label/index')?>' style="color:#666">返回列表</a>
    </div>
    <div class="panel-body">
        <?php $form = $this->beginwidget('CActiveForm') ?>
        <div class="form-group">
            <div class="row">
                <div class="col-lg-2 col-md-3 col-sm-3" align="right" style="line-height:34px">
                    <?php echo $form->labelEX($model, 'value'); ?>
                </div>
                <div class="col-lg-6 col-md-7 col-sm-7">
                    <?php echo $form->textField($model, 'value' ,array('class'=>'form-control','value'=>$data->value));?>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2" style="color:orangered;font-size: 0.8rem;line-height:34px">
                    <?php echo $form->error($model,'value'); ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-lg-2 col-md-3 col-sm-3" align="right" style="line-height:34px">
                    <?php echo $form->labelEX($model, 'image'); ?>
                </div>
                <div class="col-lg-6 col-md-7 col-sm-7">
                    <?php echo $form->textField($model, 'image' ,array('class'=>'form-control','value'=>$data->image)); ?>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2" style="color:orangered;font-size: 0.8rem;line-height:34px">
                    <?php echo $form->error($model,'image'); ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4"></div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <button class="btn btn-default" type="submit">提交</button>
                <button class="btn btn-default" type="reset">重置</button>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4"></div>
        </div>
        <?php $this->endwidget(); ?>
    </div>
</div>
</div>