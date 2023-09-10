<?php 
require_once 'layout/header.php';
require_once 'classes/CodeError.php';
?>
    
<h1>My Wallet</h1>

<h2>Accueil et identification</h2>

<?php if (isset($_GET['error'])) { ?>
  <div class="error">
    <?php echo CodeError::getErrorMessage(intval($_GET['error'])); ?>
  </div>
<?php } ?>

<div class="add-form">
<form action="auth.php" method="post" class="form">
  <div class="auth-form">
    <div id="emailHelp" class="form-text">Veuillez vous connecter</div>
    <label for="email" class="form-label">Email</label>
    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" required>
  </div>
  <div>
    <label for="password" class="form-label">Mot de passe :</label>
    <input type="password" name="password" class="form-control" id="password" required>
  </div>
  <div>
    <input type="checkbox" class="form-check" id="Checkbox">
    <label class="form-check-label" for="Checkbox">Se déconnecter</label>
  </div>
  <input type="submit" class="connexion-button" value="Connexion"></input>
  <a href="inscription.php">Vous n'avez pas de compte, veuillez vous inscrire</a>
</form>
</div>
<br><br>

<?php require_once 'layout/footer.php'; ?>

