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
    require_once "model/jsonManager.php";
    try {
        $json = readJson("data/users.json");
        $result = false;

        foreach ($json as $item) { //looping through the json file content
            if ($item->name == $username && password_verify($usrPswd, $item->password)){
                $result = true;
            }
        }
        if(!($result)){
            throw new wrongLoginException();
        }
    }
    catch (jsonFileException){
        throw new jsonFileException();
    }

    return $result;
}
class wrongLoginException extends Exception{}