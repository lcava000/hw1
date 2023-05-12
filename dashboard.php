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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/pdfmake.min.js"></script>

<body>

    <header class="otherpage">
        <nav class="dashboard">  
            <div class="logo">
                <a href="#home"><img src="asset/logo/white.png" alt="Dubai Real Estate"></a>
            </div>
            <ul>
                <li><a href="./dashboard.php" class="active"><i class="fa-solid fa-gauge"></i>Dashboard</a></li>
                <li><a href="./contact.php"><i class="fa-solid fa-phone"></i>Contact</a></li>
            </ul>
            <div class="headerButton">
                <a href="#" class="btn-primary white">Log Out</a>
            </div>
        </nav>
    </header>

    <div class="containerReservation">
        <div class="boxReservation">
            <h2>Booking Summary</h2>
            <table>
            <thead>
                <th>Room</th>
                <th>Check-in Date</th>
                <th>Check-out Date</th>
                <th>Guests</th>
                <th>Total</th>
                <th>Manage</th>
            </thead>
            <tbody id="summaryReservation">
                
            </tbody>
            </table>

        </div>

        <div class="boxReservation">
        <h2>Invoices and Payment History</h2>
        <table>
            <thead>
                <th>Invoice Number</th>
                <th>Date</th>
                <th>Amount</th>
                <th>Payment Method</th>
                <th>Status</th>
            </thead>
            <tbody id="paymentReservation">
                
            </tbody>
            </table>

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

    <script src='./js/dashboard.js' defer></script>
  
</body>
</html>