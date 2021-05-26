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
 * @return string : the full path to the json file
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
 * @throws jsonFileException
 */
function readJson($fileName)
{
    if (file_exists($fileName)) {
        $file = fopen(createPath($fileName), "r");
        if (!($file)) { //checking if the file exists
            throw new jsonFileException();
        } else {
            $fileContent = fread($file, filesize(createPath($fileName))); //Gets the content of the file
            return json_decode($fileContent); //Decode the content from Json ton php objects
        }
    }
}
class jsonFileException extends Exception{}