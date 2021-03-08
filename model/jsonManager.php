<?php
/**
 * @file      jsonManager.php
 * @brief     This file is designed to manage json file.
 * @author    Created by Nolan.Evard
 * @version   15.02.2021
 */

/**
 * @brief This function is designed to get the correct path to a specific file no matter where the project is located
 * @param $fileName :the path to the file, including the file name, from the project root directory
 * @return string
 */
function createPath($fileName)
{
    $currentPath = getcwd();

    return $currentPath . "/" . $fileName;
}

/**
 * @brief This function is designed to open the Json file in read mode
 * @param $fileName :the path to the file, including the file name, from the project root directory
 * @return mixed
 */
function readJson($fileName)
{
    if (!(fopen(createPath($fileName), "r"))) { //checking if the file exists
        echo "Can't open stream";
    } else {
        $file = fopen(createPath($fileName), "r"); //Opens the file
        $fileContent = fread($file, filesize(createPath($fileName))); //Gets the content of the file
        return json_decode($fileContent); //Decode the content from Json ton php objects
    }
}

/**
 * @brief This function is designed to check if the user credentials are the same as the ones in the JSON file
 * @param $username :user name from controller
 * @param $usrPswd :password from controller
 * @return bool
 */
function checkLogin($username, $usrPswd){
    $json = readJson("data/users.json");
    $result = false;

    foreach ($json as $item) { //looping through the json file content
        if ($item->name == $username && password_verify($usrPswd, $item->password)){
            $result = true;
        }
    }
    return $result;
}
