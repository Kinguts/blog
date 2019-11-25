<?php

namespace Controllers;
use \Models\UsersManager;
use \Models\Article;
use \Models\Comment;

class Admin extends Controller
{
  protected $table = "articles";
  protected $modelName = \Models\Admin::class;

  public function __construct()
  {
    $this->users = new UsersManager;
    $this->articles = new Article;
    $this->comments = new Comment;
  }

  public function index()
  {
    if (empty($_SESSION)) {
      // Redirige vers la page d'administration login
      \Http::redirect("index.php?controller=admin&task=login");
      }
      else {
          // Sinon redirige vers la page accueil d'administration
          \Http::redirect("index.php?controller=admin&task=homeAdmin");
      }
  }

  // Affichage la page accueil d'administration
  public function homeAdmin($message=null) 
  {       
    if (isset($_SESSION['id'])) {
        
    $pageTitle = "Admin";
    $articlesList = $this->articles->getArticlesList();
    $commentsList = $this->comments->getAllReport();
    \Renderer::render('admin/index', array('articlesList' => $articlesList, 'message' => $message, 'commentsList' => $commentsList));
    }
    else {
      throw new \Exception("Vous n'êtes pas connecté");
    }     
  }

  // Affichage la page d'administration login
  public function loginPage() 
  {
    $pageTitle = "Login Admin";
    \Renderer::render('admin/login', array('errorLogin' => ''));
  }

  // Vérification de l'utilisateur et du mot de passe
  public function login()
  {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    // Récupère un utilisateur
    $user = $this->users->getUser($username);

    // Vérifie que le mot de passe correspond
    $checkPassword = password_verify($password, $user['password']);
        
    // Si le mot de passe est bon
    if ($checkPassword) {
      $_SESSION['id'] = $user['id'];
      $_SESSION['username'] = $username;

      // Redirige vers la vue accueil administration
      \Http::redirect("index.php?controller=admin&task=homeAdmin");
    }
    // Sinon affiche un message d'erreur
    else {
      if (!$user) {
        $errorLogin = "Utilisateur introuvable";
    }
    else {
      $errorLogin = "Votre mot de passe est incorrect";
    }
    \Renderer::render('admin/login', array('errorLogin' => $errorLogin));
    }
  }

  // Destruction de la session a la deconnexion
  public function disconnect()
  {
    $_SESSION = array();
    session_destroy();
    \Http::redirect("index.php?controller=admin&task=login");
  }

  // Ajoute un article
  public function addArticle()
  {
    if (isset($_SESSION['id'])) {
      // Récupère les paramètres
      $title = $_POST['title'];
      $introduction = $_POST['introduction'];
      $content = $_POST['txtContent'];
      // Ajoute l'article
      $newArticle = array('title' => $title, 'introduction' => $introduction, 'content' => $content);
      $this->articles->addArticle($newArticle);
      // Retour à l'accueil de l'administration      
      $message=('Votre article '.$title.' a bien été ajouté');
      $this->homeAdmin($message);               
    }
    else {
      throw new \Exception("Vous n'êtes pas connecté");
    }
  }

  // FOnction pour afficher la page d'ajout d'article
  public function showAddArticle()
  {
    if (isset($_SESSION['id'])) {
      // Récupère la liste des titres des chapitres
      $articlesList = $this->articles->getArticlesList();
      \Renderer::render('admin/viewAddArticle', array('articlesList' => $articlesList));
    }
    else {
      throw new \Exception("Vous n'êtes pas connecté");
    }
  }

  // Modifie un article
  public function updateArticle()
  {
    if (isset($_SESSION['id'])) {
      // Récupère les paramètres
      $title = $_POST['title'];
      $introduction = $_POST['introduction'];
      $content = $_POST['txtContent'];
      $id = $_POST['idArticle'];
      // Ajoute l'article
      $updateArticle = array('title' => $title, 'introduction' => $introduction, 'content' => $content, 'id' => $id);
      $this->articles->updateArticle($updateArticle);
      // Retour à l'accueil de l'administration
      $message=('Votre article '.$title.' a bien été modifié');
      $this->homeAdmin($message);
    }
    else {
      throw new \Exception("Vous n'êtes pas connecté");
    }
  }

  // Affichage de l'article à modifier
  public function showUpdateArticle()
  {
    if (isset($_SESSION['id'])) {
      $articleId = intval($_GET['id']);
      if ($articleId != 0) {
        // Récupère l'article
        $article = $this->articles->find($articleId);
        // Récupère la liste des titres des chapitres
        $articlesList = $this->articles->getArticlesList();
        $commentsList = $this->comments->findAllWithArticle($articleId);
        \Renderer::render('admin/update', array('article' => $article, 'articlesList' => $articlesList, 'commentsList' => $commentsList));
      }
      else {
        throw new \Exception("Identifiant de l'article non valide");
      }
    }
    else {
      throw new \Exception("Vous n'êtes pas connecté");
    }
  }

  public function delete()
  {
    /**
     * 1. On vérifie que le GET possède bien un paramètre "id" (delete.php?id=202) et que c'est bien un nombre
     */
    if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
      die("Ho ?! Tu n'as pas précisé l'id de l'article !");
    }

    $id = $_GET['id'];

    /**
     * 3. Vérification que l'article existe bel et bien
     */
    $article = $this->articles->getArticle($id);
    if (!$article) {
      die("L'article $id n'existe pas, vous ne pouvez donc pas le supprimer !");
    }

    /**
     * 4. Réelle suppression de l'article
     */
    $this->articles->delete($id);

    /**
     * 5. Redirection vers la page d'accueil
     */

    \Http::redirect("index.php");
  }

}