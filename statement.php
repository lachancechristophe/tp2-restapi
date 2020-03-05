<?php


//prepareStatementForCustomer(Customer $c)

//getStatement()

$request = $_SERVER['REQUEST_METHOD'];
$response = "";

if($request == "OPTIONS"){
    $response .= "Statement: OPTIONS";
}else if($request == "GET") {
    if(isset($_GET['statement_name'])){
        $response .= "Get statement: " . $_GET['statement_name'];
    } else {
        $response .= "Get statement: no name specified";
    }
} /*else if($request == "PUT") {
    if(isset($_REQUEST['statement_name'])){
        $response .= "Put statement: " . $_REQUEST['statement_name'];
    } else {
        $response .= "Put statement: no name specified";
    }
} */else {
    $response .= "statement: no request or bad request.";
}

echo json_encode($response);
?>