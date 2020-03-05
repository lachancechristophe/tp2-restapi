<?php
// addMovie(string $movieTitle, string $movieCatStr)
// findMovie(string $movieTitle)

$request = $_SERVER['REQUEST_METHOD'];

if($request == "OPTIONS"){
    echo json_encode("Movie: OPTIONS");
}else if($request == "GET") {
    if(isset($_GET['movie_name'])){
        echo json_encode("Get movie: " . $_GET['movie_name']);
    } else {
        echo json_encode("Get movie: no name specified");
    }
}else if($request == "POST") {
    if(isset($_POST['movie_name'])){
        echo json_encode("POST movie: " . $_POST['movie_name']);
    } else {
        echo json_encode("POST movie: no name specified");
    }
} else if($request == "PUT") {
    if(isset($_REQUEST['movie_name'])){
        echo json_encode("Put movie: " . $_REQUEST['movie_name']);
    } else {
        echo json_encode("Put movie: no name specified");
    }
} else {
    echo json_encode("movie: no request");
}
?>

