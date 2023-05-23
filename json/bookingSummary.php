<?php
require_once('../function.php');

// Get Request ID
$customerId = $_GET['customerId'];

if (empty($customerId)) {


} else {
    $data = array();
    // Query Request
    $array_read = array(':customerId'  => $customerId);
    $sql_read = "SELECT * FROM `roomreservation` JOIN roomtype ON roomtype.id = roomreservation.roomId WHERE customerid = :customerId;";
    list($status_read,$content_read,$nrows_read) = read_db_pdo($sql_read,$array_read);

    if($nrows_read > 0){
        foreach($content_read as $content_read_v){

            $data[] = array(
                'id' => $content_read_v["id"],
                'checkinDate' => $content_read_v["checkindate"],
                'checkoutDate' => $content_read_v["checkoutdate"],
                'totalPayed' => $content_read_v["totalpayed"] / 100,
                'isConfirmed' => $content_read_v["isconfirmed"],
                'roomName' => $content_read_v["roomname"],
                'roomBed' => $content_read_v["roombed"],
                'invoiceUrl' => $content_read_v["invoiceurl"],
                'timestamp' => $content_read_v["timestamp"]
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
