<h2>Chapitres déjà paru</h2>

<div class="page">
<?php foreach ($articles as $article) : ?>
<div class="container article">
    <div class="row">
        <article class="col-md-4 article">
    <h3><?= $article['title'] ?></h3>
    <small>Ecrit le <?= $article['created_at'] ?></small>
    <p class="article"><?= $article['introduction'] ?></p>
    <a href="index.php?controller=article&task=show&id=<?= $article['id'] ?>" class="button_read" >Lire la suite</a>
    <a href="index.php?controller=article&task=delete&id=<?= $article['id'] ?>" onclick="return window.confirm(`Êtes vous sur de vouloir supprimer cet article ?!`)">Supprimer</a>
        </article>
    </div>
</div>        
    <?php endforeach ?>
</div>



  