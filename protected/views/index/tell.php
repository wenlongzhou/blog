<br><br><br><br><br>

<div class="row" style="margin-bottom:6rem">
    <div class="col-md-3 hidder-xs"></div>
    <div class="col-md-6 row">
        <div style='width:100%;margin:0 auto;height:400px;border:1px solid #aaa;overflow-y: auto;padding:10px;' id='history'></div>
        <br>
        <div style='width:100%;margin:0 auto;'>
            <textarea rows=3 cols=35 id='cont'></textarea>
            <br>
            <button class='btn btn-default' id='send'>发送</button>
        </div>
    </div>
    <div class="col-md-3 hidder-xs"></div>
</div>

<script>
    ws = new WebSocket("ws://23.83.226.37:2346");
    ws.onopen = function() {
        var a = prompt('请输入昵称，为空则会自动生成一个呢称。。。','');
        ws.send('z-n#'+a);
        console.log("连接成功");
    };
    ws.onmessage = function(e) {
        $('#history').append(e.data+'<br>');
        var div = document.getElementById('history');
        div.scrollTop = div.scrollHeight;//收到消息后滚动条移到最下面
    };
    $('#send').click(function(){
        var s = $('#cont').val();
        s = s.replace(/[\r,\n,\r\n]/ig,'');//过滤换行
        if(s !== ''){
            ws.send(s);
            $('#cont').focus(); //使发完消息焦点还在输入框
        }
        $('#cont').val('');
    });

    //按下回车
    document.onkeydown = function(e){
        if(!e) e = window.event;//火狐中是 window.event
        if((e.keyCode || e.which) == 13){
            document.getElementById("send").click();
        }
    }
</script>
