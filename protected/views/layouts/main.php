<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="en">
    <!--禁止缩放-->
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <style>
        .navbar {
            border-bottom: 1px solid #bbb;
        }
        body {
            background-image: url('<?php echo Yii::app()->request->baseUrl?>/assets/home/image/bg1.jpg') !important;
            font-size: 1rem;
        }
        .navbar-nav>li>a {
            padding-top: 10px;
            padding-bottom: 10px;
        }
        .navbar-header a {
            height: 0;
        }
        .navbar-brand {
            height: 40px;
            padding-top: 10px;
        }
        .navbar {
            min-height: 40px;
        }
        .navbar-toggle {
            margin-top: 4px;
            margin-bottom: 4px;
        }
        .navbar-form{
            margin-top: 5px;
            margin-bottom: 5px;
        }
        .navbar-form .form-control{
            height:30px;
        }
        .main .content{
            height:100px;
            margin-bottom: 20px;
        }
        hr{
            margin:0;
        }
    </style>
</head>
<body>
<!--navbar start-->
<nav class="navbar navbar-default">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Brand</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
                <li><a href="#">Link</a></li>
                <li><a href="#">Link</a></li>
                <li><a href="#">Link</a></li>
            </ul>
            <form class="navbar-form navbar-right">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                        <button class="btn btn-default btn-sm" type="submit">Go!</button>
                    </span>
                </div>
            </form>

        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
<!--navbar end-->

<!--main start-->
<?php echo $content?>
<!--main end-->
<script src="http://libs.baidu.com/jquery/1.9.0/jquery.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>
</html>
