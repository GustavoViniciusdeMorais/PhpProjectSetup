# Soap Simple Example

Soap is a protocol that reurns an object throught a WSDL file structure that defines
how client and server will communicate.
The soap server has functions which the client whants to run. To do this, the client
request the object to the server, and then runs the function.

### SOAP Server (server.php)
```php
<?php
// Define a simple web service
function sayHello($name) {
    return "Hello, $name!";
}

// Create a SOAP server
$server = new SoapServer(null, array('uri' => 'http://localhost/soap-server'));

// Register the service function
$server->addFunction('sayHello');

// Handle SOAP requests
$server->handle();
?>
```

### SOAP Client (client.php)
```php
<?php
// Create a SOAP client
$client = new SoapClient(null, array(
    'location' => 'http://localhost/soap-server/server.php',
    'uri' => 'http://localhost/soap-server',
));

// Call the sayHello function on the server
$response = $client->sayHello('John');

// Print the response
echo $response;
?>
```

### Explanation:

1. **SOAP Server (`server.php`):**
   - Defines a simple web service function (`sayHello`).
   - Creates a SOAP server instance, specifying the service's URI.
   - Registers the `sayHello` function with the server.
   - Handles incoming SOAP requests.

2. **SOAP Client (`client.php`):**
   - Creates a SOAP client instance, specifying the server's location and URI.
   - Calls the `sayHello` function on the server with the argument `'John'`.
   - Prints the response received from the server.

### WSDL (Web Services Description Language):

WSDL is an XML-based language that provides a standardized way to describe web services. It defines the operations, input/output messages, and communication details for a web service. In simpler terms, WSDL acts as a contract between the service provider and the service consumer, specifying how to interact with the web service.

In the above example, since we didn't explicitly create a WSDL file, PHP's SOAP server generates a basic WSDL file dynamically. You can access it by appending `?wsdl` to the server URL (e.g., `http://localhost/soap-server/server.php?wsdl`). This WSDL file describes the available functions, their parameters, and the communication details.

### How the Request Works:

1. The SOAP client (`client.php`) creates a request to the SOAP server (`server.php`) by calling the `sayHello` function with the argument `'John'`.
2. The SOAP client formats the request based on the WSDL contract (or dynamically generated contract) to ensure proper communication.
3. The SOAP server receives the request, processes it using the registered function (`sayHello`), and sends back a SOAP response.
4. The SOAP client receives the response and extracts the relevant data.

This is a basic example, and in a real-world scenario, you might need to handle more complex data structures and security considerations. Additionally, proper error handling and validation should be implemented for a production environment.
