<?php

require_once 'functions/db.php';

session_start(); // Démarre la session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $birthdate = $_POST["birthdate"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    try {
        // Connexion à la BDD
        $pdo = getDbConnection();

        // Vérifier si l'utilisateur existe dans la BDD
        $checkQuery = "SELECT COUNT(*) FROM users WHERE email = :email";
        $checkStmt = $pdo->prepare($checkQuery);
        $checkStmt->execute(['email' => $email]);
        // Utilisation du fetch column car on doit récupérer une seule valeur 
        // ainsi c'est plus efficace pour les performances de la page 
        $userCount = $checkStmt->fetchColumn();

        if ($userCount > 0) {
            //Si user existe déjà
            echo "L'utilisateur avec cette adresse e-mail existe déjà. Veuillez utiliser une autre adresse e-mail.";
        } else {
            // si user n'existe pas, on l'ajoute

            // requete SQL pour insérer
            $query = "INSERT INTO users (first_name, last_name, birth_date, email, passwordHash) VALUES (:first_name, :last_name, :birth_date, :email, :passwordHash)";
            $stmt = $pdo->prepare($query);

            // Exécuter la requête 
            $stmt->execute([
                'first_name' => $firstname,
                'last_name' => $lastname,
                'birth_date' => $birthdate,
                'email' => $email,
                'passwordHash' => password_hash($password, PASSWORD_DEFAULT)
            ]);
            // Afficher un message de confirmation, mais impossible d'y mettre du style
            echo "<p class='success-message'>Merci, $firstname $lastname ! Votre inscription a été traitée avec succès. <br> Vous pouvez <a href='add-expenses.php'>ajouter des dépenses ici</a></p>.";
        }
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
} else {
    echo "Erreur : Cette page ne peut être accédée directement.";
}
