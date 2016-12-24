<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title><?php echo $title; ?></title>

    <!-- Bootstrap Core CSS -->
    <link href=<?php echo WEBROOT . "web/css/bootstrap.min.css" ?> rel="stylesheet">

    <!-- Custom CSS -->
    <link href=<?php echo WEBROOT . "web/css/offcanvas.css" ?> rel="stylesheet">

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
<nav class="navbar navbar-fixed-top navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">SciMS</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
            </ul>
        </div><!-- /.nav-collapse -->
    </div><!-- /.container -->
</nav><!-- /.navbar -->

<div class="container">

    <div class="row row-offcanvas row-offcanvas-right">
        <div class="col-xs-12 col-sm-9">
            <?php
            if (!empty($data["articles"])) {
                ?>
                <p class="pull-right visible-xs">
                    <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Categorie</button>
                </p>
                <div class="jumbotron">
                    <h3><?php echo $data["articles"][0]->getTitle() ?></h3>
                    <p><?php echo substr(preg_replace('/<[^>]*>/', ' ', $data["articles"][0]->getAbstract()), 0, 100) . "..."; ?><a
                            href="<?php echo WEBROOT . "article/displayarticle/" . $data["articles"][0]->getId(); ?>">Lire la suit</a>
                    </p>
                </div>
                <div class="row">
                    <?php
                    for ($i = 1; $i < count($data["articles"]); $i++) {
                        ?>
                        <div class="col-xs-6 col-lg-4">
                            <h2><?php echo $data["articles"][$i]->getTitle() ?></h2>
                            <p><?php echo substr(preg_replace('/<[^>]*>/', ' ', $article->getAbstract()), 0, 100) . "..."; ?></p>
                            <p><a class="btn btn-default"
                                  href="<?php echo WEBROOT . "article/displayarticle/" . $data["articles"][$i]->getId(); ?>"
                                  role="button">Lire la suit &raquo;</a></p>
                        </div><!--/.col-xs-6.col-lg-4-->
                        <?php
                    }
                    ?>

                </div><!--/row-->

                <?php
            }
            ?>
        </div><!--/.col-xs-12.col-sm-9-->

        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
            <div class="list-group">
                <?php

                ?>
                <a href="<?php echo WEBROOT . "article/displayallarticles"; ?>" class="list-group-item active">Tout</a>
                <?php
                foreach ($data["categories"] as $category) {
                    ?>
                    <a href="<?php echo WEBROOT . "article/displayArticlesBy/" . $category->getId(); ?>"
                       class="list-group-item"><?php echo $category->getDescription() ?></a>
                    <?php

                }
                ?>
            </div>
        </div><!--/.sidebar-offcanvas-->
    </div><!--/row-->

    <hr>

    <footer>
        <p>&copy; 2016 Company, Inc.</p>
    </footer>

</div><!--/.container-->

<!-- jQuery -->
<script src="<?php echo WEBROOT . "web/js/jquery.js" ?>"></script>
<script src="<?php echo WEBROOT . "web/js/bootstrap.min.js" ?>"></script>
<script src="<?php echo WEBROOT . "web/js/offcanvas.js" ?>"></script>
</body>
</html>
