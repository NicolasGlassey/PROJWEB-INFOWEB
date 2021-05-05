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
    $error = $_GET['error'];//TODO ne plus utiliser $_GET pour les erreurs
    $message = "";

    //TODO un switch case avec un seul choix !!
    switch($error){
        case "wrongLogin" :
            $message = "Wrong email address or password";//TODO inspirez vous des messages utilisés sur les plateformes en "vue"
            break;
        default:
            break;
    }
    return $message;
}
