<?php

class CategoryClassical extends MovieCategory {

    const CLASSICAL_MOVIE_BASE_FEE = 2.5;

    public function __construct() {
        parent::__construct();
    }

    public function getCharge(int $daysRented): float {
        $result = MovieCategory::INITIAL_FEE;
        $result += self::CLASSICAL_MOVIE_BASE_FEE;
        return $result;
    }
}

?>
