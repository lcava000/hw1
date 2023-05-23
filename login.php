<?php 
require_once('./function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Emaar Properties</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
  <link rel="stylesheet" href="./style/style.css">
  
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Reem+Kufi+Ink&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" /></head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<body>
    
    <header class="otherpage">
        <nav>  
            <div class="logo">
                <a href="./index.html"><img src="asset/logo/white.png" alt="Dubai Real Estate"></a>
            </div>
            <div class="headerButton">
                <a href="./login.php" class="btn-primary white">Login</a>
            </div>
        </nav>
    </header>

    <div class="containerLogin">
        <form class="formCheckout" action="./login.php" method="POST" id="login_form">
        <input hidden name="action" value="login_form">
            <h2>Login</h2>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="log_email" name="log_email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="log_password" name="log_password" required>
            </div>
            <a href="./register.php"><button class="formButton" type="button">Not already a member?</button></a>
            <button class="formButton" id="goLoginSubmit" type="button">Login</button>
        </form>  
    </div>
        
    
    <footer>
        <div class="container">
            <p>&copy; 2023 Dubai Emaar Properties Hotel. All rights reserved.</p>
        </div>
    </footer>
  
      <script src='./js/login.js' defer></script>


    <?php

    if(isset($_SESSION["isLogged"]) && $_SESSION["isLogged"] === true) {
        header("Location: ./dashboard.php");
        exit;
    }

    if($_POST['action']=="login_form"){
        $email_form = $_POST['log_email'];
        $password_form = $_POST['log_password'];
    
        $result = login_check($email_form, $password_form);
    
        if ($result['success']) {
            $_SESSION['isLogged'] = true;
            $_SESSION['user_id'] = $result['user_id'];
            header("Location: ./dashboard.php");
            exit;
        } else {
            //Debug purpose
            //print_r ($result);

            $error_description = $result['error_description'];
            echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '$error_description'
                });
                </script>";
        }
    }

    ?>

</body>
</html>