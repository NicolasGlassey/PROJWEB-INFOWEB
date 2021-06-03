<?php
/**
 * @file      usersManager.php
 * @brief     This file is designed to manage all the interactions with the users
 * @author    Created by Nolan.EVARD
 * @version   17.03.2021
 */
/**
 * @brief This function is designed to check if the user credentials are the same as the ones in the JSON file
 * @param $username :user name from controller
 * @param $usrPswd :password from controller
 * @return bool
 */

function checkLogin($username, $usrPswd){
    require_once "model/dbConnector.php";
    try {
        $query = "SELECT password FROM sellers WHERE username ='" . $username ."';";
        $queryResult = executeQueryReturn($query);
        $result = password_verify($usrPswd, $queryResult[0]['password']);
        if(!($result)){
            throw new wrongLoginException();
        }
    }
    catch (databaseException){
        throw new databaseException();
    }

    return $result;
}
class wrongLoginException extends Exception{}