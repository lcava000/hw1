<?php 
session_start();
require_once('./function.php');

$id = $_GET['id'];
$checkin = $_GET['checkin'];
$checkout = $_GET['checkout'];

$_SESSION['id'] = $id;
$_SESSION['checkin'] = $checkin;
$_SESSION['checkout'] = $checkout;
orderAttempt($_SESSION['id'], $_SESSION['checkin'], $_SESSION['checkout'], session_id());

//If user is already logged in, redirect to payment page
if(isset($_SESSION["isLogged"]) && $_SESSION["isLogged"] === true) {
  header("Location: payment.php?sessionid=".session_id());
  exit;
}


if($_POST['action']=="login_form"){
  $email_form = $_POST['log_email'];
  $password_form = $_POST['log_password'];

  $result = login_check($email_form, $password_form);

  if ($result['success']) {
      $_SESSION['isLogged'] = true;
      $_SESSION['user_id'] = $result['user_id'];
      header("Location: ./payment.php?sessionid=".session_id());
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
      header("Location: ./payment.php?sessionid=".session_id());
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
        </nav>
    </header>

      <div class="box">
        <h2>Checkout</h2>
        <div class="containerCheckout">
          <div class="containerCheckoutItemForm" id="containerCheckoutItemForm">

        <div class="stepLogin">
          <form class="formCheckout" action="<?php echo ($_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING']) ?>" method="POST" id="login_form">
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

              <?php echo $error_description;?>
          </form>  
        </div>

        <div class="stepRegister">
          <form class="formCheckout" action="<?php echo ($_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING']) ?>" method="POST" id="register_form">
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


          </div>
          <div class="containerCheckoutItemDetails">
            <div class="price">
              <h2>Deluxe Room</h2>
              <h3 id="roomname"></h3>

              <div class="containerTable">
                <table>
                  <tr>
                    <td>Bed Spaces</td>
                    <td id="bed_space">
                      
                    </td>
                  </tr>
                  <tr>
                    <td>Price per Night</td>
                    <td id="price_per_night"></td>
                  </tr>
                  <tr>
                    <td>Check-in</td>
                    <td id="checkin"></td>
                  </tr>
                  <tr>
                    <td>Check-out</td>
                    <td id="checkout"></td>
                  </tr>
                  <tr>
                    <td>Total Night</td>
                    <td id="total_night"></td>
                  </tr>
                </table>
              </div>

              <div class="containerTable total">
                <table>
                  <tr>
                    <td>Total Price</td>
                    <td id="total_price"></td>
                  </tr>
                </table>
              </div>
            </div>
          </div>

        </div>
      </div>
      </div>
    
    <footer>
        <div class="container">
            <p>&copy; 2023 Dubai Emaar Properties Hotel. All rights reserved.</p>
        </div>
    </footer>

    <script src='./js/checkout.js' defer></script>
    <script src='./js/login.js' defer></script>
    <script src='./js/register.js' defer></script>
    <script src='./js/checkout_summary.js' defer></script>
  
  <?php
  
  ?>


</body>
</html>