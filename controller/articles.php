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
    try {
        $articles = getArticles();
        require_once "view/shop.php";
    }
    catch (databaseException){
        $error = "An error has occured. Please try later";
        require_once "view/shop.php";
    }
    catch (articlesException){
        $error = "No articles available";
        require_once "view/shop.php";
    }
}