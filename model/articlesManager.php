<?php
/**
 * @file      articlesManager.php
 * @brief     This file is
 * @author    Created by Nolan.EVARD
 * @version   17.03.2021
 */
require_once "model/jsonManager.php";
function getArticles(){
    $json = readJson("data/ads.json");
    if ($json == null){
        return null;
    }
    $ads = array();

    foreach ($json as $key => $item) { //looping through the json file content
            $temp = array(
                "image" => $item->image,
                "title" => $item->title,
                "price" => $item->price,
                "description"=>$item->description
            );
            array_push($ads,$temp);
        }
    return $ads;
}