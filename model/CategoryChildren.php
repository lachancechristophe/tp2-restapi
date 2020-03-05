<?php
/*

*/
class CategoryChildren extends MovieCategory {

    const CHILDREN_MOVIE_BASE_FEE = 1.5;
    const CHILDREN_MOVIE_SUP_FEE = 1.5;
    const STANDARD_DAYS_CHILDREN_RENT = 3;

    public function __construct() {
        parent::__construct();
    }

    public function getCharge(int $daysRented): float {
        $result = MovieCategory::INITIAL_FEE;
        $result += self::CHILDREN_MOVIE_BASE_FEE;
        if ($daysRented > self::STANDARD_DAYS_CHILDREN_RENT) {
            $result += ($daysRented - self::STANDARD_DAYS_CHILDREN_RENT) * self::CHILDREN_MOVIE_SUP_FEE;
        }
        return $result;
    }
}

?>
