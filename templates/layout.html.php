<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <title>Nouveau Roman<?= $pageTitle ?></title>
</head>

<body>
    <header id="headerMenu" class="jumbotron">
        
        <div class="container">Un Billet pour l'Alaska</div>
        
    </header>
    <div class="nav-scroller py-1 mb-2">
            <nav class="nav d-flex justify-content-between">
                <a class="p-2 text-muted" href="#">Accueil</a>
            </nav>
        </div>
    <?= $pageContent ?>
</body>

</html>