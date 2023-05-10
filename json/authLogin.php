<?php 

session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
  // Verifico se l'utente esiste nel database
  if ($user_exists) {
    // Imposto la variabile di sessione per indicare che l'utente è loggato
    $_SESSION['logged_in'] = true;
    // Restituisco una risposta JSON di conferma
    $response = array('success' => true, 'message' => 'Login effettuato correttamente.');
    echo json_encode($response);
  } else {
    // Restituisco una risposta JSON di errore
    $response = array('success' => false, 'message' => 'Username o password non validi.');
    echo json_encode($response);
  }
}

?>