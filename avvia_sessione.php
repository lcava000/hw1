<?php
session_start();


$_SESSION["nome_variabile"] = "valore_variabile";




if (1) {
  $response = array('success' => true, 'message' => 'La sessione è stata avviata correttamente.');
} else {
  $response = array('success' => false, 'message' => 'La sessione non è stata avviata correttamente.');
}
echo json_encode($response);

?>
