<?php
    session_start();

    if(!isset($_SESSION["isLogged"]) && !$_SESSION["isLogged"] === true) {
        header("Location: ./login.php");
        exit;
    }

?>