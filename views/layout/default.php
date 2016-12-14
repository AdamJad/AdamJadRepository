<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $title; ?></title>

    <!-- Bootstrap Core CSS -->
    <link href=<?php echo WEBROOT . "web/css/bootstrap.min.css" ?> rel="stylesheet">

    <!-- Custom CSS -->
    <link href=<?php echo WEBROOT . "web/css/sb-admin.css" ?> rel="stylesheet">

    <!-- Custom Fonts -->
    <link href=<?php echo WEBROOT . "web/font-awesome/css/font-awesome.min.css" ?> rel="stylesheet" type="text/css">

    <!--  Custom Css -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../../index.php">SB Admin</a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b
                        class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="<?php echo WEBROOT . "user/disconnection" ?>"><i class="fa fa-fw fa-power-off"></i> Log
                            Out</a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#article"><i
                            class="fa fa-fw fa-file"></i> Article <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="article" class="collapse">
                        <li>
                            <a href="<?php echo WEBROOT . "article/newarticle" ?>">Nouveau article</a>
                        </li>
                        <li>
                            <a href="<?php echo WEBROOT . "article/displayarticles" ?>">Liste des articles</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#user"><i
                            class="fa fa-fw fa-user"></i> Utilisateur <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="user" class="collapse">
                        <li>
                            <a href="<?php echo WEBROOT . "user/newuser" ?>">Nouveau Utilisateur</a>
                        </li>
                        <li>
                            <a href="<?php echo WEBROOT . "user/displayusers" ?>">Liste Utilistateur</a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">

        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        <?php echo $title; ?>
                    </h1>

                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <?php echo $content_for_layout ?>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="<?php echo WEBROOT . "web/js/jquery.js" ?>"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo WEBROOT . "web/js/bootstrap.min.js" ?>"></script>

<!--  Custom JavaScript -->
<?php
if (is_array($data)) {
    if (!empty($data["js"])) {
        foreach ($data["js"] as $url) {
            ?>
            <script type="text/javascript" src="<?php echo WEBROOT . "web/" . $url . ".js" ?>"></script>
            <?php
        }
    }
}
?>

</body>

</html>
