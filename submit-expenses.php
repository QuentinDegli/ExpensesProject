<?php
require_once 'functions/db.php';
require_once 'classes/Utils.php';
require_once 'classes/Category.php'; 

session_start(); // Démarrer la session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $date = $_POST['date'];
    $amount = $_POST['amount'];

    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];

        // Connexion à la BDD
        $pdo = getDbConnection();

        // Requête SQL Inserer 
        $query = "INSERT INTO Expenses (user_id, name, date, amount) VALUES (:user_id, :name, :date, :amount)";
        $stmt = $pdo->prepare($query);
        $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindValue(':name', $name, PDO::PARAM_STR);
        $stmt->bindValue(':date', $date, PDO::PARAM_STR);
        $stmt->bindValue(':amount', $amount, PDO::PARAM_STR);

        if ($stmt->execute()) {
            // Récupère l'ID de la nouvelle dépense
            $expense_id = $pdo->lastInsertId();

            // Associe des tags à la dépense 
            $selectedCategoryId = $_POST['categories']; 
            $tag = new Category($selectedCategoryId, ""); 

            // Insére le tag dans la table ExpenseCategory
            $query = "INSERT INTO ExpenseCategory (expense_id, category_id) VALUES (:expense_id, :category_id)";
            $stmt = $pdo->prepare($query);
            $stmt->bindValue(':expense_id', $expense_id, PDO::PARAM_INT);
            $stmt->bindValue(':category_id', $tag->getId(), PDO::PARAM_INT);
            $stmt->execute();

            // Téléchargement du fichier
            if (isset($_FILES['myFile']) && $_FILES['myFile']['error'] === UPLOAD_ERR_OK) {
                $file = $_FILES['myFile'];

                $filename = basename($file['name']);
                $uploadDir = __DIR__ . '/uploads/';
                $destination = $uploadDir . $filename;

                if (move_uploaded_file($file['tmp_name'], $destination)) {

                    // Insérer le fichier associé à la dépense
                    $query = "INSERT INTO ExpenseFiles (expense_id, filename) VALUES (:expense_id, :filename)";
                    $stmt = $pdo->prepare($query);
                    $stmt->bindValue(':expense_id', $expense_id, PDO::PARAM_INT);
                    $stmt->bindValue(':filename', $filename, PDO::PARAM_STR);
                    $stmt->execute();
                } else {
                    echo "Erreur lors de l'enregistrement du fichier.";
                }
            }

            Utils::redirect('recap-expenses.php');
        } else {
            echo "Erreur lors de l'insertion des données dans la base de données.";
        }
    } else {
        echo "ID utilisateur non trouvé dans la session.";
    }
}
?>
