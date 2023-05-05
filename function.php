<?php
require_once('db.php');

try {
    //Creating PDO Object for Database Connection
	$db = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8mb4",$db_username, $db_password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",PDO::MYSQL_ATTR_FOUND_ROWS => true));
	$db->exec("set names utf8mb4");
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    //Managing Database Connection Errors
	$errore = $e->getMessage();
	echo "<p style='text-align:center;'>";
		echo "ERRORE DATABASE"; 
		//echo "<br><b>$errore</b> "; 
	echo "</p>";
	exit;
} 

/******************************************************
 *           PDO Statement Operations
 *****************************************************/
/*
Why use PDOStatement? 
- PDO provides a unified interface for working with different types of databases 
- PDO supports prepared statements, which are a powerful technique for protecting against SQL injection attacks.
- PDO supports multiple database connections, which can be useful in large applications where you need to connect to multiple databases at the same time. 
- PDO also supports features like transactions, which allow you to group multiple SQL queries into a single atomic operation.

- PDO Read Query Example:
$array_read = array(':status'  => $status);
$sql_read = "SELECT * FROM test_db WHERE status=:status";
list($status_read,$content_read,$nrows_read) = read_db_pdo($sql_read,$array_read);

- PDO Write Query Example:
$array_write = array(':status'  => $status);
$sql_write = "INSERT INTO ....... WHERE status=:status";
list($status_write,$nrows_write) = write_db_pdo($sql_write,$array_write);

*/


 function read_db_pdo($sql, $arrayIn = NULL){
	global $db;
	$queryStatus = 0;
		try {
		    $statment = $db->prepare($sql);
		    $statment->execute($arrayIn); 
		    $queryResult = $statment->fetchAll(PDO::FETCH_ASSOC);

            //Query Row Count
		 	$queryRow = $statment->rowCount();
            //Query OK - Set status 1
		 	$queryStatus = 1;

		} catch(PDOException $e) {
            //Handling PDOException
			echo "DB ERROR" ;
            echo $e->getMessage();
            //$errori[] = $e->getMessage();
		}
		 	
	return array($queryStatus,$queryResult,$queryRow);
}

function write_db_pdo($sql, $arrayIn = NULL){
	global $db;
	$queryStatus = 0;
		try {
		    $statment = $db->prepare($sql);
		    $statment->execute($arrayIn);

            //Query Row Count
            $queryRow = $statment->rowCount();

            //Query OK - Set status 1
		 	$queryStatus = 1;

		} catch(PDOException $e) {
            //Handling PDOException
			echo "DB ERROR" ;
            //$errori[] = $e->getMessage();
		}

    return array($queryStatus,$queryRow);
}

function read_db_pdo_trans($sql, $arrayIn = NULL){
	global $db;
	$queryStatus = 0;
	$db->beginTransaction();
	try {
		$statement = $db->prepare($sql);
		$statement->execute($arrayIn);
		$queryResult = $statement->fetchAll(PDO::FETCH_ASSOC);

		//Query Row Count
		$queryRow = $statement->rowCount();
		//Query OK - Set status 1
		$queryStatus = 1;

	} catch(PDOException $e) {
		$db->rollBack();
		//Handling PDOException
		echo "DB ERROR" ;
	}

	$db->commit();
	return array($queryStatus,$queryResult,$queryRow);
}

function write_db_pdo_transaction($sql, $arrayIn = NULL){
	global $db;
	$queryStatus = 0;
	$db->beginTransaction();
	try {
		$statement = $db->prepare($sql);
		$statement->execute($arrayIn);

		//Query Row Count
		$queryRow = $statement->rowCount();
		//Query OK - Set status 1
		$queryStatus = 1;

	} catch(PDOException $e) {
		$db->rollBack();
		//Handling PDOException
		echo "DB ERROR" ;
	}

	$db->commit();
	return array($queryStatus,$queryRow);
}

/******************************************************
 *               Security Operations
 *****************************************************/
/*
    Openssl Security Documentation -> https://www.php.net/manual/en/ref.openssl.php
*/

function addCrypt($string){
	global $set_server_enc_key;
	$sslc = openssl_encrypt($string,"AES-128-ECB",$set_server_enc_key);
	return bin2hex($sslc);	
}
function deCrypt($string){
	global $set_server_enc_key;
	$stringa = hex2bin($string);
	return $sslc = openssl_decrypt($string,"AES-128-ECB",$set_server_enc_key);
}



?>