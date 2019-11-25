<!-- MAIN -->
<aside class="aside">
  <div class="menuAside">
    <h2>Gérer les chapitres</h2>
    <ul>
      <!-- lien vers la vue d'ajout d'article -->
      <li><a href="index.php?controller=admin&task=showAddArticle"><i class="fas fa-plus"></i> Ajouter un chapitre</a></li>
      <!-- Liste des titres des articles -->
      <?php foreach ($articlesList as $articleList): ?>                
      <li><a href="<?= "index.php?controller=admin&task=showUpdateArticle&id=" . $articleList['id'] ?>">
      <?= $articleList['title'] ?></a>
      </li>
      <?php endforeach; ?>
    </ul>
  </div>
</aside>


<!-- AFFICHAGE DE L'ARTICLE -->
<div class="content">
  <article class="articles">
    <h2 class="articleTitle">Gestion du chapitre : <?= $article['title'] ?></h2>

    <!-- FORMULAIRE DE MODIFICATION DE L'ARTICLE -->
    <form action="index.php?controller=admin&task=updateArticle" method="post">
      <!-- Titre et date d'ajout de l'article -->
      <p>
        <label for="title">Entrez votre titre :</label>
        <input type="text" name="title" value= "<?= $article['title'] ?>" required>
      </p>
      <!-- Titre et date d'ajout de l'article -->
      <p>
        <label for="title">Entrez votre introduction :</label>
        <textarea class="introduction" name="introduction"><?= $article['introduction']?></textarea>
      </p>
      <!-- contenu de l'article -->
      <textarea name="txtContent" id="mytextarea"><?= $article['content']?></textarea>
      <!-- bouton valider -->
      <button class="btn btn-primary" id="button5" type="submit" formaction="index.php?controller=admin&task=updateArticle">Modifier</button>
      <!-- bouton supprimer -->
      <button class="btn btn-danger" id="button5" type="submit" formaction="index.php?controller=admin&task=delete&id=<?= $article['id'] ?>">Supprimer</button>
      <!-- Donnée supplémentaire envoyée -->
      <input type="hidden" name="idArticle" value="<?= $article['id'] ?>">
    </form>
  </article>

  <!-- AFFICHAGE DES COMMENTAIRE DE L'ARTICLE -->
  <div class="comments">
    <h3><u>Gestion des commentaires du chapitre : <?= $article['title'] ?></u></h3>
    <?php foreach ($commentsList as $comment): ?>

      <!-- FORMULAIRE DE MODIFICATION DU COMMENTAIRE -->
      <form class="formComment" action="index.php?controller=admin&task=updateComment" method="post">
        <fieldset class="report">
          <!-- Nom de l'auteur et de la date d'ajout du commentaire -->
          <legend class="authorReport"><b><?= $comment['author'] ?></b> a commenté :</legend>
          <time>le <?= $comment['dateCom_fr'] ?></time>
          <!-- Indique si le commentaire a été signalé -->
          <?php if ($comment['report']) {
              echo "<div class='signal'>Ce commentaire a été signalé</div>";
            }
          ?>
          <!-- Contenu du commentaire -->
          <textarea name="txtReportCom" id="textReportCom" rows="8" cols="80"><?= $comment['content'] ?></textarea>
          <div>
            <!-- Bouton valider -->
            <button class="btn btn-success" id="button5" type="submit">Valider</button>
            <!-- Bouton supprimer -->
            <button class="btn btn-danger" id="button5" type="submit" formaction="index.php?controller=comment&task=delete&id=<?= $comment['id'] ?>">Supprimer</button>
          </div>
          <!-- Données supplémentaires envoyées -->
          <input type="hidden" name="idArticle" value="<?= $comment['article_id'] ?>" />
          <input type="hidden" name="idComment" value="<?= $comment['id'] ?>" />
          <input type="hidden" name="username" value="<?= $comment['author'] ?>" />
        </fieldset>
      </form>
    <?php endforeach; ?>
  </div>
</div>