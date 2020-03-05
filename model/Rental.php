<?php
/**
 * Rental
 */
class Rental {
    private $_movie;        // Movie
    private $_daysRented;   // int

    function __construct(Movie $movie, int $daysRented) {
        $this->_movie = $movie;
        $this->_daysRented = $daysRented;
    }

    public function getDaysRented(): int {
        return $this->_daysRented;
    }

    public function getMovie(): Movie {
        return $this->_movie;
    }

    public function getCharge(): float {
        return $this->_movie->getCharge($this->getDaysRented());
    }

    public function getFrequentRenterPoints(): int {
        return $this->_movie->getFrequentRenterPoints($this->getDaysRented());
    }

}

?>
