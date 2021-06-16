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
/**
 * //TODO missing documentation for exception
 * @throws articlesException
 * @throws databaseException
 */
function getArticles(){
    $query = "SELECT image, brand, model, price, year, mileage, horsepower FROM cars";
    require_once "model/dbConnector.php";
    try {
       $queryResult = executeQueryReturn($query);
       if(count($queryResult) == 0){
           throw new articlesException();
       }
    }
    catch (databaseException){
        throw new databaseException();
    }
    return $queryResult;
}
// Exceptions when there's no articles in the database
class articlesException extends Exception{}