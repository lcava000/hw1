
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


    <div class="box">
            <h2>Checkout</h2>
            <div class="containerCheckout">
              <div class="containerCheckoutItemForm" id="containerCheckoutItemForm">

              </div>
              <div class="containerCheckoutItemDetails">
                <div class="price">
                  <h2>Deluxe Room</h2>
                  <h3>Single Sea View Suite</h3>

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