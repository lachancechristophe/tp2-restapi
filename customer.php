<?php
$request = $_SERVER['REQUEST_METHOD'];
$response = "";

$customer_name = filter_var($_GET['customer_name'], FILTER_SANITIZE_STRING);

if($request == "OPTIONS"){
    $response .= "Customer: OPTIONS";
}else if($request == "GET") {
    // findCustomer(string $customerName)
    if(isset($customer_name)){
        $response .= "Get customer: " . $customer_name;
    } else {
        $response .= "Get customer: no name specified";
    }
} else if($request == "PUT") {
    $json = file_get_contents('php://input');
    $data = json_decode($json);

    if(isset($data->customer_name)){
        $response .= "Put customer: " . $data->customer_name;
    } else {
        $response .= "Put customer: no name specified";
    }
} else {
    $response .= "customer: no request or bad request.";
}

echo json_encode($response);
?>

