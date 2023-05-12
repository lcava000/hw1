<?php

/*  -----------------------------------------------------------------------------------------------
         Documentation: https://github.com/Invoice-Generator/invoice-generator-api
--------------------------------------------------------------------------------------------------- */

//function CreateInvoice($name, $surname, $paymentId, $roomName, $total){
function CreateInvoice(){

    $apiUrl = 'https://invoice-generator.com';

    $data = array(
        'from' => 'Emaar Properties Ltd',
        'to' => 'Cavallaro Lorenzo',
        'logo' => 'https://i.ibb.co/1XCD2mw/black.png',
        'number' => 1,
        'currency' => 'AED',
        'items' => array(
            array(
                'name' => 'Single Sea View Suite',
                'quantity' => 1,
                'unit_cost' => 11200.50,
            ),
        ),
        'notes' => 'Thanks for your business!',
    );

    $options = array(
        'http' => array(
            'header' => "Content-Type: application/json\r\n",
            'method' => 'POST',
            'content' => json_encode($data),
        ),
    );

    $context = stream_context_create($options);
    $response = file_get_contents($apiUrl, false, $context);

    $filename = uniqid().'.pdf';

    file_put_contents('../invoices/'.$filename, $response);


    }

    CreateInvoice();

?>
