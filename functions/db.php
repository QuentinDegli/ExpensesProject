<?php

function getDbConnection(): PDO
{
    [
        'DB_HOST' => $host,
        'DB_NAME' => $dbname,
        'DB_PORT' => $port,
        'DB_USER' => $root,
        'DB_PASSWORD' => $password,
        'DB_CHARSET' => $charset
    ] = parse_ini_file(__DIR__ . '/db.ini');
    //DSN 
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=$charset;user=$root;password=$password;charset=$charset");

    // Options pour la connexion PDO
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ];

    return $pdo;
}
