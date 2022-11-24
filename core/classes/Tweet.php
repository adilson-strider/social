<?php

class Tweet extends Usuario {

    protected $pdo;

    function __construct($pdo){

        $this->pdo = $pdo;
    }
}
?>