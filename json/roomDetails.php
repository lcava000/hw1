<?php
require_once('../function.php');

// Get Request ID
$roomServiceId = $_GET['id'];;


if (empty($roomServiceId)) {

} else {
    $data = array();
    // Query Request
    $array_read = array(':roomServiceId'  => $roomServiceId);
    $sql_read = "SELECT *  FROM `roomservice` WHERE roomId = :roomServiceId";
    list($status_read,$content_read,$nrows_read) = read_db_pdo($sql_read,$array_read);

    if($nrows_read > 0){

        $data = array(
            'roomName' => $content_read[0]["roomName"],
            'roomDescription' => $content_read[0]["roomDescription"],
            'roomImage' => $content_read[0]["roomImage"]
        );

        // Convert the PHP array to a JSON string
        $json = json_encode($data);

        // Set the content type header to application/json
        header('Content-Type: application/json');

        // Output the JSON string
        echo $json;

    }
}

?>