<?php
/**
 * @file      navigation.php
 * @brief     This file is the controller managing the navigation functions on the website
 * @author    Created by Nolan.Evard
 * @version   15.02.2021
 */

/**
 * @brief This function is designed to redirect the user on the error page if the requested page doesn't exist
 */
function notFound(){
    require "view/lost.php";
}

/**
 * @brief This function is designed to redirect the user on the home page when requested
 */
function home(){
    require "view/home.php";
}