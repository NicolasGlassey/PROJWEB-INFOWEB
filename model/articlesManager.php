<?php
/**
 * @file      articlesManager.php
 * @brief     This file is
 * @author    Created by Nolan.EVARD
 * @version   17.03.2021
 */
require "model/jsonManager.php";
function getArticles(){
    $json = readJson("data/ads.json");
    $ads = array();

    foreach ($json as $item) { //looping through the json file content
            $temp = array(
                "image" => $item->image,
                "title" => $item->title,
                "price" => $item->price
            );
            $ads = $ads + $temp;
        }
    return $ads;
}