<?php
require_once 'functions/db.php';
require_once 'layout/header.php';
require_once 'classes/Utils.php';
require_once 'classes/Category.php';

session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$searchQuery = isset($_GET['search']) ? $_GET['search'] : '';

// Connexion à la BDD
$pdo = getDbConnection();

// Requête SQL nom ou montant
$query = "SELECT * FROM expenses WHERE user_id = :user_id AND (name LIKE :searchQuery OR amount LIKE :searchQuery)";
$stmt = $pdo->prepare($query);
$stmt->bindValue(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);
$stmt->bindValue(':searchQuery', '%' . $searchQuery . '%', PDO::PARAM_STR);
$stmt->execute();

// Récupérer les résultats 
$expenses = $stmt->fetchAll(PDO::FETCH_ASSOC);

//Utils::redirect('results-search.php');

?>

<h1>Résultats de la recherche</h1>

<table>
    <tr>
        <th>Intitulé de la dépense</th>
        <th>Date</th>
        <th>Montant</th>
    </tr>

    <?php 

    foreach ($expenses as $expense) : ?>
        <tr>
            <td><?php echo $expense['name']; ?></td>
            <td><?php echo $expense['date']; ?></td>
            <td><?php echo $expense['amount']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<?php require_once 'layout/footer.php'; ?>
