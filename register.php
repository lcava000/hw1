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
                <a href="#home"><img src="asset/logo/white.png" alt="Dubai Real Estate"></a>
            </div>
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#rooms">Rooms</a></li>
                <li><a href="#facilities">Facilities</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
            <div class="headerButton">
                <a href="#" class="btn-primary white">Book now</a>
            </div>
        </nav>
    </header>

    <div class="containerRegister">
        <form class="formCheckout" action="./register.php" method="POST" id="register_form">
        <input hidden name="action" value="register_form">
                <h2>Register</h2>
                <div class="form-group">
                    <label for="age">Name:</label>
                    <input type="text" id="reg_name" name="reg_name" required>
                </div>
                <div class="form-group">
                    <label for="age">Surname:</label>
                    <input type="text" id="reg_surname" name="reg_surname" required>
                </div>                    
                <div class="form-group">
                    <label for="age">Tax Registration Number (TRN):</label>
                    <input type="text" id="reg_trn" name="reg_trn" required>
                </div>
                <div class="form-group">
                    <label for="age">Email:</label>
                    <input type="email" id="reg_email" name="reg_email" required>
                </div>            
                <div class="form-group">
                    <label for="age">Password:</label>
                    <input type="password" id="reg_password" name="reg_password" required>
                </div>
                <div class="form-group">
                    <label for="age">Confirm Password:</label>
                    <input type="password" id="reg_password_confirm" name="reg_password_confirm" required>
                </div> 
                <button class="formButton" id="goLogin" type="button">Are you already member?</button>
                <button class="formButton" id="goRegisterSubmit" type="button">Register Now</button>

                <?php echo $error_description;?>
        </form> 
    </div> 
        
    
    <footer>
        <div class="container">
            <p>&copy; 2023 Dubai Emaar Properties Hotel. All rights reserved.</p>
        </div>
    </footer>

    <script src='./js/register.js' defer></script>
  
    <?php

    if(isset($_SESSION["isLogged"]) && $_SESSION["isLogged"] === true) {
        header("Location: ./dashboard.php");
        exit;
    }


    if($_POST['action']=="register_form"){
        $name = $_POST['reg_name'];
        $surname = $_POST['reg_surname'];
        $trn = $_POST['reg_trn'];
        $email = $_POST['reg_email'];
        $password = $_POST['reg_password'];
        $password_confirm = $_POST['reg_password_confirm'];
      
        $result = register($name, $surname, $trn, $email, $password, $password_confirm);
        
        if ($result['success'] == true) {
            $_SESSION['isLogged'] = true;
            $_SESSION['user_id'] = $result['user_id'];
            header("Location: ./dashboard.php");
            exit;
        } else {
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