<?php
// Define a simple web service
function sayHello($name) {
    return "Hello, $name!";
}

// Create a SOAP server
$server = new \SoapServer(null, array('uri' => 'http://localhost/soap-server'));

// Register the service function
$server->addFunction('sayHello');

// Handle SOAP requests
$server->handle();
?>