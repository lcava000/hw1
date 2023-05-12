<?php
require_once('../function.php');

// Get Request ID
$customerId = $_GET['customerId'];

if (empty($customerId)) {


} else {
    $data = array();
    // Query Request
    $array_read = array(':customerId'  => $customerId);
    $sql_read = "SELECT * FROM `roomreservation` JOIN roomtype ON roomtype.id = roomreservation.roomId WHERE customerId = :customerId;";
    list($status_read,$content_read,$nrows_read) = read_db_pdo($sql_read,$array_read);

    if($nrows_read > 0){
        foreach($content_read as $content_read_v){

            $data[] = array(
                'id' => $content_read_v["id"],
                'checkinDate' => $content_read_v["checkinDate"],
                'checkoutDate' => $content_read_v["checkoutDate"],
                'totalPayed' => $content_read_v["totalPayed"],
                'isConfirmed' => $content_read_v["isConfirmed"],
                'roomName' => $content_read_v["roomName"],
                'roomBed' => $content_read_v["roomBed"]
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
