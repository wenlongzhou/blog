<br/>
<div class="panel panel-default">
    <div class="panel-heading">
        <a href='<?php echo $this->createUrl('admin/index')?>' style="color:#666">返回列表</a>
    </div>
    <div class="panel-body">
        <?php $form = $this->beginwidget('CActiveForm') ?>
        <div class="form-group">
            <div class="row">
                <div class="col-lg-2 col-md-3 col-sm-3" align="right" style="line-height:34px">
                    <?php echo $form->labelEX($model, 'username'); ?>
                </div>
                <div class="col-lg-6 col-md-7 col-sm-7">
                    <?php echo $form->textField($model, 'name' ,array('class'=>'form-control','disabled'=>'1','value'=>$name));?>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2" style="color:orangered;font-size: 0.8rem;line-height:34px">
                    <?php echo $form->error($model,'username'); ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-lg-2 col-md-3 col-sm-3" align="right" style="line-height:34px">
                    <?php echo $form->labelEX($model, 'password'); ?>
                </div>
                <div class="col-lg-6 col-md-7 col-sm-7">
                    <?php echo $form->passwordField($model, 'password' ,array('class'=>'form-control')); ?>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2" style="color:orangered;font-size: 0.8rem;line-height:34px">
                    <?php echo $form->error($model,'password'); ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-lg-2 col-md-3 col-sm-3" align="right" style="line-height:34px">
                    <?php echo $form->labelEX($model, 'password1'); ?>
                </div>
                <div class="col-lg-6 col-md-7 col-sm-7">
                    <?php echo $form->passwordField($model, 'password1' ,array('class'=>'form-control')); ?>
                 </div>
                <div class="col-lg-2 col-md-2 col-sm-2" style="color:orangered;font-size: 0.8rem;line-height:34px">
                    <?php echo $form->error($model,'password1'); ?>
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