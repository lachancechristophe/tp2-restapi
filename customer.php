<?php

require_once('model/lib/AList.php');

require_once('model/ModelStatement.php');

require_once('model/MovieCategory.php');
require_once('model/CategoryChildren.php');
require_once('model/CategoryClassical.php');
require_once('model/CategoryNewRelease.php');
require_once('model/CategoryRegular.php');

require_once('model/Movie.php');
require_once('model/MovieList.php');
require_once('model/Rental.php');
require_once('model/Customer.php');
require_once('model/CustomerList.php');

// CONTROLLER
require_once('controller/MainController.php');

$request = $_SERVER['REQUEST_METHOD'];
$response = "";

$main = new MainController();

//Ajouter un customer a la "Base de donnees"
$main->addCustomer("Georges-Henri Jean");

if($request == "OPTIONS"){
    $response .= "Customer: OPTIONS. ";
    $response .= "GET parameters: ";
    $response .= "customer_name: Customer name. ";
    $response .= "Returns: Customer exists or Customer does not exist. ";

    $response .= "PUT parameters: JSON format";
    $response .= "customer_name: Customer name. ";
    $response .= "Returns: Customer created. ";
}else if($request == "GET") {
    
    // findCustomer(string $customerName)
    if(isset($_GET['customer_name'])){
        $customer_name = filter_var($_GET['customer_name'], FILTER_SANITIZE_STRING);
        $response .= "Get customer: " . $customer_name. ". ";

        $found = $main->findCustomer($customer_name);
        if($found != null){
            $response .= "Found customer: " . $found->getName() . ". ";
        } else {
            $response .= "Customer does not exist in database.";
        }
    } else {
        $response .= "Get customer: no name specified";
    }
} else if($request == "PUT") {
    $json = file_get_contents('php://input');
    $data = json_decode($json);

    if(isset($data->customer_name)){
        $response .= "Put customer: " . $data->customer_name . ". ";

        $main->addCustomer($data->customer_name);

        $found = $main->findCustomer($data->customer_name);
        if($found != null){
            $response .= "Created customer: " . $found->getName() . ". ";
        } else {
            $response .= "Error creating customer.";
        }

    } else {
        $response .= "Put customer: no name specified";
    }
} else {
    $response .= "customer: no request or bad request.";
}

echo json_encode($response);
?>

