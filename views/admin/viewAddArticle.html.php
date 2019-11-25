<div class="content">
  <div class="articles">
    <h2 class="articleTitle"><i class="far fa-edit"></i> Bonne écriture Mr. <?= $_SESSION['username'] ?></h2>
    
    <!-- FORMULAIRE AJOUT D4ARTICLE -->
    <form action="index.php?controller=admin&task=addArticle" method="post">
      <p>
        <!-- Titre de l'article -->
        <label for="title">Entrez votre titre :</label>
        <input type="text" name="title" required>
      </p>
      <p>
        <!-- Introduction de l'article -->
        <label for="introduction">Entrez votre introduction:</label>
        <textarea class="introduction" name="introduction" ></textarea>
      </p>
      <!-- Contenu de l'article -->
      <textarea name="txtContent" id="mytextarea"></textarea>
      <!-- Bouton d'envoie -->
      <input class="btn btn-primary" id="button5" type="submit" value='publier'/>
    </form>
  </div>
</div>