<?php

class MainController {

    private $_viewStatement;
    private $_customerList;
    private $_movieList;

    public function __construct() {
        //$this->_viewStatement = new ViewStatement();
        $this->_customerList = new CustomerList();
        $this->_movieList = new MovieList();
    }

    public function prepareStatementForCustomer(Customer $c) {
        $data = new ModelStatement($c->getRentals(), $c->getName());
        $this->_viewStatement->setData($data);
    }

    public function getStatement():string {
        return $this->_viewStatement->getStatement();
    }

    public function addCustomer(string $customerName) {
        $this->_customerList->add(new Customer($customerName));
    }

    public function addMovie(string $movieTitle, string $movieCatStr) {
        $movieCat = new $movieCatStr();
        $this->_movieList->add(new Movie($movieTitle, $movieCat));
    }

    public function findCustomer(string $customerName): Customer {
        $foundCustomer = null;
        foreach ($this->_customerList->getList() as $customer) {
            if ($customer->getName() == $customerName) {
                $foundCustomer = $customer;
            }
        }
        return $foundCustomer;
    }

    public function findMovie(string $movieTitle): Movie  {
        $foundMovie = null;
        foreach ($this->_movieList->getList() as $movie) {
            if ($movie->getTitle() == $movieTitle) {
                $foundMovie = $movie;
            }
        }
        return $foundMovie;
    }



}

?>
