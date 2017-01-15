<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script   src="https://code.jquery.com/jquery-3.1.0.min.js"   integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s="   crossorigin="anonymous"></script>
</head>
<body>
<div id='log' style='width:50%;height:200px;overflow:auto;margin:0 auto;border:1px solid grey;'>
</div>
<br/>
<div style='width:50%;height:200px;margin:0 auto;'>
    <textarea cols="80"></textarea>
    <br/>
    <button onclick="push();">push</button>
    <button onclick="close();">close</button>
</div>
<script>
    var ws = new WebSocket("ws://localhost:5000");
    ws.onopen = function(){
        console.log("连接成功");
    };
    ws.onmessage = function(msg){
        $('#log').append(msg);
    }
    ws.onclose = function(){
        console.log(ws.readyState);
    }

    function push(){
        var content = $('textarea').val();
        console.log(content);
        ws.send(content);
    }
    function close(){
        ws.close();
    }
</script>
</body>
</html>
