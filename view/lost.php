<?php
/**
 * @file        lost.php
 * @brief       This file is design to be the lost page of this website
 * @author      Created by Antoine.ROULIN
 * @version     22.03.21
 */
$title = "CollectionCar - Lost";

ob_start()
?>

<div class="allcontain">
    <h1 class="text-center">There is an error. This page does not exist.</h1>
</div>

<?php
$content = ob_get_clean();
require "view/gabarit.php";
?>