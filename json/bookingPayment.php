<?php
require_once('../function.php');

// Get Request ID
$customerId = $_GET['customerId'];

if (empty($customerId)) {


} else {
    $data = array();
    // Query Request
    $array_read = array(':customerId'  => $customerId);
    $sql_read = "SELECT roompayments.*, roomcustomer.id AS customerId FROM `roompayments` 
                JOIN roomreservation ON roomreservation.id = roompayments.reservationId
                JOIN roomcustomer ON roomcustomer.id = roomreservation.customerId
                WHERE customerId = :customerId;";
    list($status_read,$content_read,$nrows_read) = read_db_pdo($sql_read,$array_read);

    if($nrows_read > 0){
        foreach($content_read as $content_read_v){

            $data[] = array(
                'paymentId' => $content_read_v["paymentId"],
                'reservationId' => $content_read_v["reservationId"],
                'amount' => $content_read_v["amount"],
                'paymentDate' => $content_read_v["paymentDate"],
                'paymentMethod' => $content_read_v["paymentMethod"]
            );
        }

        // Convert the PHP array to a JSON string
        $json = json_encode($data);

        // Set the content type header to application/json
        header('Content-Type: application/json');

        // Output the JSON string
        echo $json;
    }
}
