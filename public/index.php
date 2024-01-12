<?php

try {
    // Create a SOAP client
    $client = new \SoapClient(null, array(
        'location' => 'http://localhost/server.php',
        'uri' => 'http://localhost/',
    ));

    // Call the sayHello function on the server
    $response = $client->sayHello('John');

    // Print the response
    echo $response;
    //code...
} catch (\Exception $e) {
    echo "Message: {$e->getMessage()}\n";
    $details = json_encode($e->getTrace());
    echo "Details: {$details}\n";
}