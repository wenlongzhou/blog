<!DOCTYPE html>
<html font-size: 62.5%>
<head>
    <title>눈_눈</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="en">
    <!--禁止缩放-->
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="icon"type="image/png"href="<?php echo Yii::app()->request->baseUrl;?>/images/title.jpg">
    <link href="//cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl;?>/assets/editor/css/editormd.min.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl;?>/assets/home/css/index.css">
    <script src="//cdn.bootcss.com/jquery/3.1.0/jquery.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl;?>/assets/home/js/comment.js"></script>
</head>
<body>
<a class="btn btn-default glyphicon glyphicon-chevron-up" href="javascript:"></a>
<div id="flash"></div>


<div class="row z-nav">
    <div class="hidden-sm hidden-xs blank col-md-3"></div>
    <div class="col-md-2 col-sm-12">
        <a href="<?php echo $this->createUrl('article/index');?>"><img src='<?php echo Yii::app()->request->baseUrl;?>/images/logo.jpg' style="cursor:pointer"></a>
    </div>
    <div class="col-md-4 col-sm-12 row" style="padding:0">
        <div class="m-list col-md-2 hidden-xs"></div>
        <div class="m-list col-md-2 col-xs-3"><a href='<?php echo $this->createUrl('article/zwl');?>'>ABOUT</a></div>
        <div class="m-list col-md-2 col-xs-3"><a href='<?php echo $this->createUrl('article/list');?>'>ARCHIVE</a></div>
        <div class="m-list col-md-2 col-xs-3"><a href='<?php echo $this->createUrl('index/label');?>'>TAGS</a></div>
        <div class="m-list col-md-2 col-xs-3" id="search">
            <input type='text' style="float:left"/>
            <span><a href='javascript:;'>SEARCH</a></span>
        </div>
    </div>
    <div class="hidden-sm hidden-xs blank col-md-3"></div>
</div>

<?php echo $content ?>

<div id="footer">
    浙ICP备15041236号-1
</div>
<!--model-->
<div class="modal fade" id="myAlert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">╮(╯▽╰)╭</h4>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">朕知道了</button>
            </div>
        </div>
    </div>
</div>
<!--model-->
<script src="//cdn.bootcss.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script>
    (function () {
        //菜单
        $('.m-list').on('mouseover', function () {
            $(this).find('a').addClass('m-active');
        });
        $('.m-list').on('mouseout', function () {
            $(this).find('a').removeClass('m-active');
        });
        //搜索栏
        $('#search > span').on('click', function () {
            $(this).fadeOut();
            $('.m-list:lt(4)').fadeOut(function(){
                $('#search > input').show();
                $('#search').attr('class','m-list col-md-12 col-xs-12');
                $('#search input').animate({width: '50%', opacity: 1});
                $('#search input').focus();
            });
        });
        $('#search input').on('blur', function () {
            $(this).animate({width: '0', opacity: 0 },'fase',function(){
                $(this).parent().attr('class','m-list col-md-2 col-xs-2');
                $('#search > input').hide();
                $('.m-list:lt(4)').fadeIn(function(){
                    $('#search > span').fadeIn();
                });
            });

            var s = $(this).val();
            if(s !== ''){
                location.href = "index.php?r=article/index&s="+s;
            }
        });
        //底部固定;
        if($('body').height()<window.screen.height){
            $('#footer').css('position','fixed');
            $('#footer').css('bottom','0');
        }
        //回车事件
        $(document).keydown(function(event){
            if(event.keyCode==13 && $('#search').children().css('display')=='block'){
                $('#search input').trigger('blur');
            }
        });

        if (navigator.geolocation){
            navigator.geolocation.getCurrentPosition(showPosition);
        }
        function showPosition(position){
            var url = 'index.php?r=index/GetPosition&p='+position.coords.latitude +','+ position.coords.longitude;
            $.get(url);
        }
        //返回顶部
        $('.glyphicon-chevron-up').on('click',function(){
            $('body,html').animate({scrollTop:0},500);
        })
        window.onscroll = function(){
            if(document.body.scrollTop > 0){
                $('.glyphicon-chevron-up').show();
            }else if(document.body.scrollTop == 0){
                $('.glyphicon-chevron-up').hide();
            }
        }
    }());
</script>
</body>
</html>
