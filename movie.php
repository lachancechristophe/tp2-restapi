<?php
// addMovie(string $movieTitle, string $movieCatStr)
// findMovie(string $movieTitle)

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

if($request == "OPTIONS"){
    $response .= "GET parameters-";
    $response .= "name: Movie title";
    $response .= "PUT parameters-";
    $response .= "title: Movie title";
    $response .= "category: [CategoryClassical, CategoryRegular, CategoryClassical, CategoryNewRelease, CategoryChildren]";
} else if($request == "GET") {
    if(isset($_GET['title'])){
        $response .= "Get movie: " . $_GET['title'];
    } else {
        $response .= "Get movie: no name specified";
    }
} else if($request == "PUT") {

    $json = file_get_contents('php://input');
    $data = json_decode($json);

    if(isset($data->title)){
        
        $main->addMovie($data->title, $data->category);

        $found = $main->findMovie($data->title);
        $response .= "Put movie: " . $found->getTitle() . ", category: " . $found->getCategoryName();
    } else {
        $response .= "Put movie: no name specified";
    }

} else {
    $response .= "movie: no request or bad request.";
}

echo json_encode($response);
?>

