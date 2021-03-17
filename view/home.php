<?php
/**
 * @file        home.php
 * @brief       This file is design to be the home page of this website
 * @author      Created by Antoine.ROULIN
 * @version     17.03.21
 */
$title = "Auto-Classic Home";

ob_start()
?>



<?php
$content = ob_get_clean();
require "view.php";
?>

