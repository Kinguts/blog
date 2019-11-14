<?php
session_start();

$pdo = new PDO('mysql:host=localhost;dbname=blogpoo;charset=utf8', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);


if(isset($_POST['formconnexion'])) {
   $pseudoconnect = htmlspecialchars($_POST['pseudoconnect']);
   $mdpconnect = sha1($_POST['mdpconnect']);
   if(!empty($pseudoconnect) AND !empty($mdpconnect)) {
      $requser = $pdo->prepare("SELECT * FROM membres WHERE pseudo = ? AND motdepasse = ?");
      $requser->execute(array($pseudoconnect, $mdpconnect));
      $userexist = $requser->rowCount();
      if($userexist == 1) {
         $userinfo = $requser->fetch();
         $_SESSION['id'] = $userinfo['id'];
         $_SESSION['pseudo'] = $userinfo['pseudo'];
         $_SESSION['mail'] = $userinfo['mail'];
         header("Location: index.php?id=".$_SESSION['id']);
      } else {
         $erreur = "Mauvais pseudo ou mot de passe !";
      }
   } else {
      $erreur = "Tous les champs doivent être complétés !";
   }
}

//if (isset($_SESSION['pseudo'])) {
//  echo "Bonjour ".$_SESSION['pseudo'];
 //}
?>
<html>
   <head>
      <title>TUTO PHP</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <link href="/css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
      <link href="/css/style.css" rel="stylesheet">
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
        <img src="/images/alask2.jpg" alt="alaska">
      
            <div class="container">
                
            </div>
       
    </header>

      <div align="center">
         <h2>Connexion</h2>
         <br /><br />
         <form method="POST" action="">
            <input type="text" name="pseudoconnect" placeholder="Pseudo" />
            <input type="password" name="mdpconnect" placeholder="Mot de passe" />
            <br /><br />
            <input type="submit" name="formconnexion" value="Se connecter !" />
         </form>
         <?php
         if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
         }
         ?>
      </div>
      
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