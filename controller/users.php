<?php
/**
 * @file      users.php
 * @brief     This file is the rooter managing the link with controllers.
 * @author    Created by Nolan.Evard
 * @version   15.02.2021
 */

require "model/usersManager.php";
/**
 * @brief This function is designed to redirect the user on the login page and check if this user is logged in or not, if not it checks the user credentials int the JSON users file
 * @param $postDatas : Datas coming from the login form , including username and user password
 */
function login($postDatas){
    if(isset($postDatas["userInputEmail"]) && isset($postDatas["userPswd"])){
        $userName = $postDatas["userInputEmail"];
        $password = $postDatas["userPswd"];//Encrypt the user password
        try{
            if(checkLogin($userName,$password)){ //Checking user credentials in the json file
                $_SESSION["userName"] = $userName;
                require ("view/home.php");
            }
        }
        catch (jsonFileException){
            $error = 'An error has occured. Please try later';
            require ("view/login.php");
        }
        catch (wrongLoginException){
            $error = 'Wrong email address or password';
            require ("view/login.php");
        }
    }
    else{
        require ("view/login.php");
    }
}

/**
 * @brief This function is designed to log the user out of his session by destroying the $_SESSION variable
 */
function logout(){
    $_SESSION = array();
    session_destroy();
    require ("view/home.php");
}

