<?php
/**
 * @file      articles.php
 * @brief     This file is designed to interact with the model articlesManager and for all articles usages
 * @author    Created by Nolan.EVARD
 * @version   22.03.2021
 */

/**
 * @This function is designed to get the articles from the model and submit it to the shop view
 */
function displayArticles(){
    require_once "model/articlesManager.php";
    $articles = "";
    if (getArticles()!=null){
        $articles = getArticles();
        require_once "view/shop.php";
    }
    else{
        $error = "Nous avons recontré un problème, veuillez réessayer ultérieurement";
        require_once "view/home.php";
    }
}