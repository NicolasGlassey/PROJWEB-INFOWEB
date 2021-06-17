<?php
/**
 * @file      articlesManager.php
 * @brief     This file is designed to execute articles interaction on the database with th jsonManager model
 * @author    Created by Nolan.EVARD
 * @version   17.03.2021
 */
/**
 * @brief This function is designed to get all the articles from the database
 * @return array|null : Return a two dimensional array or more but starts with 0=>key, 1=>key, etc
 * @throws articlesException : This exception is thrown when there is no articles in the DB
 * @throws databaseException : This exception is thrown when theres is troubles connecting to the DB
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