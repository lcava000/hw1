<?php
  require_once('./auth.php');
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

    <div class="loader-container">
      <div class="loader"></div>
    </div>

    <div class="box">
            <div class="containerCheckout">
              <div class="containerCheckoutItemForm" id="containerCheckoutItemForm">

                <form class="formCheckout" id="payment-form" action="">
                    <div class="step3">
                        <h2>Payment Details</h2>

                        <ul class="containerService">
                            <li class="containerServiceItem"><i class="fa-brands fa-cc-mastercard"></i><i class="fa-brands fa-cc-visa"></i><i class="fa-brands fa-cc-amex"></i>Tax Free</li>
                            <li class="containerServiceItem"><i class="fa-solid fa-credit-card"></i> Secure Payment</li>
                            <li class="containerServiceItem"><i class="fa-solid fa-face-smile"></i> Money Back Guarantee</li>
                            <li class="containerServiceItem"><i class="fa-solid fa-ban"></i> Cancel your reservation for free</li>
                            <li class="containerServiceItem"><i class="fa-brands fa-cc-stripe"></i> Stripe Payment Processing</li>
                        </ul>

                        <div class="paymentBlock">
                            <form class="formCheckout" id="payment-form">
                                <input type="hidden" id="sessionid" name="sessionid" value='<?php echo session_id()?>'>

                                <label for="age">Credit/Debit/Prepaid Card:</label>
                                <div id="card-element">
                                <!-- Stripe.js Form -->
                                </div>
                                <button class="formButton" id="submit-button">Pay Now</button>
                            </form>
                            <div id="card-errors" role="alert"></div>
                        </div>
                    </div>
                </form>  
            </div>

        </div>
      </div>
    
    <footer>
        <div class="container">
            <p>&copy; 2023 Dubai Emaar Properties Hotel. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://js.stripe.com/v3"></script>
    <script src="./js/stripe.js"></script>
  

</body>
</html>