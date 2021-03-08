<?php
/**
 * @file      error.php
 * @brief     This file is the rooter managing errors.
 * @author    Created by Antoine.Roulin
 * @version   15.02.2021
 */

/**
 * @brief This function is designed to manage errors
 * @return string
 */

function checkErrors(){
    $error = $_GET['error'];
    $message = "";

    switch($error){
        case "wrongLogin" :
            $message = "Wrong email address or password";
            break;
        default:
            break;
    }
    return $message;
}
?>
