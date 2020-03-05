<?php
/**


*/
class CategoryRegular extends MovieCategory {

    const REGULAR_MOVIE_BASE_FEE = 2;
    const REGULAR_MOVIE_SUP_FEE = 1.5;

    public function __construct() {
        parent::__construct();
    }

    public function getCharge(int $daysRented): float {
        $result = MovieCategory::INITIAL_FEE;
        $result += self::REGULAR_MOVIE_BASE_FEE;
        if ($daysRented > MovieCategory::STANDARD_DAYS_REGULAR_RENT) {
            $result += ($daysRented - MovieCategory::STANDARD_DAYS_REGULAR_RENT) * self::REGULAR_MOVIE_SUP_FEE;
        }
        return $result;
    }
}

?>
