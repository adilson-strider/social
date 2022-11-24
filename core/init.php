<?php

include 'database/conexao.php';
include 'classes/Usuario.php';

global $pdo;

session_start();

$getFromU = new Usuario($pdo);

define("BASE_URL", "http://localhost/social/");