<?php
/**
 * @file        home.php
 * @brief       This file is design to be the gabarit of the website
 * @author      Created by Antoine.ROULIN
 * @version     24.03.21
 */
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?=$title;?></title>
    <meta name="description" content="Scarica gratis il nostro Template HTML/CSS GARAGE. Se avete bisogno di un design per il vostro sito web GARAGE può fare per voi. Web Domus Italia">
    <meta name="author" content="Web Domus Italia">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Site/source/bootstrap-3.3.6-dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="Site/source/font-awesome-4.5.0/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="Site/style/slider.css">
    <link rel="stylesheet" type="text/css" href="Site/style/mystyle.css">
</head>
<body>
<!-- Header -->
<div class="allcontain">
    <div class="header">
        <ul class="socialicon">
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
        </ul>
        <ul class="givusacall">
            <li>Give us a call : +66666666 </li>
        </ul>
        <ul class="logreg">
            <?php if(isset($_SESSION['userName'])) :?>
                <li><?=$_SESSION['userName']?></li>
                <li><a href="../index.php?action=logout">Logout </a></li>
            <?php else:?>
                <li><a href="../index.php?action=login">Login </a></li>
                <li><a href="../index.php?action=register"><span class="register">Register</span></a></li>
            <?php endif;?>
        </ul>
    </div>

    <!-- Navbar Up -->
    <nav class="topnavbar navbar-default topnav">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed toggle-costume" data-toggle="collapse" data-target="#upmenu" aria-expanded="false">
                    <span class="sr-only"> Toggle navigaion</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="upmenu">
            <ul class="nav navbar-nav" id="navbarontop">
                <li class="active"><a href="../index.php?action=home">HOME</a> </li>
                <li><a href="../index.php?action=shop">SHOP</a></li>
                <li><a href="../index.php?action=contact">CONTACT</a></li>
                <button href="../index.php?action=addAd"><span class="postnewcar">POST NEW CAR</span></button>
            </ul>
        </div>
    </nav>
    <hr>
</div>

<!-- Content -->

<?=$content;?>

<!-- Bottom Menu -->
<div class="bottommenu">
    <ul class="nav nav-tabs bottomlinks">
        <li role="presentation" ><a href="#/" role="button">ABOUT US</a></li>
        <li role="presentation"><a href="#/">CATEGORIES</a></li>
        <li role="presentation"><a href="#/">PREORDERS</a></li>
        <li role="presentation"><a href="#/">CONTACT US</a></li>
        <li role="presentation"><a href="#/">RECEIVE OUR NEWSLETTER</a></li>
    </ul>
    <p>"Lorem ipsum dolor sit amet, consectetur,  sed do eiusmod tempor incididunt <br>
        eiusmod tempor incididunt </p>
    <img src="Site/image/line.png" alt="line"> <br>
    <div class="bottomsocial">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-google-plus"></i></a>
        <a href="#"><i class="fa fa-pinterest"></i></a>
    </div>
    <div class="footer">
        <div class="copyright">
            &copy; Copy right 2016 | <a href="#">Privacy </a>| <a href="#">Policy</a>
        </div>
        <div class="atisda">
            Designed by <a href="http://www.webdomus.net/">Web Domus Italia - Web Agency </a>
        </div>
    </div>
</div>
</div>

<script type="text/javascript" src="Site/source/bootstrap-3.3.6-dist/js/jquery.js"></script>
<script type="text/javascript" src="Site/source/js/isotope.js"></script>
<script type="text/javascript" src="Site/source/js/myscript.js"></script>
<script type="text/javascript" src="Site/source/bootstrap-3.3.6-dist/js/jquery.1.11.js"></script>
<script type="text/javascript" src="Site/source/bootstrap-3.3.6-dist/js/bootstrap.js"></script>
</body>
</html>