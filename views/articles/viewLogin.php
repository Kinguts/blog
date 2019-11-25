<!-- TITRE DE LA PAGE -->
<?php $title = "Connexion"; ?>

<!-- MAIN -->
<?php ob_start(); ?>

<!-- FORMULAIRE DE CONNEXION -->
<div class="contentLogin">
  <div class="login">
    <h2>Veuillez vous connecter pour accéder à l'espace administrateur.</h2>
    <form class="formConnexion" action="index.php?action=adminLogin" method="post">
      <fieldset>
        <legend>Connexion</legend>
        <!-- Nom d'utilisateur -->
        <label for="username">Pseudo :</label>
        <input type="text" name="username" placeholder="Votre pseudo" required><br />
        <!-- Mot de passe -->
        <label for="password">Mot de passe :</label>
        <input type="password" name="password" placeholder="Votre mot de passe" required><br />
        <div class="button">
          <!-- Bouton valider -->
          <button type="submit">Valider</button>
          <!-- Bouton effacer -->
          <button type="reset">Effacer</button>
        </div>
      </fieldset>
    </form>
    <!-- Affichage du message d'erreur de connexion -->
    <p class="signal"><?= $errorLogin ?></p>
  </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('templates.php'); ?>
