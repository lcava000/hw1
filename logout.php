<?php
session_start();

// Elimina tutte le variabili di sessione
session_unset();

// Distruggi la sessione
session_destroy();

// Reindirizza l'utente alla pagina di login (sostituisci con la tua pagina di destinazione)
header("Location: ./index.html");
exit;
?>