<?php

class CustomerList extends AList {

    public function __construct() {
        parent::__construct();
    }

    public function add(Customer $customer) {
        array_push($this->_list, $customer);
    }

}

?>
