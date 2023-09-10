<?php
require_once 'functions/db.php';
require_once 'layout/header.php';
require_once 'classes/Category.php';

session_start();

// Vérifier si users est connecté
if (!isset($_SESSION['user_id'])) {
    // Si pas connecté, renvoi vers index.php
    header('Location: index.php');
    exit;
}

// Récupérer l'ID avec la session
$user_id = $_SESSION['user_id'];

// Connexion à la BDD
$pdo = getDbConnection();

// Requête SQL
$query = "SELECT Expenses.*, ExpenseFiles.filename, categories.name AS category_name
          FROM Expenses 
          LEFT JOIN ExpenseFiles ON Expenses.id = ExpenseFiles.expense_id
          LEFT JOIN ExpenseCategory ON Expenses.id = ExpenseCategory.expense_id
          LEFT JOIN categories ON ExpenseCategory.category_id = categories.id
          WHERE Expenses.user_id = :user_id
          ORDER BY Expenses.date DESC";
$stmt = $pdo->prepare($query);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
$stmt->execute();

// Récupérer les résultats
$expenses = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h1>Récapitulatif des dépenses</h1>
<h2>Utilisateur : <?php echo $_SESSION['first_name']; ?></h2>
<div class="add-form">
<form action="search-expenses.php" method="get" class="form">
    <label for="search" class="label">Rechercher une de vos dépense :</label>
    <input type="text" id="search" name="search" placeholder="Nom ou somme">
    <input type="submit" value="Rechercher">
</form>
</div>
<table>
    <tr>
        <th>Intitulé de la dépense</th>
        <th>Date</th>
        <th>Montant</th>
        <th >Catégorie</th>
        <th>Fichier</th>
    </tr>
    <?php foreach ($expenses as $expense) : ?>
        <tr>
            <td><?php echo $expense['name']; ?></td>
            <td><?php echo $expense['date']; ?></td>
            <td><?php echo $expense['amount']; ?></td>
            <td><?php echo $expense['category_name']; ?></td> 
            <td>
                <?php
                if ($expense['filename']) {
                    echo "<a href='uploads/{$expense['filename']}' target='_blank'>Télécharger</a>";
                } else {
                    echo "Aucun fichier";
                }
                ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php require_once 'layout/footer.php'; ?>
</body>
</html>