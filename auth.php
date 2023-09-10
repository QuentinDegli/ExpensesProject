<?php

require_once 'classes/Utils.php';
require_once 'classes/CodeError.php';
require_once 'functions/db.php';

if (empty($_POST['email']) || empty($_POST['password'])) {
    Utils::redirect('index.php?error=' . CodeError::LOGIN_FIELDS_REQUIRED);
}

$email = $_POST['email'];
$password = $_POST['password'];

// connexion à BDD
$pdo = getDbConnection();

// Requête SQL
$query = "SELECT * FROM users WHERE email = :email";
$stmt = $pdo->prepare($query);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user && password_verify($password, $user['passwordHash'])) 
{
    // Démarrer la session
    session_start();
    $_SESSION['login'] = $user['email'];
    $_SESSION['first_name'] = $user['first_name']; 
    $_SESSION['user_id'] = $user['id'];
    Utils::redirect('add-expenses.php');
} else {
    Utils::redirect('index.php?error=' . CodeError::INVALID_CREDENTIALS);
}