<?php
/**
 * @file      articles.php
 * @brief     This file is
 * @author    Created by Nolan.EVARD
 * @version   22.03.2021
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
    }
}