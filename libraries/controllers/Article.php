<?php

namespace Controllers;

class Article extends Controller
{
  protected $modelName = \Models\Article::class;

  public function index()
  {
    /**
     * 2. Récupération des articles
     */
    $articles = $this->model->getArticlesList();
    /**
     * 3. Affichage
     */
    $pageTitle = "Accueil";

    \Renderer::render('articles/index', compact('pageTitle', 'articles'));
  }

  public function show()
  {
    $commentModel = new \Models\Comment();
    /**
     * 1. Récupération du param "id" et vérification de celui-ci
     */
    // On part du principe qu'on ne possède pas de param "id"
    $article_id = null;

    // Mais si il y'en a un et que c'est un nombre entier, alors c'est cool
    if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
      $article_id = $_GET['id'];
    }

    // On peut désormais décider : erreur ou pas ?!
    if (!$article_id) {
      die("Vous devez préciser un paramètre `id` dans l'URL !");
    }

    /**
     * 3. Récupération de l'article en question
     * On va ici utiliser une requête préparée car elle inclue une variable qui provient de l'utilisateur : Ne faites
     * jamais confiance à l'utilisateur ! :D
     */
    $article =$this->model->getArticle($article_id);

    /**
     * 4. Récupération des commentaires de l'article en question
     * Pareil, toujours une requête préparée pour sécuriser la donnée filée par l'utilisateur (cet enfoiré en puissance !)
     */
    $commentaires = $commentModel->findAllWithArticle($article_id);

    /**
     * 5. On affiche 
     */
    $pageTitle = $article['title'];

    \Renderer::render('articles/viewshow' , compact('pageTitle', 'article', 'commentaires', 'article_id'));

    // compact('pageTitle', 'article') 
    // ['pageTitle' => $pageTitle, 'article' => $article] ..... les 2 reviennent au même la fonction compact permet de réduire le code
  }
  // Récupère la liste des titres des articles
  public function getArticlesList()
  {
    $query = $this->pdo->prepare("SELECT id, title FROM articles");
    $query->execute(array($articlesList->id(), $articlesList->title()));
    $articlesList = $query->fetch();
 
    return $articlesList;
  }     
}