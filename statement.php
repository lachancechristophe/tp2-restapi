<?php


//prepareStatementForCustomer(Customer $c)

//getStatement()

$request = $_SERVER['REQUEST_METHOD'];
$response = "";
$statement_id = filter_var($_REQUEST['statement_id'], FILTER_SANITIZE_NUMBER_INT);

if($request == "OPTIONS"){
    $response .= "Statement: OPTIONS";
}else if($request == "GET") {
    if(isset($statement_id)){
        $response .= "Get statement: " . $statement_id;
    } else {
        $response .= "Get statement: no name specified";
    }
} else if($request == "PUT") {
    $json = file_get_contents('php://input');
    $data = json_decode($json);
    if(isset($data->statement_name)){
        $response .= "Put statement: " . $data->statement_name;
    } else {
        $response .= "Put statement: no name specified";
    }
} else {
    $response .= "statement: no request or bad request.";
}

echo json_encode($response);
?>