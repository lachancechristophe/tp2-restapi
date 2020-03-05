<?php
// addMovie(string $movieTitle, string $movieCatStr)
// findMovie(string $movieTitle)

$request = $_SERVER['REQUEST_METHOD'];
$response = "";

if($request == "OPTIONS"){
    $response .= "Movie: OPTIONS";
}else if($request == "GET") {
    if(isset($_GET['movie_name'])){
        $response .= "Get movie: " . $_GET['movie_name'];
    } else {
        $response .= "Get movie: no name specified";
    }
}else if($request == "POST") {
    if(isset($_POST['movie_name'])){
        $response .= "POST movie: " . $_POST['movie_name'];
    } else {
        $response .= "POST movie: no name specified";
    }
} /*else if($request == "PUT") {
    if(isset($_REQUEST['movie_name'])){
        $response .= "Put movie: " . $_REQUEST['movie_name'];
    } else {
        $response .= "Put movie: no name specified";
    }
}*/ else {
    $response .= "movie: no request or bad request.";
}

echo json_encode($response);
?>

