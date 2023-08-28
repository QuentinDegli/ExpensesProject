<?php

try {
    //DSN = Data Source Name 
    $pdo = new PDO("mysql:host=host.docker.internal;port=3306;dbname=expenses;charset=utf8mb4","root","");
} catch (PDOException)
{
    echo "La connexion à la bdd a échoué";
    exit;
}

/*
$stmt = $pdo->query("SELECT * FROM product");

$product = $stmt->fetchAll(PDO::FETCH_ASSOC);
var_dump($product);
*/