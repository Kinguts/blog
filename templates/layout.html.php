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
    <title>Nouveau Roman<?= $pageTitle ?></title>
</head>

<body>
<div>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <p>Billet simple pour l'Alaska</p>
                <a class="link1" href="index.php"><i class="fas fa-home"></i></a>
                <a class="btn btn-light link2" href="connect.php"><i class="fas fa-user"></i><strong> Connexion</strong></a>
                <a class="btn btn-light link3" href="form.php"><i class="fas fa-pencil-alt"></i><strong> Inscription</strong></a>
            </nav>
</div>           

    <header>
        <img src="/images/alask1.jpg" alt="alaska">
        <div class="intro">
            <div class="container">
          
            </div>
        </div>
    </header>        
    
    <?= $pageContent ?>

    <footer>
        <P>
            2019
            <a href>Steeve Saint-Martin<a>
                -
                <a href="index.php">Mentions légales<a>
                    -
                    <a href="connect.php">Connexion<a>
</p>
</footer>
</body>

</html>