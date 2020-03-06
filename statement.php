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

$customer = new Customer("Georges-Henri Jean");
$movie = new Movie("Coyote Ugly", new CategoryClassical());
$movie2 = new Movie("Operation Swordfish", new CategoryRegular());
$rental = new Rental($movie, 3);
$rental2 = new Rental($movie2, 2);

$customer->addRental($rental);
$customer->addRental($rental2);

$main->addCustomerInstance($customer);

if($request == "OPTIONS"){
    $response .= "Statement: OPTIONS. ";
    $response .= "GET parameters- ";
    $response .= "customer_name: Customer name for statement. ";
    $response .= "Returns: Prepared data for statement. ";
}else if($request == "GET") {
    if(isset($_GET['customer_name'])){
        $customer_name = filter_var($_GET['customer_name'], FILTER_SANITIZE_STRING);
        $response .= "Get statement for Customer name: " . $customer_name . ". ";

        $found = $main->findCustomer($customer_name);
        if($found != null){
            $response .= "Found customer: " . $found->getName() . ". ";

            $data = $main->prepareStatementForCustomer($found);
            $temp_rentals = $data->getRentals();
            $rental_data = array();
            foreach($temp_rentals as $rental){
                $localdata = array($rental->getMovie()->getTitle(), $rental->getCharge());
                array_push($rental_data, $localdata);
            }

            $t = ["response_text" => $response, "customer_name" => $data->getCustomerName(), "total_amount" => $data->getTotalAmount(), "renter_points" => $data->getTotalFrequentRenterPoints(), "rentals" => $rental_data];

        } else {
            $response .= "Customer not found in database.";
        }
    } else {
        $response .= "Get statement: no name specified";
    }
} else {
    $response .= "Statement- Error 405: no request or bad request.";
}
if(!isset($t)){
    $t = ["response_text" => $response];
}
echo json_encode($t);
?>