<?php

class AList {

    protected $_list;

    public function __construct() {
        $this->_list = [];
    }

    public function getList():array {
        return $this->_list;
    }
}

?>
