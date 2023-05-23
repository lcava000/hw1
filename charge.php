<?php
session_start();
require_once('vendor/autoload.php');
require_once('./function.php');
require_once('./json/invoiceGenerator.php');

/*  -----------------------------------------------------------------------------------------------
         Documentation: STRIPE WEBSITE
--------------------------------------------------------------------------------------------------- */

\Stripe\Stripe::setApiKey('sk_test_51HkPqZKomNJ2WTb0NXki7qdii9e90Dve1qseQKOmHJOe5nDifspazL0x6PzF9adcFdUNUznJXPs6jXWSyj5APE2d00oMT8RnY5');
header('Content-Type: application/json');

//Fetch the order info from DB 
$array_read = array(':sessionid'  => session_id());
$sql_read = "SELECT 
            orderattempt.roomType,
            roomType.roomName,  
            orderattempt.checkinDate,
            orderattempt.checkoutDate,
            DATEDIFF(orderattempt.checkoutDate, orderattempt.checkinDate) * roomType.roomPrice AS totalPrice
            FROM orderattempt
            JOIN roomType ON roomType.id = orderattempt.roomType
            WHERE orderattempt.sessionId = :sessionid
            ORDER BY orderattempt.timestamp DESC
            LIMIT 1;";
list($status_read,$content_read,$nrows_read) = read_db_pdo($sql_read,$array_read);
if($nrows_read > 0){
      $roomId = $content_read[0]["roomType"];
      $roomName = $content_read[0]["roomName"];
      $checkin = $content_read[0]["checkinDate"];
      $checkout = $content_read[0]["checkoutDate"];
      $totalPrice = $content_read[0]["totalPrice"];
}

$customerId = $_SESSION['user_id'];

try {
  $token = $_POST['stripeToken'];

  $amount = $totalPrice * 100; //price in decimal for stripe processing
  $currency = "AED";
  $desc = "Recepit of $roomName reservation";

  $charge = \Stripe\Charge::create([
    'amount' => $amount, // importo in AED
    'currency' => $currency,
    'description' => $desc,
    'source' => $token,
  ]);

  // Generate invoice
  $invoice_path = CreateInvoicebyId($customerId, $roomName, $totalPrice);

  // Update the order in the database
  // Delete order attempt from DB
  $array_delete = array(':sessionid'  => session_id());
  $sql_delete = "DELETE FROM orderattempt WHERE sessionId = :sessionid;";
  list($status_delete,$content_delete,$nrows_delete) = read_db_pdo($sql_delete,$array_delete);

  //Update reservation 
  $params = array(
    ':customerId' => $customerId,
    ':roomId' => $roomId,
    ':checkin' => $checkin,
    ':checkout' => $checkout,
    ':amount' => $amount,
    ':invoice_path' => $invoice_path
  );

  $sql_insert = "INSERT INTO roomreservation (customerId, roomId, checkinDate, checkoutDate, totalPayed, invoiceUrl, isConfirmed)  
                VALUES (:customerId, :roomId, :checkin, :checkout, :amount, :invoice_path,'1')";
  list($status_insert, $content_insert, $nrows_insert) = write_db_pdo($sql_insert, $params);

  // Payment Complete
  $response = [
    'success' => true,
    'message' => 'Pagamento completato con successo',
  ];
  

} catch (\Stripe\Error\Card $e) {
  $response = [
    'success' => false,
    'error' => 'Errore nella carta di credito: ' . $e->getMessage()
  ];

} catch (\Stripe\Error\RateLimit $e) {
  $response = [
    'success' => false,
    'error' => 'Troppe richieste: ' . $e->getMessage()
  ];

} catch (\Stripe\Error\InvalidRequest $e) {
  $response = [
    'success' => false,
    'error' => 'Parametri non validi: ' . $e->getMessage()
  ];

} catch (\Stripe\Error\Authentication $e) {
  $response = [
    'success' => false,
    'error' => 'Autenticazione non riuscita: ' . $e->getMessage()
  ];

} catch (\Stripe\Error\ApiConnection $e) {
  $response = [
    'success' => false,
    'error' => 'Errore di connessione: ' . $e->getMessage()
  ];

} catch (\Stripe\Error\Base $e) {
  $response = [
    'success' => false,
    'error' => 'Errore: ' . $e->getMessage()
  ];

} catch (Exception $e) {
  $response = [
    'success' => false,
    'error' => 'Errore generico: ' . $e->getMessage()
  ];
}

echo json_encode($response);
?>
