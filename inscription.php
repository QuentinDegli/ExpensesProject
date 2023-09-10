<?php 
require_once 'layout/header.php';
require_once 'classes/CodeError.php';

session_start(); // Démarrer la session
?>

<h1>Inscription</h1>

<div class="add-form">
<form action="traitement.php" method="post" class="form">
        <label for="firstname" class="label">Prénom :</label>
        <input type="text" id="firstname" name="firstname" required><br><br>

        <label for="lastname" class="label">Nom :</label>
        <input type="text" id="lastname" name="lastname" required><br><br>

        <label for="birthdate" class="label">Date de naissance :</label>
        <input type="date" id="birthdate" name="birthdate" required><br><br>

        <label for="email" class="label">Email :</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password" class="label">Mot de passe :</label>
        <input type="text" id="password" name="password" required><br><br>

        <input type="submit" value="Soumettre">
    </form>
</div>


<?php require_once 'layout/footer.php'; ?>
