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

/**
 * @brief Check if data entered in the form by user respect all constraint of the database and if all field requiered is fill of data.
 * @param $dataToCheck
 * @throws NotFullFillException
 */
function checkData($dataToCheck){
    //Checking if all field are filled.
    if(
        isset($dataToCheck['userInputFirstname']) &&
        isset($dataToCheck['userInputLastname']) &&
        isset($dataToCheck['userInputUsername']) &&
        isset($dataToCheck['userInputPassword']) &&
        isset($dataToCheck['userInputPasswordVerify']) &&
        isset($dataToCheck['userInputEmail']) &&
        isset($dataToCheck['userInputLocality']) &&
        isset($dataToCheck['userInputNPA']) &&
        isset($dataToCheck['userInputStreet'])
    ) {
        //Check if all field respect database constraint.
        if (
            strlen($dataToCheck['userInputFirstname']) <= 50 &&
            strlen($dataToCheck['userInputLastname']) <= 50 &&
            strlen($dataToCheck['userInputUsername']) <= 50 &&
            strlen($dataToCheck['userInputPassword']) <= 256 &&
            strlen($dataToCheck['userInputPasswordVerify']) <= 256 &&
            strlen($dataToCheck['userInputEmail']) <= 319 &&
            strlen($dataToCheck['userInputLocality']) <= 30 &&
            strlen($dataToCheck['userInputNPA']) == 4 &&
            is_numeric($dataToCheck['userInputNPA']) &&
            strlen($dataToCheck['userInputStreet']) <= 50
        ) {
            if($dataToCheck['userInputPassword'] == $dataToCheck['userInputPasswordVerify']){
                return;
            }
            else{
                //TODO Erreur de Throw en question qui pose problème.
                throw new passwordNotMatchException();
            }
        } else {
            throw new notFullFillException();
        }
    }
    else{
        throw new notFullFillException();
    }

}

/**
 * @brief This function is designed to check if the email entered by the user already match with a user registered in the database.
 * @param $email
 * @throws databaseException
 * @throws registeredException
 */
function ifSellerExists($email){
    require_once "model/dbConnector.php";
    try {
        $query = "SELECT email FROM sellers WHERE email ='" . $email . "';";
        $queryResult = executeQueryReturn($query);
        if(count($queryResult) != 0){
            throw new registeredException();
        }
    }
    catch (databaseException){
        throw new databaseException();
    }
}

/**
 * @brief This function is designed to register a new user in the database.
 * @param $registerData
 * @throws databaseException
 */
function registering($registerData){
    require_once "model/dbConnector.php";
    try {
        $passwordHash = password_hash($registerData['userInputPassword'], PASSWORD_DEFAULT);
        if(isset($registerData['userInputPhonenumber'])){
            $query = "INSERT INTO sellers VALUES (NULL,'" . $registerData['userInputFirstname'] . "','" . $registerData['userInputLastname'] . "','" . $registerData['userInputUsername'] . "','" . $passwordHash . "','" . $registerData['userInputPhonenumber'] . "','" . $registerData['userInputEmail'] . "','" . $registerData['userInputLocality']  . "','" . $registerData['userInputNPA'] . "','" . $registerData['userInputStreet'] . "');";
        }
        else{
            $query = "INSERT INTO sellers VALUES (NULL,'"  . $registerData['userInputFirstname'] . "','" . $registerData['userInputLastname'] . "','" . $registerData['userInputUsername'] . "','" . $passwordHash . "',NULL,'" . $registerData['userInputEmail'] . "','" . $registerData['userInputLocality']  . "','" . $registerData['userInputNPA'] . "','" . $registerData['userInputStreet'] . "');";
        }
        $queryResult = executeQuery($query);
    }
    catch (databaseException){
        throw new databaseException();
    }
}
class wrongLoginException extends Exception{}
class passwordNotMatchException extends Exception{}
class registeredException extends Exception{}
class notFullFillException extends Exception{}