<?php
/**
 * @file dbConnector.php
 * @brief This controller is designed to manage database accesses and transactions
 * @author Nolan Evard
 */

/**
 * @brief This function is designed to execute a select query received as parameter
 * @param $query : the query to execute
 * @return array|null
 * @link https://php.net/manual/en/pdo.prepare.php
 */
function executeQueryReturn($query){
    $queryResult = null;
    $dbConnexion = openDBConnexion();//Opens DB connection
    if ($dbConnexion != null){
        $statement = $dbConnexion->prepare($query); //Prepare the query
        $statement->execute(); //Query execution
        $queryResult = $statement->fetchAll();
    }
    else{
        throw new databaseException();
    }
    $dbConnexion = null; //Closing connection to the DB
    return $queryResult;
}

/**
 * @brief This function is designed to execute an insert query received as parameter
 * @param $query
 * @throws databaseException : This exception is thrown if something went wrong with the query execution
 */
function executeQuery($query){
    $dbConnexion = openDBConnexion(); //Opens DB connection
    $result = false;
    if ($dbConnexion != null){
        $statement = $dbConnexion->prepare($query); //Prepare the query
        $result = $statement->execute(); //Query execution
        if($result == false){
            throw new databaseException();
        }
    }
    else{
        throw new databaseException();
    }
    $dbConnexion = null; //Closing connection to the DB

}

/**
 * @return PDO|null
 * @throws databaseException
 */
function openDBConnexion(){
    $tempDBConnexion = null;

    require_once "model/jsonManager.php";
    try{
        $credentials = readJson("model/dbCredentials.json");
        $dsn = $credentials->sqlDriver. ":host=". $credentials->hostName . ";dbname=".
            $credentials->dbName.";port=".$credentials->port.";charset=".$credentials->charset;
        $tempDBConnexion = new PDO($dsn, $credentials->userName, $credentials->userPwd);
    }
    catch(jsonFileException | PDOException){
        throw new databaseException();
    }
    return $tempDBConnexion;
}
//Exceptions when the connection to the database failed
class databaseException extends Exception{
}