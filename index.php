<?php
    // import //

    // MODEL
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

    // VIEW
    require_once('view/ViewStatement.php');

    // CONTROLLER
    require_once('controller/MainController.php');

    // TEST
    require_once('test/view/TestView.php');
    require_once('test/controller/Test.php');

    // run tests //
    $test = new Test();

    // final echo //
    echo $test->getOutput();
?>
