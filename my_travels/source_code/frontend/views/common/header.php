<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title>
            <?php
                if(isset($title_page)) echo $title_page;
                else echo 'Travel Responsive Web Template';
            ?>
        </title>
        <meta name="description" content="">
<!-- 
Travel Template
http://www.templatemo.com/tm-409-travel
-->
        <meta name="viewport" content="width=device-width">
        <meta name="author" content="templatemo">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,800,700,600,300' rel='stylesheet' type='text/css'>
        
        <link rel="stylesheet" href="webroot/css/bootstrap.min.css">
        <link rel="stylesheet" href="webroot/css/font-awesome.css">
        <link rel="stylesheet" href="webroot/css/animate.css">
        <link rel="stylesheet" href="webroot/css/templatemo_misc.css">
        <link rel="stylesheet" href="webroot/css/templatemo_style.css">

        <script src="webroot/js/vendor/modernizr-2.6.1-respond-1.1.0.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
        <![endif]-->

        <div class="site-header">
            <div class="container">
                <div class="main-header">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-xs-10">
                            <div class="logo">
                                <a href="index.php">
                                    <img src="webroot/images/logo.png" alt="travel html5 template" title="travel html5 template">
                                </a>
                            </div> <!-- /.logo -->
                        </div> <!-- /.col-md-4 -->
                        <div class="col-md-8 col-sm-6 col-xs-2">
                            <div class="main-menu">
                                <ul class="visible-lg visible-md">
                                    <li class="<?php 
                                        if(isset($_GET['controller']) && $_GET['controller'] == 'index' ) echo 'active';
                                        elseif(!isset($_GET['controller'])) echo 'active';
                                    ?>"><a href="index.php?controller=index">Home</a></li>
                                    <li class="<?php 
                                        if(isset($_GET['controller']) && $_GET['controller'] == 'posts' || $_GET['controller'] == 'post_categories' ) echo 'active';
                                    ?>"><a href="index.php?controller=posts">Blog</a></li>
                                    
                                    <li class="
                                        <?php if(isset($_GET['controller']) && $_GET['controller'] == 'contact' ) echo 'active'; ?>
                                    "><a href="index.php?controller=contact">Contact</a></li>
                                </ul>
                                <a href="#" class="toggle-menu visible-sm visible-xs">
                                    <i class="fa fa-bars"></i>
                                </a>
                            </div> <!-- /.main-menu -->
                        </div> <!-- /.col-md-8 -->
                    </div> <!-- /.row -->
                </div> <!-- /.main-header -->
                <div class="row">
                    <div class="col-md-12 visible-sm visible-xs">
                        <div class="menu-responsive">
                            <ul>
                                <li class="active"><a href="index.html">Home</a></li>
                                li><a href="#">Blog</a></li>
                                <li><a href="events.html">Events</a></li>
                                <li><a href="about.html">About Us</a></li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </div> <!-- /.menu-responsive -->
                    </div> <!-- /.col-md-12 -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </div> <!-- /.site-header -->