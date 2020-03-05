<?php
/*
*/
class CategoryNewRelease extends MovieCategory {

    const NEW_RELEASE_DAILY_FEE = 3;

    public function __construct() {
        parent::__construct();
    }

    public function getCharge(int $daysRented): float {
        $result = MovieCategory::INITIAL_FEE;
        $result += $daysRented * self::NEW_RELEASE_DAILY_FEE;
        return $result;
    }

    public function getFrequentRenterPoints(int $daysRented): int {
        $frequentRenterPoints = MovieCategory::MINIMUM_FRQ_RENTER_POINTS;
        if ($daysRented > MovieCategory::DAYS_LIMIT_FOR_MINIMUM_FRQ_RENTER_POINTS) {
            $frequentRenterPoints = MovieCategory::MAXIMUM_FRQ_RENTER_POINTS;
        }
        return $frequentRenterPoints;
    }

}

?>
