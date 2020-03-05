<?php
/**
 * Classe Test pour tester l'application "Movie, Rental, Customer"
 *
 * Dépendances
 *      TestView
 *
 * Journal des modifications
 *      Eric 2020-02-13
 *          Création de la classe
 *          Extraction des "magic string"
 *      Eric 2020-02-28
 *          Utilisation de l'objet MainController
 *
 */
class Test {

    public const DATA_MOVIE_NAME = [
        'Moulin Rouge',
        'Chicago',
        'Mary Poppins',
        'Men in Black',
        'Blade Runner 2049'
    ];

    public const DATA_MOVIE_CATEGORY = [
        'CategoryChildren',
        'CategoryClassical',
        'CategoryNewRelease',
        'CategoryRegular'
    ];

    public const DATA_RENTAL = [
        0, 1, 2, 3, 4,
    ];

    public const DATA_CUSTOMER = [
        'Simon Saint-Pierre',
        'Julie Beauchemin',
        'Maxime Tremblay',
        'Joannie Hurtubise',
        'Chantal Lescot',
    ];

    private $testView;

    function __construct() {
        $this->init();
    }

    private function init() {
        $this->testView = new TestView();
        $this->allTests();
    }

    public function getOutput(): string {
        return (string) $this->testView->getOutput();
    }

    public function allTests() {
        $this->movieInstanceofMovie();
        $this->movieGetTitle();
        $this->rentalInstanceofRental();
        $this->customerInstanceofCustomer();

        // Scenario : trois locations au hasard
        $this->testView->addSubTitleScenario();

        $main = new MainController();

        $c1 = $this->getACustomer();
        $main->addCustomer($c1->getName());

        $m1 = $this->getAMovie();
        $m2 = $this->getAMovie();
        $m3 = $this->getAMovie();
        $main->addMovie($m1->getTitle(), $m1->getCategoryName());
        $main->addMovie($m2->getTitle(), $m2->getCategoryName());
        $main->addMovie($m3->getTitle(), $m3->getCategoryName());

        $cust1 = $main->findCustomer($c1->getName());
        $mov1 = $main->findMovie($m1->getTitle());
        $mov2 = $main->findMovie($m2->getTitle());
        $mov3 = $main->findMovie($m3->getTitle());

        $cust1->addRental($this->getARentalWithThisMovie($mov1));
        $cust1->addRental($this->getARentalWithThisMovie($mov2));
        $cust1->addRental($this->getARentalWithThisMovie($mov3));

        $main->prepareStatementForCustomer($cust1);
        $this->testView->addPlainStatement($main->getStatement());
    }

    // MOVIE
    public function movieInstanceofMovie() {
        $this->addStatement(__METHOD__, ($this->getAMovie() instanceof Movie));
    }

    // Exemple pour améliorer le "coverage" : construire un objet et tester une méthode
    public function movieGetTitle() {
        $movieName = $this->getRndData(self::DATA_MOVIE_NAME);
        $movie = $this->getAMovieWithThisName($movieName);
        $this->addStatement(__METHOD__, ($movie->getTitle() === $movieName));
    }

    // RENTAL
    public function rentalInstanceofRental() {
        $this->addStatement(__METHOD__, ($this->getARental() instanceof Rental));
    }

    // CUSTOMER
    public function customerInstanceofCustomer() {
        $this->addStatement(__METHOD__, ($this->getACustomer() instanceof Customer));
    }

    // private methods //

    private function addStatement(string $testName, bool $isSuccess) {
        $this->testView->addStatement($testName, $isSuccess);
    }

    // private services (functions) //

    private function getACustomer():Customer {
        $customerName = $this->getRndData(self::DATA_CUSTOMER);
        return new Customer($customerName);
    }

    private function getARental():Rental {
        $movie = $this->getAMovie();
        $daysRented = $this->getRndData(self::DATA_RENTAL);
        return new Rental($movie, $daysRented);
    }

    private function getARentalWithThisMovie(Movie $movie):Rental {
        $daysRented = $this->getRndData(self::DATA_RENTAL);
        return new Rental($movie, $daysRented);
    }

    private function getAMovie():Movie {
        $movieName = $this->getRndData(self::DATA_MOVIE_NAME);
        $movieCat = $this->getAMovieCategory();
        return new Movie($movieName, $movieCat);
    }

    private function getAMovieWithThisName(string $movieName):Movie {
        $movieCat = $this->getAMovieCategory();
        return new Movie($movieName, $movieCat);
    }

    private function getAMovieWithThisCat(CategoryMovie $movieCat):Movie {
        $movieName = $this->getRndData(self::DATA_MOVIE_NAME);
        return new Movie($movieName, $movieCat);
    }

    // private sub services (functions) //

    private function getAMovieCategory():Object {
        $movieCat = $this->getRndData(self::DATA_MOVIE_CATEGORY);
        return new $movieCat();
    }

    private function getRndData(array $dataArray) {
        return $dataArray[array_rand($dataArray)];
    }


}

?>
