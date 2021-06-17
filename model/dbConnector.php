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
    $dbConnexion = openDBConnexion();
    if ($dbConnexion != null){
        //TODO remove french comments
        $statement = $dbConnexion->prepare($query); //préparation de requête
        $statement->execute(); //Execution de la requête
        $queryResult = $statement->fetchAll(); //Préparation des résultats pour le client
    }
    else{
        throw new databaseException();
    }
    $dbConnexion = null; //Fermeture de la connexion à la base de données
    return $queryResult;
}

/**
 * @brief This function is designed to execute an insert query received as parameter
 * @param $query
 * @throws databaseException //TODO MISSING COMMMENT
 */
function executeQuery($query){
    $dbConnexion = openDBConnexion(); //Ouvre la connection à la BD
    $result = false;
    if ($dbConnexion != null){
        $statement = $dbConnexion->prepare($query); //préparation de requête
        $result = $statement->execute(); //Execution de la requête
        if($result == false){
            throw new databaseException();
        }
    }
    else{
        throw new databaseException();
    }
    $dbConnexion = null; //Fermeture de la connexion à la base de données

}

/**
 * @return PDO|null
 * @throws databaseException
 */
function openDBConnexion(){
    $tempDBConnexion = null;

    //TODO review in live
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