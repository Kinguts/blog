<!-- TITRE DE LA PAGE -->
<?php "Ajouter un chapitre" ?>

<!-- MAIN -->

<aside class="aside">
  <div class="menuAside">
    <h2>Gérer les chapitres</h2>
    <?php if (isset($message)) : ?>
    <p><?php echo $message; ?></p>
    <?php endif; ?> 
    <ul>
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

<aside>
<h2>Gestion des commentaires signalés :</h2>
<div class="comments"> 

  <!-- AFFICHE LES COMMENTAIRES SIGNALES -->
  <?php foreach ($commentsList as $comment): ?>
    
    <!-- FORMULAIRE MODIFICATION DU COMMENTAIRE -->
    <form class="formReport" action="index.php?controller=comment&task=update" method="post">
      <fieldset class="report">
          <!-- Auteur et date d'ajout du commentaire -->
          <legend class="authorReport"><b><?= $comment['author'] ?></b> a commenté :</legend>
          <time class="headerRoport">le <?= $comment['dateCom_fr'] ?></time>
          <!-- Contenu du commentaire -->
          <textarea name="txtReportCom" id="textReportCom" rows="8" cols="80"><?= $comment['content'] ?></textarea>
          <div>
            <!-- Bouton valider -->
            <button class="btn btn-success" id="button5" type="submit">Valider</button>
            <!-- Bouton supprimer -->
            <button class="btn btn-danger" id="button6" type="submit" formaction="index.php?controller=comment&task=delete&id=<?= $comment['id'] ?>">Supprimer</button>
          </div>
          <!-- Données supplémentaires envoyées -->
          <input type="hidden" name="idArticle" value="<?= $comment['article_id'] ?>" />
          <input type="hidden" name="idComment" value="<?= $comment['id'] ?>" />
          <input type="hidden" name="author" value="<?= $comment['author'] ?>" />
      </fieldset>
    </form>
    <?php endforeach; ?>
  </div>
</aside>


