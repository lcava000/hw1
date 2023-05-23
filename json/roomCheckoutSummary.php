<?php
require_once('../function.php');

// Get Request ID
$roomId = $_GET['id'];

if (empty($roomId)) {

} else {
    $data = array();
    // Query Request
    $array_read = array(':roomId'  => $roomId);
    $sql_read = "SELECT id, roomType.roomName, roomType.roomBed, roomPrice, roomService.roomName as 'serviceName' FROM `roomType` JOIN roomService ON roomService.roomId = roomType.roomServiceId WHERE id = :roomId";
    list($status_read,$content_read,$nrows_read) = read_db_pdo($sql_read,$array_read);

    if($nrows_read > 0){
        foreach($content_read as $content_read_v){

            $data = array(
                'id' => $content_read_v["id"],
                'roomName' => $content_read_v["roomName"],
                'roomBed' => $content_read_v["roomBed"],
                'roomPrice' => $content_read_v["roomPrice"],
                'serviceName' => $content_read_v["serviceName"]
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


?>