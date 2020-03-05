<?php

class MovieList extends AList {

    public function __construct() {
        parent::__construct();
    }

    public function add(Movie $movie) {
        array_push($this->_list, $movie);
    }

}

?>
