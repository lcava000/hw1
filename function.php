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
	Why use Security Operations?
*/

function genPassowrd($password){
	return password_hash($password, PASSWORD_DEFAULT);
}

function checkPassword($password, $hashedPassword) {
    if (password_verify($password, $hashedPassword)) {
		//echo "Password is valid!";
		return true;
	} else {
		//echo "Password is not valid!";
		return false;
	}
}

/******************************************************
 *               Auth Function
 *****************************************************/

function login_check($email_insert, $password_insert) {
    $result = array(
        'success' => false,
		'user_id' => '',
        'error_description' => ''
    );

    if (empty($email_insert) || empty($password_insert)) {
        $result['error_description'] = 'Email and/or password not entered.';
        return $result;
    }
    
    if (!filter_var($email_insert, FILTER_VALIDATE_EMAIL)) {
        $result['error_description'] = 'Invalid email format.';
        return $result;
    }
    
    $array_login = array(':email_insert'  => $email_insert);
    $sql_login = "SELECT id, password FROM `roomcustomer` WHERE email = :email_insert";
    list($status_login, $content_login, $nrows_login) = read_db_pdo($sql_login, $array_login);

    if ($nrows_login == 1) {
        if (checkPassword($password_insert, $content_login[0]['password'])) {
			$id = $content_login[0]['id'];
			$result['user_id'] = $id;
            $result['success'] = true;
			return $result;
        } else {
            $result['error_description'] = 'Incorrect password.';
			return $result;
        }
    } else {
        $result['error_description'] = 'No user found with this email.';
		return $result;
    }
}

function register($name, $surname, $trn, $email, $password, $password_confirm) {
    $result = array(
        'success' => false,
		'user_id' => '',
        'error_description' => ''
    );

    // Preliminary checks on the entered fields
    if (empty($name) || empty($surname) || empty($trn) || empty($email) || empty($password) || empty($password_confirm)) {
        $result['error_description'] = 'All fields must be filled.';
        return $result;
    }

	// Email integrity check
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result['error_description'] = 'Invalid email format.';
        return $result;
    }

	// Email already registered check
	$array_email = array(':email'  => $email);
	$sql_email = "SELECT email FROM `roomcustomer` WHERE email = :email";
	list($status_email, $content_email, $nrows_email) = read_db_pdo($sql_email, $array_email);
	if ($nrows_email == 1) {
		$result['error_description'] = 'Email already registered.';
		return $result;
	}


    // Password security check
    $password_length = strlen($password);
    if ($password_length < 8 || !preg_match("/[A-Z]/", $password) || !preg_match("/\d/", $password) || !preg_match("/\W/", $password)) {
        $result['error_description'] = 'Password must contain at least 8 characters, one uppercase letter, one number, and one special character.';
        return $result;
    }

    // Password confirmation check
    if ($password !== $password_confirm) {
        $result['error_description'] = 'Password confirmation does not match.';
        return $result;
    }

	// Password Crypt
	$password_crypted = genPassowrd($password);

    $array_register = array(
						':name'  => $name,
						':surname'  => $surname,
						':trn'  => $trn,
						':email'  => $email,
						':password'  => $password_crypted
						);

    $sql_register = "INSERT INTO roomcustomer (name, surname, trn, email, password) VALUES (:name, :surname, :trn, :email, :password)";
    list($status_register, $content_register, $nrows_register) = read_db_pdo($sql_register, $array_register);

	//get user id for login after register
    $sql_get_id = "SELECT id FROM `roomcustomer` WHERE email = :email";
    list($status_get_id, $content_get_id, $nrows_get_id) = read_db_pdo($sql_get_id, $array_register);

	if ($status_register == 1) {
		$id = $content_get_id[0]['id'];
		$result['user_id'] = $id;
		$result['success'] = true;
		return $result;
	} else {
		$result['error_description'] = 'Registration failed.';
		return $result;
	}
}


?>