<?php
/**
 * @file      index.php
 * @brief     This file is the rooter managing the link with controllers.
 * @author    Created by Nolan.Evard
 * @version   08.02.2021
 */

require "controller/user.php";
require "controller/navigation.php";
require "controller/articles.php";

session_start();

if(isset($_GET['action'])){
    $action = $_GET['action'];
    switch ($action){
        case "login":
            login($_POST);
            break;
        case "register":
            register($_POST);
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
            //TODO proposition : got to home (with error message, page not found
            notFound();
    }
}
else{
    //TODO proposition : remove this else condition
    //Require welcome page
    home();
}