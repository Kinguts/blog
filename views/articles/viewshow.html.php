<div class="article_full"> 
  <h1><?= $article['title'] ?></h1>
  <small>Ecrit le <?= $article['dateArt_fr'] ?></small>
  <p><?= $article['introduction'] ?></p>
  <hr>
  <?= $article['content'] ?>
</div>    
<?php if (count($commentaires) === 0) : ?>
  <h2>Il n'y a pas encore de commentaires pour cet article ... SOYEZ LE PREMIER ! :D</h2>
<?php else : ?>
  <h2>Il y a déjà <?= count($commentaires) ?> réactions : </h2>
  <div class="row mb-2">
    <?php foreach ($commentaires as $commentaire) : ?>
    <div class="col-md-12">
      <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative com">
    	<div class="col p-4 d-flex flex-column position-static commentaire">
          <h3>Commentaire de <?= $commentaire['author'] ?></h3>
          <small>Le <?= $commentaire['dateCom_fr'] ?></small>
          <blockquote>
            <em><?= $commentaire['content'] ?></em>
          </blockquote>
          <?php if ( !empty($_SESSION) ) : ?>
            <a href="index.php?controller=comment&task=delete&id=<?= $commentaire['id'] ?>" class="btn btn-danger" id="button3" onclick="return window.confirm(`Êtes vous sûr de vouloir supprimer ce commentaire ?!`)">Supprimer</a>
          <?php endif; ?>
            <a href="index.php?controller=comment&task=report&id=<?= $commentaire['id'] ?>" class="btn btn-warning" id="button4" onclick="return window.confirm(`Êtes vous sûr de vouloir signaler ce commentaire ?!`)">Signaler</a>
        </div>
      </div>
    </div>
  <?php endforeach ?>
</div>
<?php endif ?>

<form class="formcomment" action="index.php?controller=comment&task=insert" method="POST">
  <h3>Vous voulez réagir ? N'hésitez pas </h3>
  <input class="inputform" type="text" name="author" placeholder="Votre pseudo !">
  <textarea name="content" id="textcomment" cols="30" rows="10" placeholder="Votre commentaire ..."></textarea>
  <input type="hidden" name="article_id" value="<?= $article_id ?>">
  <button class="btn btn-secondary" id="buttonform">Commenter !</button>
</form>