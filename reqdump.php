<?php

// var_dump($_SERVER);
$request = $_SERVER['REQUEST_METHOD'];
if($request == "PUT") {
    $json = file_get_contents('php://input');
    echo $json;
} else if($request == "GET") {
    echo $_SERVER['QUERY_STRING'];
} 
