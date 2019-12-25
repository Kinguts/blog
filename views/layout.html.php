<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/book.css" rel="stylesheet">
    <title>Nouveau Roman<?= $pageTitle ?></title>
    <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
    <script>
     tinymce.init({
    selector: '#mytextarea'
    });</script>
</head>

<body>
  <div id="bloc_page">
    <div id="main">         

      <header>
        <div>
          <nav class="navbar navbar-inverse navbar-fixed-top" id="navigation">
            <p>Billet simple pour l'Alaska</p>
            <a class="link1" href="index.php"><i class="fas fa-home"></i></a>
            <?php if ( !empty($_SESSION) ) : ?>
            <a class="link2" href="index.php?controller=admin">Administration<a>
            <?php endif; ?>
          </nav>
        </div>
      </header>      
      <img id="alaska" src="/images/alask3.jpg" alt="alaska" style="width= 100%;">
      <div class="intro">
        <div class="container">         
        </div>
      </div>           
    </div>            
    <section>
      <?= $pageContent ?>
    </section>

    <footer>
    <p>
      2019
      <a href>Jean Forteroche</a>
      -
      <a href="index.php">Mentions légales</a>
       -<?php if ( !empty($_SESSION) ) : ?>
        <span><i class="fas fa-user"></i><strong> Bonjour <?php echo($_SESSION['username']); ?></strong></span>
        <a href="index.php?controller=admin&task=disconnect">Deconnexion</a>
        <?php else : ?>
          <a href="index.php?controller=admin">Connexion</a>
        <?php endif; ?>
        </p>
    </footer>
  </div>
</body>
</html>