<?php
/**
 * @file        shop.php
 * @brief       This file is design to be the shopping page of this website
 * @author      Created by Antoine.ROULIN
 * @version     22.03.21
 */
$title = "CollectionCar - Shop";

ob_start()
?>
    <div class="allcontain">
        <div id="carousel-up" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner " role="listbox">
                <div class="item active">
                    <img src="/view/Site/image/oldcar.jpg" alt="oldcar">
                    <div class="carousel-caption">
                        <h2>Porsche</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur ,<br>
                            sed do eiusmod tempor incididunt ut labore </p>
                    </div>
                </div>
                <div class="item">
                    <img src="/view/Site/image/porche.jpg" alt="porche">
                    <div class="carousel-caption">
                        <h2>Porsche</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur ,<br>
                            sed do eiusmod tempor incididunt ut labore </p>
                    </div>
                </div>
                <div class="item">
                    <img src="/view/Site/image/benz.jpg" alt="benz">
                    <div class="carousel-caption">
                        <h2>Mercedes</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur ,<br>
                            sed do eiusmod tempor incididunt ut labore </p>
                    </div>
                </div>
            </div>
            <nav class="navbar navbar-default midle-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed textcostume" data-toggle="collapse" data-target="#navbarmidle" aria-expanded="false">
                        <h1>SEARCH TEXT</h1>
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="navbarmidle">
                    <div class="searchtxt">
                        <h1>SEARCH TEXT</h1>
                    </div>
                    <form class="navbar-form navbar-left searchformmargin" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control searchform" placeholder="Enter Keyword">
                        </div>
                    </form>
                    <ul class="nav navbar-nav navbarborder">
                        <li class="li-category">
                            <a class="btn  dropdown-toggle btn-costume"  id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Category<span class="glyphicon glyphicon-chevron-down downicon"></span></a>
                            <ul class="dropdown-menu" id="mydd">
                                <li><a href="#">Epic</a></li>
                                <li><a href="#">Old</a></li>
                                <li><a href="#">New</a></li>
                            </ul>
                        </li>
                        <li class="li-minyear"><a class="btn  dropdown-toggle btn-costume"  id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Min Year <span class="glyphicon glyphicon-chevron-down downicon"></span></a>
                            <ul class="dropdown-menu" id="mydd2">
                                <li><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                            </ul>
                        </li>
                        <li class="li-maxyear"><a class="btn dropdown-toggle btn-costume"  id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Max Year <span class="glyphicon glyphicon-chevron-down downicon"></span></a>
                            <ul class="dropdown-menu" id="mydd3">
                                <li><a href="#">1900</a></li>
                                <li><a href="#">2000</a></li>
                                <li><a href="#">2016</a></li>
                            </ul>
                        </li>
                        <li class="li-slideprice">
                            <p> <label class="slidertxt" for="amount">Price </label>
                                <input class="priceslider" type="text" id="amount" readonly="readonly">
                            </p>
                            <div id="slider-range"></div>
                        </li>
                        <li class="li-search"> <button class="searchbutton"><span class="glyphicon glyphicon-search "></span></button></li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>

    <div class="allcontain">
        <div class="grid">
            <div class="row">
                <?php if(isset($articles)) : ?>
                    <?php foreach($articles as $article):?>
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="txthover">
                                <?php if(is_file($article['image'])) : ?>
                                <img src="<?php $article['image']?>" alt="car">
                                <?php else : ?>
                                <img src="/view/Site/image/noImage.png" alt="no car image found">
                                <?php endif; ?>
                                <div class="txtcontent">
                                    <div class="stars">
                                        <div class="glyphicon glyphicon-star"></div>
                                        <div class="glyphicon glyphicon-star"></div>
                                        <div class="glyphicon glyphicon-star"></div>
                                    </div>
                                    <div class="simpletxt">
                                        <h3 class="name"><?php $article['title']?></h3>
                                        <p>"<?php $article['description']?>" </p>
                                        <h4 class="price"><?php $article['price']?></h4>
                                        <button>READ MORE</button><br>
                                        <div class="wishtxt">
                                            <p class="paragraph1"> Add to Wishlist <span class="glyphicon glyphicon-heart"></span> </p>
                                            <p class="paragraph2">Compare <span class="icon"><img src="/view/Site/image/compicon.png" alt="compicon"></span></p>
                                        </div>
                                    </div>
                                    <div class="stars2">
                                        <div class="glyphicon glyphicon-star"></div>
                                        <div class="glyphicon glyphicon-star"></div>
                                        <div class="glyphicon glyphicon-star"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;?>
                <?php endif;?>
            </div>
        </div>
    </div>

<?php
$content = ob_get_clean();
require "view/gabarit.php";
?>