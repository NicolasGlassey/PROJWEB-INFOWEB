<?php
/**
 * @file        contact.php
 * @brief       This file is design to be the contact page of this website
 * @author      Created by Antoine.ROULIN
 * @version     22.03.21
 */
$title = "CollectionCar - Contact";

ob_start()
?>
    <div class="newslettercontent">
        <div class="leftside">
            <img src="image/border.png" alt="border">
            <h1>NEWSLETTER</h1>
            <p>Subscribe to the COLLECTIONCARS mailing list to <br>
                receive updates on new arrivals, special offers <br>
                and other discount information.</p>
        </div>
        <div class="rightside">
            <img class="newsimage" src="image/newsletter.jpg" alt="newsletter">
            <input type="text" class="form-control" id="subemail" placeholder="EMAIL">
            <button>SUBSCRIBE</button>
        </div>
    </div>

<?php
$content = ob_get_clean();
require "view/gabarit.php";
?>