<style>
    .content .header, .content .desc {
        text-align: center;
    }
</style>
<script type="text/javascript" src="http://qzonestyle.gtimg.cn/qzone/openapi/qc_loader.js" data-appid="101355974" data-redirecturi="http://blog.iszwl.cn/qc_callback.html" charset="utf-8"></script>

<div class="row content" id="infoContent">
    <div class="col-md-3 hidden-sm"></div>
    <div class="col-md-6 contents">

        <div class="header"><?php echo $data['title'] ?></div>
        <div class="desc">发表于 <?php echo $data['update_time'] ?> | 分类于 <a
                href='<?php echo $this->createUrl('Article/index',array('tid'=>$data['tag_id']));?>'><?php echo $data['tab']['value'] ?></a>
        </div>
        <div class="text">
            <?php echo $data['content'] ?>
        </div>
        <hr/>
        <br/>
        <span id="qqLoginBtn"></span>
        <br/><br/>
        <script type="text/javascript">
            //调用QC.Login方法，指定btnId参数将按钮绑定在容器节点中
            QC.Login({
                    //btnId：插入按钮的节点id，必选
                    btnId:"qqLoginBtn",
                    //用户需要确认的scope授权项，可选，默认all
                    scope:"all",
                    //按钮尺寸，可用值[A_XL| A_L| A_M| A_S|  B_M| B_S| C_S]，可选，默认B_S
                    size: "B_S"
                }, function(reqData, opts){//登录成功
                    //根据返回数据，更换按钮显示状态方法
                    $('.comment').removeClass('disabled');
                    $('input[name="reply[name]"]').val(reqData.nickname);
                    $('input[name="reply[img]"]').val(reqData.figureurl_qq_1);
                    var dom = document.getElementById(opts['btnId']),
                    _logoutTemplate=[
                        //头像
                        '<span><img src="'+reqData.figureurl_qq_1+'"/></span> ',
                        //昵称
                        '<span>{nickname}</span> ',
                        //退出
                        '<span><a href="javascript:QC.Login.signOut();">退出</a></span>'
                    ].join("");
                    dom && (dom.innerHTML = QC.String.format(_logoutTemplate, {
                        nickname : QC.String.escHTML(reqData.nickname), //做xss过滤
                        figureurl : reqData.figureurl
                    }));
                }, function(opts){//注销成功
                    $('.comment').addClass('disabled');
                    alert('QQ登录 注销成功');
                }
            );
        </script>
        <form action='<?php echo $this->createUrl('Article/AddComment');?>' method="post" onSubmit="return checkreply()">
            <input type='hidden' name="reply[name]" value=""/>
            <input type='hidden' name="reply[img]" value=""/>
            <input type='hidden' name="reply[article_id]" value="<?php echo $data['id']?>"/>
            <input type='hidden' name="reply[pid]" id="info-pid" value="0"/>
            <textarea style="width:100%" id="commentInput" name="reply[content]"></textarea>
            <button type="submit" class="btn btn-default comment disabled">提交</button>
            <div style="float:right">
                <input type='text' name="reply[captcha]" id="info-captcha" placeholder="请输入验证码" value=""/>
                <?php $this->widget('CCaptcha',array(
                    'showRefreshButton'=>false,
                    'clickableImage'=>true,
                ))?>
            </div>
        </form>
    </div>
    <div class="col-md-3 hidden-sm">
        <a class="btn btn-default glyphicon glyphicon-chevron-up" href="#"></a>
    </div>
</div>

<script>
    $(document).on('click','.time>a',function(){
        var nickname = '回复：'+$(this).parent().prev().prev().find('.nickname').html();
        $('#commentInput').attr('placeholder',nickname);
        $('#info-pid').val($(this).parent().prev().prev().find('.nickname').attr('uid'));
    });
    $('#commentInput').on('blur',function(){
        if($(this).val() == ''){
            $('#commentInput').attr('placeholder','');
            $('#info-pid').val(0);
        }
    });
    //发表回复
    function checkreply(){
        if(!$('#commentInput').val()){
            myalert('请输入内容！');
            return false;
        }
        if(!$('#info-captcha').val()){
            myalert('请输入验证码！');
            return false;
        }
        var input = $("form").serialize();
        $.get('<?php echo $this->createUrl('Article/AddComment',array('aid'=>$_GET['c']));?>'+'&'+input,function(data){
            var str = '<div class="alert alert-success alert-dismissible fade in" role="alert">';
            str += '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>';
            str += '</button>';
            str += '<strong>zw</strong>';
            str += '</div>';

            if(data == 'Y'){
                str = str.replace(/zw/,'评论成功！');
                $('#commentInput').val('');
                getcomment();
            }else if(data == 'N'){
                str = str.replace(/zw/,'验证码错误！');
            }
            $('#infoContent').before(str); //提示信息
            $('#info-captcha').next().trigger('click'); //更新验证码
        });
        return false;
    }
    //获取回复
    function getcomment(){
        $.get('<?php echo $this->createUrl('Article/Comment',array('aid'=>$_GET['c']));?>',function(data){
            $('#qqLoginBtn').prevUntil('hr').remove();
            $('#qqLoginBtn').before(data);
        });
    }
    window.onload = getcomment();
</script>