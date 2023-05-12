<?php 
session_start();
require_once('./function.php');

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

    <div class="containerLogin">
        <form class="formCheckout" action="./checkout.php" method="POST" id="login_form">
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
            <button class="formButton" id="goRegister" type="button">Not already a member?</button>
            <button class="formButton" id="goLoginSubmit" type="button">Login</button>

        </form>  
    </div>
        
    
    <footer>
        <div class="row">
            <div class="column three">
              <h3>Contact Information: </h3>
              <p>Some text..</p>
            </div>
            <div class="column three"></div>
            <div class="column three">
              <h3>Newsletter:</h3>
              <p>Some text..</p>
            </div>
          </div>

        <p>&copy; 2023 Dubai Emaar Properties Hotel. All rights reserved.</p>
    </footer>

    <script src='./js/checkout.js' defer></script>
    <script src='./js/checkout_summary.js' defer></script>
  
</body>
</html>