<?php
require_once('../function.php');

// Get Request ID
$roomServiceId = $_GET['id'];
$checkinDate = $_GET['checkin'];
$checkoutDate = $_GET['checkout'];


if (empty($roomServiceId) || empty($checkinDate) || empty($checkoutDate)) {

} else {
    $data = array();
    // Query Request
    $array_read = array(':roomServiceId'  => $roomServiceId);
    $sql_read = "SELECT id, roomType.roomName, roomPrice, roomService.roomName as 'serviceName' FROM `roomType` JOIN roomService ON roomService.roomId = roomType.roomServiceId WHERE roomServiceId = :roomServiceId";
    list($status_read,$content_read,$nrows_read) = read_db_pdo($sql_read,$array_read);

    if($nrows_read > 0){
        foreach($content_read as $content_read_v){

            // Query Check if room is avaible
            $array_check_room = array(':roomId'  => $content_read_v["id"], ':checkinDate'  => $checkinDate, ':checkoutDate'  => $checkoutDate);
            $sql_check_room = "SELECT * FROM `roomReservation` 
                                WHERE roomId =:roomId AND checkoutDate > :checkinDate AND checkinDate < :checkoutDate;
                                ;";
            list($status_check_room,$content_check_room,$nrows_check_room) = read_db_pdo($sql_check_room,$array_check_room);

            if($nrows_check_room > 0){
                $available = false;
            }
            else{
                $available = true;
            }

            $data[] = array(
                'id' => $content_read_v["id"],
                'roomName' => $content_read_v["roomName"],
                'roomPrice' => $content_read_v["roomPrice"],
                'serviceName' => $content_read_v["serviceName"],
                'available' => $available
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