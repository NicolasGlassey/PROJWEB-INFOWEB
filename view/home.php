<?php
/**
 * @file        home.php
 * @brief       This file is design to be the home page of this website
 * @author      Created by Antoine.ROULIN
 * @version     22.03.21
 */
$title = "CollectionCar - Home";

ob_start()
?>

<div class="allcontain">
    <div id="carousel-up" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner " role="listbox">
            <div class="item active">
                <img src="view/Site/image/oldcar.jpg" alt="oldcar">
                <div class="carousel-caption">
                    <h1>Bienvenue</h1>
                    <p>Bienvenue sur notre site de vente de voiture Classic.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
require "view/gabarit.php";
?>

