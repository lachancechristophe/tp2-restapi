<?php
/**
 * Movie
 */
class Movie {

    private $_title;        // string
    private $_movieCat;     // MovieCategory

    function __construct(string $title, MovieCategory $movieCat) {
        $this->_title = $title;
        $this->_movieCat = $movieCat;
    }

    public function getTitle(): string {
        return $this->_title;
    }

    public function getMovieCategory(): MovieCategory {
        return $this->_movieCat;
    }

    public function getCategoryName(): string {
        return $this->_movieCat->getName();
    }

    public function setMovieCategory(MovieCategory $mc) {
        $this->_movieCat = $mc;
    }

    public function getCharge(int $daysRented): float {
        return $this->_movieCat->getCharge($daysRented);
    }

    public function getFrequentRenterPoints(int $daysRented): int {
        return $this->_movieCat->getFrequentRenterPoints($daysRented);
    }

}

?>
