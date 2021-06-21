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
    require_once "view/lost.php";
}

/**
 * @brief This function is designed to redirect the user on the home page when requested
 */
function home(){
    require_once "view/home.php";
}

/**
 * @brief This function is designed to redirect the user on the contact page when requested
 */
function contact(){
    require_once "view/contact.php";
}

/**
 * @brief This function is designed to redirect the user on the register page when requested
 */
function displayRegister(){
    require_once "view/register.php";
}