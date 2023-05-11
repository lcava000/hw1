<?php 
require_once('./function.php');

session_start();

$email_insert = "maria@gmail.com";
$password = "Maria123@";


//login_check($email_insert, $password);
$result = register("Maria", "Noone", "BALI19381D", $email_insert, $password, $password);

if ($result['success'] == true) {
    echo "Success";
} else {
    echo $result['error_description'];
}


?>
