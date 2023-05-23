<?php
include_once('../function.php');

/*  -----------------------------------------------------------------------------------------------
        Documentation: https://github.com/Invoice-Generator/invoice-generator-api  
         
        PER IL PROFESSORE:

        HO DOVUTO UTILIZZARE CURL SU UN DOMINIO ESTERNO PER POTER GENERARE LE FATTURE
        QUESTO PERCHE' GIRANDO LOCALMENTE AVEVO PROBLEMI RIGUARDO LA SCRITTURA DEI FILE 
        CON FILE PUT CONTENTS, QUINDI HO DOVUTO UTILIZZARE CURL PER POTER GENERARE LE FATTURE.
        SUL DB SALVO IL PERCORSO COMPLETO DELLA FATTURA PER POTERLA VISUALIZZARE ESTERNAMENTE
--------------------------------------------------------------------------------------------------- */

function CreateInvoicebyId($userid, $roomName, $total){
    //gen unique id
    $unique_id = uniqid();

    $array_get_info = array(':id'  => $userid);
    $sql_get_info = "SELECT name, surname FROM `roomcustomer` WHERE id = :id";
    list($status_get_info, $content_get_info, $nrows_get_info) = read_db_pdo($sql_get_info, $array_get_info);

    $name = $content_get_info[0]['name'];
    $surname = $content_get_info[0]['surname'];

    $url = 'https://codepro.it/api/createInvoice.php';

    // Create a new cURL resource
    $curl = curl_init($url);

    // Set the POST data
    $data = array(
        'name' => $name,
        'surname' => $surname,
        'roomname' => $roomName,
        'total' => $total
    );
    $postData = http_build_query($data);

    // Set the appropriate options
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $postData);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    // Execute the request
    $response = curl_exec($curl);

    // Check for errors
    if(curl_errno($curl)){
        $error_message = curl_error($curl);
        // Handle the error appropriately
    }

    // Close cURL resource
    curl_close($curl);

    return $response;
}

?>
