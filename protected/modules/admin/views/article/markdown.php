<head>
    <link rel="stylesheet" href="<?php echo yii::app()->request->baseUrl;?>/assets/mkd/css/editormd.css"/>
</head>
<br/>
<div class="panel panel-default">
    <div class="panel-heading">
        <a href='<?php echo $this->createUrl('article/index') ?>' style="color:#666">返回列表</a>
    </div>
    <div class="panel-body">
        <?php $form = $this->beginwidget('CActiveForm') ?>
        <div class="form-group">
            <div class="row">
                <div class="col-lg-2 col-md-3 col-sm-3" align="right" style="line-height:34px">
                    <?php echo $form->labelEX($model, 'title'); ?>
                </div>
                <div class="col-lg-6 col-md-7 col-sm-7">
                    <?php echo $form->textField($model, 'title', array('class' => 'form-control', 'value' => $data['title'])); ?>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2" style="color:orangered;font-size: 0.8rem;line-height:34px">
                    <?php echo $form->error($model, 'title'); ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-lg-2 col-md-3 col-sm-3" align="right" style="line-height:34px">
                    <?php echo $form->labelEX($model, 'tag_id'); ?>
                </div>
                <div class="col-lg-6 col-md-7 col-sm-7">
                    <select class="form-control" name="Article[tag_id]">
                        <?php foreach ($label as $v) { ?>
                            <option
                                value="<?php echo $v->id; ?>" <?php $data['tag_id'] == $v->id ? 'checked' : ''; ?>><?php echo $v->value; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2" style="color:orangered;font-size: 0.8rem;line-height:34px">
                    <?php echo $form->error($model, 'tag_id'); ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-lg-2 col-md-3 col-sm-3" align="right" style="line-height:34px">
                    <?php echo $form->labelEX($model, 'content'); ?>
                </div>
                <div class="col-lg-6 col-md-7 col-sm-7">
                    <div id="layout">
                        <div id="test-editormd" style="z-index:9999">
                            <textarea style="display:none;">### Bootstrap 兼容测试</textarea>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2" style="color:orangered;font-size: 0.8rem;line-height:34px">
                    <?php echo $form->error($model, 'content'); ?>
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
<script type="text/javascript">
    var testEditor;

    $(function () {

        $.get("<?php echo yii::app()->request->baseUrl;?>/assets/mkd/md/test.md", function (md) {
            testEditor = editormd("test-editormd", {
                width: "90%",
                height: 740,
                path: '<?php echo yii::app()->request->baseUrl;?>/assets/mkd/lib/',
                markdown: md,
                codeFold: true,
                saveHTMLToTextarea: true,
                searchReplace: true,
                htmlDecode: "style,script,iframe|on*",
                emoji: true,
                taskList: true,
                tocm: true,         // Using [TOCM]
                tex: true,                   // 开启科学公式TeX语言支持，默认关闭
                flowChart: true,             // 开启流程图支持，默认关闭
                sequenceDiagram: true,       // 开启时序/序列图支持，默认关闭,
                imageUpload: true,
                imageFormats: ["jpg", "jpeg", "gif", "png", "bmp", "webp"],
                imageUploadURL: "<?php echo yii::app()->request->baseUrl;?>/assets/mkd/php/upload.php",
                onload: function () {
                    console.log('onload', this);
                }
            });
        });
    });
</script>
</body>
</html>