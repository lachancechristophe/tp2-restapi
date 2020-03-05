<?php


//prepareStatementForCustomer(Customer $c)

//getStatement()

$request = $_SERVER['REQUEST_METHOD'];

if($request == "OPTIONS"){
    echo json_encode("Statement: OPTIONS");
}else if($request == "GET") {
    if(isset($_GET['statement_name'])){
        echo json_encode("Get statement: " . $_GET['statement_name']);
    } else {
        echo json_encode("Get statement: no name specified");
    }
} else if($request == "PUT") {
    if(isset($_REQUEST['statement_name'])){
        echo json_encode("Put statement: " . $_REQUEST['statement_name']);
    } else {
        echo json_encode("Put statement: no name specified");
    }
} else {
    echo json_encode("statement: no request");
}
?>