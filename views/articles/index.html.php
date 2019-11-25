<h2 id="chapter">Chapitres</h2>

<div class="row mb-2">
  <?php foreach ($articles as $article) : ?>
  <div class="col-md-6">
    <div class="row no-gutters overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative article">
      <div class="col p-4 d-flex flex-column position-static">
		<ul class="align">
          <small class="mb-0 text-muted">Ecrit le <?= $article['dateArt_fr'] ?></small>
          <li><figure class="book">
            <!-- Front -->     
            <ul class="hardcover_front">
              <li>
                <img src="/images/walkingcover.jpg" alt="" width="100%" height="100%">                
              </li>
              <li></li>
            </ul>     
            <!-- Pages -->     
            <ul class="page">
              <li></li>
              <li>                 
                <a href="index.php?controller=article&task=show&id=<?= $article['id'] ?>" class="buttonbook">Lire la suite</a>               
              </li>
              <li></li>
              <li></li>
              <li></li>
            </ul>     
            <!-- Back -->     
            <ul class="hardcover_back">
              <li></li>
              <li></li>
            </ul>
            <ul class="book_spine">
              <li></li>
              <li></li>
            </ul>
            <figcaption>
              <h3 class="mb-2 chapitre"><?= $article['title'] ?></h3>
              <span>Jean Forteroche</span>
              <div><?= $article['introduction'] ?></div>
            </figcaption>
          </figure></li>
        </ul>       

        <?php if ( !empty($_SESSION) ) : ?>               			
          <a href="index.php?controller=admin&task=showUpdateArticle&id=<?= $article['id'] ?>" class="btn btn-success"  id="button1">Editer</a>
          <a href="index.php?controller=admin&task=delete&id=<?= $article['id'] ?>" class="btn btn-danger" id="button2">Supprimer</a>
		<?php endif; ?>
    	</div>
    </div>
  </div>
  <?php endforeach ?>
</div>