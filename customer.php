<?php
$request = $_SERVER['REQUEST_METHOD'];
$response = "";

if($request == "OPTIONS"){
    $response .= "Customer: OPTIONS";
}else if($request == "GET") {
    // findCustomer(string $customerName)
    if(isset($_GET['customer_name'])){
        $response .= "Get customer: " . $_GET['customer_name'];
    } else {
        $response .= "Get customer: no name specified";
    }
}/* else if($request == "PUT") {
    if(isset($_REQUEST['customer_name'])){
        $response .= "Put customer: " . $_REQUEST['customer_name'];
    } else {
        $response .= "Put customer: no name specified";
    }
}*/ else {
    $response .= "customer: no request or bad request.";
}

echo json_encode($response);
?>

