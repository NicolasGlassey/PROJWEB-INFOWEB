<?php
/**
 * @file      index.php
 * @brief     This file is the rooter managing the link with controllers.
 * @author    Created by Nolan.Evard
 * @version   08.02.2021
 */

require "controller/users.php";
require "controller/navigation.php";
require "controller/articles.php";

session_start();

if(isset($_GET['action'])){
    $action = $_GET['action'];

    switch ($action){
        case "login":
            login($_POST);
            break;
        case "logout":
            logout();
            break;
        case "displayArticles":
            displayArticles();
            break;
        case "home":
            home();
            break;
        case "contact":
            contact();
            break;
        default:
            notFound();
    }
}
else{
    //Require welcome page
    home();
}