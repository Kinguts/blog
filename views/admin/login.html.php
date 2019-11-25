<!-- FORMULAIRE DE CONNEXION -->
<div class="contentLogin">
  <div class="login">
    <h2>Veuillez vous connecter pour accéder à l'espace administrateur.</h2>
    <form class="formConnexion" action="index.php?controller=admin&task=login" method="post">
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
          <button class="btn btn-secondary" id="buttonconnect1" type="submit">Valider</button>
          <!-- Bouton effacer -->
          <button class="btn btn-secondary" id="buttonconnect2" type="reset">Effacer</button>
        </div>
      </fieldset>
    </form>
    <!-- Affichage du message d'erreur de connexion -->
    <p class="signal"><?= $errorLogin ?></p>
  </div>
</div>
