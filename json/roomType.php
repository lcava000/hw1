<?php
require_once('../function.php');

    $data = array();
    // Query Request
    $array_read = array();
    $sql_read = "SELECT * FROM `roomservice`";
    list($status_read,$content_read,$nrows_read) = read_db_pdo($sql_read,$array_read);

    if($nrows_read > 0){
        foreach($content_read as $content_read_v){

            $data[] = array(
                'roomId' => $content_read_v["roomid"],
                'roomName' => $content_read_v["roomname"],
                'roomDescription' => $content_read_v["roomdescription"],
                'roomShortDescription' => $content_read_v["roomshortdescription"],
                'roomImage' => $content_read_v["roomimage"],
            );
        }

        // Convert the PHP array to a JSON string
        $json = json_encode($data);

        // Set the content type header to application/json
        header('Content-Type: application/json');

        // Output the JSON string
        echo $json;

    }

?>