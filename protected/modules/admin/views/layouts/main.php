<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>( ˘•ω•˘ )</title>
    <link rel="icon"type="image/png"href="<?php echo Yii::app()->request->baseUrl;?>/images/title.jpg">

    <link href="//cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="//cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl ?>/assets/editor/css/editormd.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/css/metisMenu.min.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css">
    <link href="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/css/sb-admin-2.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/css/font-awesome.min.css" rel="stylesheet"
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div id="wrapper">

    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0;z-index:998">
        <!--标题-->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo $this->createUrl("index/index")?>">iszwl</a>
        </div>
        <!--个人设置-->
        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                    </li>
                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="<?php echo $this->createUrl('login/out') ?>"><i class="fa fa-sign-out fa-fw"></i>
                            Logout</a>
                    </li>
                </ul>
            </li>
        </ul>
        <!--左侧菜单-->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">

                    <li class="sidebar-search">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </li>

                    <li>
                        <a href="<?php echo $this->createUrl("index/index")?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>

                    <?php foreach(Menu::getMenuList() as $v){;?>
                        <li>
                            <a href='<?php echo $this->createUrl("$v->c/$v->f")?>'><i class='fa fa-<?php echo $v->i;?>  fa-fw'></i> <?php echo $v->name;?></a>
                        </li>
                    <?php }?>

                </ul>
            </div>
        </div>
    </nav>

    <div id="page-wrapper">
        <?php echo $content ?>
    </div>

    <!-- jQuery -->
    <script src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/js/jquery-1.11.0.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/js/bootstrap.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl ?>/assets/editor/editormd.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/js/metisMenu.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/js/dataTables.responsive.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/js/sb-admin-2.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                responsive: true
            });
        });
    </script>
</body>
</html>
