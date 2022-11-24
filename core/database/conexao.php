<?php

    $dsn = 'mysql:host=localhost; dbname=aulasphp';
    $user = 'root';
    $pass = '';

    try {
        $pdo = new PDO($dsn, $user, $pass);
    } catch (PDOException $e) {
        echo 'Erro de conexão! '.$e->getMessage();
    }
?>