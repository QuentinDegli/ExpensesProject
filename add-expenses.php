<?php 
require_once 'layout/header.php'; 
require_once 'functions/db.php';

?>

<?php
session_start(); // Démarrer la session

// Connexion à BDD
$pdo = getDbConnection();

// Requête SQL
$query = "SELECT id, name FROM categories";
$stmt = $pdo->query($query);

// Récupérer les résultats
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<h1>Ajout d'une dépense</h1>
<h2>Bienvenue <?php echo $_SESSION['first_name']; ?></h2>
<div class="add-form">
<form action="submit-expenses.php" method="post" class="form" enctype="multipart/form-data">
        <label for="name" class="label">Intitulé de la dépense :</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="amount" class="label">Montant de la dépense :</label>
        <input type="int" id="amount" name="amount" required><br><br>
        
        <label for="date" class="label">Date :</label>
        <input type="date" id="date" name="date" required><br><br>
        
        <!-- Ce bout de code était en statique et je ne pouvais pas le relier avec l'ID.
        <label for="categories" class="label">Tag :</label>
        <select id="categories" name="categories">
            <option value="tag1">Logement</option>
            <option value="tag2">Voiture</option>
            <option value="tag3">Santé</option>
            <option value="tag4">Sorties</option>
            <option value="tag5">Courses</option>
        </select><br><br>
-->
        <label for="categories" class="label">Tag :</label>
        <select id="categories" name="categories">
            <?php foreach ($categories as $category) : ?>
                <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
            <?php endforeach; ?>
        </select>

        <label for="myFile" class="label">Télécharger un fichier :</label>
        <input type="file" id="myFile" name="myFile"><br><br>
        
        <input type="submit" value="Soumettre">
    </form>

    </div>
    
    <?php require_once 'layout/footer.php'; ?>