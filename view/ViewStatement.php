<?php

class ViewStatement {

    private $dataModel;

    public function __construct() {

    }

    public function setData(ModelStatement $dataModel) {
        $this->dataModel = $dataModel;
    }

    public function getStatement(): string {
        $rentals = $this->dataModel->getRentals();
        $statement = 'Rental Record for ' . $this->dataModel->getCustomerName() . '<br/>';
        while (count($rentals) > 0) {
            $currentRental = array_pop($rentals);
            $statement .= '&nbsp;' . $currentRental->getMovie()->getTitle() . '&nbsp;' . (string) $currentRental->getCharge() . '<br/>';
        }
        $statement .= 'Amount owed is ' . $this->dataModel->getTotalAmount() . '<br/>';
        $statement .= 'You earned ' . $this->dataModel->getTotalFrequentRenterPoints() . ' frequent renter points';
        return $statement;
    }

}

?>
