<?php

include 'database/conexao.php';
include 'classes/Usuario.php';
include 'classes/Tweet.php';
include 'classes/Follow.php';

global $pdo;

session_start();

$getFromU = new Usuario($pdo);
$getFromT = new Tweet($pdo);
$getFromF = new Follow($pdo);

define("BASE_URL", "http://localhost/social/");