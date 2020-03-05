<?php
$request = $_SERVER['REQUEST_METHOD'];

if($request == "OPTIONS"){
    echo json_encode("Customer: OPTIONS");
}else if($request == "GET") {
    // findCustomer(string $customerName)
    if(isset($_GET['customer_name'])){
        echo json_encode("Get customer: " . $_GET['customer_name']);
    } else {
        echo json_encode("Get customer: no name specified");
    }
} else if($request == "PUT") {
    if(isset($_REQUEST['customer_name'])){
        echo json_encode("Put customer: " . $_REQUEST['customer_name']);
    } else {
        echo json_encode("Put customer: no name specified");
    }
} else {
    echo json_encode("customer: no request");
}
?>

