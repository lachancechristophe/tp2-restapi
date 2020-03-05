<?php

class MovieCategory {

    const STANDARD_DAYS_REGULAR_RENT = 2;
    const INITIAL_FEE = 0;

    const DAYS_LIMIT_FOR_MINIMUM_FRQ_RENTER_POINTS = 1;
    const MINIMUM_FRQ_RENTER_POINTS = 1;
    const MAXIMUM_FRQ_RENTER_POINTS = 2;

    public function __construct() {

    }

    public function getName(): string {
        return get_class($this);
    }

    public function getFrequentRenterPoints(int $daysRented): int {
        $frequentRenterPoints = MovieCategory::MINIMUM_FRQ_RENTER_POINTS;
        return $frequentRenterPoints;
    }
}

?>
