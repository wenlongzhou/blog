<div class="row content" style="margin-top:10rem">
    <div class="col-md-3 hidden-sm"></div>
    <div class="col-md-6">
        <?php foreach($data as $v){?>
            <div class="labelList col-md-3 col-sm-2 col-xs-3">
                <a href='<?php echo $this->createUrl('article/index',array('tid'=>$v['id']));?>'>
                    <img src='<?php echo $v['image']?>'/>
                </a>
                <p><?php echo $v['value']?></p>
            </div>
        <?php }?>
    </div>
    <div class="col-md-3 hidden-sm"></div>
</div>

<script>
    $('.labelList img').on('mouseenter',function(){
        $(this).addClass('active');
    });
    $('.labelList img').on('mouseleave',function(){
        $(this).removeClass('active');
    });
</script>