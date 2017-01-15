<style>
    #content .text {
        max-height: 30rem;
        overflow: hidden;
        margin-left:1rem;
    }
</style>
<div class="row content">
    <div class="col-md-3 hidden-sm"></div>
    <div class="col-md-6 contents">

        <?php foreach ($data as $v) { ?>
            <div class="header">
                <a href="<?php echo $this->createUrl('article/info&c=' . $v['id'] . (isset($_GET['s']) ? '&s=' . $_GET['s'] : '')) ?>"><?php echo $v['title'] ?></a>
            </div>
            <div class="desc">发表于 <?php echo $v['update_time'] ?> | 分类于
                <a href='<?php echo $this->createUrl('article/index', array('tid' => $v['tag_id'])); ?>'><?php echo $v['tab']['value'] ?></a>
            </div>
            <div class="text">
                <?php echo $v['content'] ?>
            </div>
            <div class="foot">
                <a href="<?php echo $this->createUrl('article/info&c=' . $v['id'] . (isset($_GET['s']) ? '&s=' . $_GET['s'] : '')) ?>">阅读全文</a>
            </div>
            <br>
            <div class="line"></div><br>
        <?php } ?>

    </div>
    <div class="col-md-3 hidden-sm"></div>
</div>
