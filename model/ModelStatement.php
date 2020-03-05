<?php

class ModelStatement {

    const STATEMENT_INIT_AMOUNT = 0;
    const STATEMENT_INIT_FRP = 0;

    private $_rentals;
    private $_customerName;
    private $_totalAmount;
    private $_totalFrequentRenterPoints;

    public function __construct(array $rentals, string $customerName) {
        $this->_rentals = $rentals;
        $this->_customerName = $customerName;
        $this->_totalAmount = self::STATEMENT_INIT_AMOUNT;
        $this->_totalFrequentRenterPoints = self::STATEMENT_INIT_FRP;
        $this->sumStatement();
    }

    public function getRentals():array {
        return $this->_rentals;
    }

    public function getCustomerName():string {
        return $this->_customerName;
    }

    public function getTotalAmount():int {
        return $this->_totalAmount;
    }

    public function getTotalFrequentRenterPoints():int {
        return $this->_totalFrequentRenterPoints;
    }

    private function sumStatement() {
        $rentals = $this->_rentals; // hard copy!
        while (count($rentals) > 0) {
            $currentRental = array_pop($rentals);
            $this->_totalFrequentRenterPoints += $currentRental->getFrequentRenterPoints();
            $this->_totalAmount += $currentRental->getCharge();
        }
    }

}

?>
