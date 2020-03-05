<?php
/**
 * Customer
 */
class Customer {
    private $_name;     // string
    private $_rentals;  // array

    function __construct(string $name) {
        $this->_name = $name;
        $this->_rentals = [];
    }

    public function addRental(Rental $arg) {
        array_push($this->_rentals, $arg);
    }

    public function getRentals() {
        return $this->_rentals;
    }

    public function getName(): string {
        return $this->_name;
    }

}

?>
