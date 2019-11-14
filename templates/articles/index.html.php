  <h2 id="chapter">Chapitres</h2>

<div class="row mb-2">
	<?php foreach ($articles as $article) : ?>
    <div class="col-md-6">
    	<div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative article">
    		<div class="col p-4 d-flex flex-column position-static">
    			<small class="mb-0 text-muted">Ecrit le <?= $article['created_at'] ?></small>
    			<h3 class="mb-2 chapitre"><?= $article['title'] ?></h3>
			    <div><?= $article['introduction'] ?></div>
                <a href="index.php?controller=article&task=show&id=<?= $article['id'] ?>" class="button">Lire la suite</a>
			    
    		</div>
    	</div>
    </div>
	<?php endforeach ?>
</div>