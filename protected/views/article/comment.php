<?php
foreach ($data as $K => $v) {
?>
    <div class="reply">
        <img src='<?php echo  $v['img'] ?>'/>

        <div>
            <span class="nickname" uid="<?php echo $v['id']?>"><?php echo  $v['nickname']; ?></span>
            <?php echo $v['prev']>0?'回复 <span>'.Reply::getNickByPrev($v['prev']).'</span>':'';?> :
            <?php echo  $v['content'] ?>
        </div>
    </div>

    <div style="clear:both"></div>
    <div class="time"><a href="#commentInput" puid="<?php echo $v['id'];?>">回复<i class="glyphicon glyphicon-share-alt">&nbsp;&nbsp;</i></a>发布于：<?php echo $v['create_time']?></div>
    <div class="line"></div><br/>
<?php
}
echo '<br/><br/>';
?>