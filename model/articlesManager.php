<?php
/**
 * @file      articlesManager.php
 * @brief     This file is designed to execute articles interaction on the database with th jsonManager model
 * @author    Created by Nolan.EVARD
 * @version   17.03.2021
 */
/**
 * @brief This function is designed to get all the articles from the database and send it to the controller
 * @return array
 */
require_once "model/jsonManager.php";
function getArticles(){
    try {
        $json = readJson("data/ads.json");
        if ($json == null){
            throw new articlesException();
        }
        $ads = formatArticles($json);
    }
    catch (jsonFileException){
        throw new jsonFileException();
    }

    return $ads;
}
function formatArticles($json){
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
class articlesException extends Exception{}