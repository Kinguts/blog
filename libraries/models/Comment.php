<?php

namespace Models;

class Comment extends Model
{
    protected $table ="comments";
    /**
     * Retourne la liste des commentaires d'un article donné
     * 
     * @param integer $article_id
     * @return array
     */
    public function findAllWithArticle(int $article_id) : array 
    {
        $query = $this->pdo->prepare("SELECT id, author, article_id, content, DATE_FORMAT(dateCom, '%d/%m/%Y à %Hh%imin%ss') AS dateCom_fr, report FROM comments WHERE article_id = :article_id AND report = 0 ORDER BY DateCom DESC");
        $query->execute(['article_id' => $article_id]);
        $commentaires = $query->fetchAll();

        return $commentaires;

    }

    /**
     * Insère un commentaire dans la base de données
     * 
     * @param string $author
     * @param string $content
     * @param integer $article_id
     * @return void
     */
    public function insert(string $author, string $content, int $article_id, int $report) : void 
    {
        $query = $this->pdo->prepare('INSERT INTO comments SET author = :author, content = :content, article_id = :article_id, report = :report, dateCom = NOW()');
        $query->execute(compact('author', 'content', 'article_id', 'report'));
    }

    public function update(int $article_id, string $author, string $content, int $report, int $id)
    {
        $query = $this->pdo->prepare("UPDATE comments SET article_id = :article_id, author = :author, content = :content, report = :report WHERE id = :id");
        $newComment = $query->execute(compact('article_id', 'author', 'content',  'report', 'id'));

      return $newComment;
    }

    // Récupère les commentaires d'un article
    public function getComments($commentaires)
    {
      $query = $this->pdo->prepare("SELECT id, article_id, author, content, DATE_FORMAT(dateCom, '%d/%m/%Y à %Hh%imin%ss') AS dateCom_fr, report FROM comments WHERE articleId = ? ORDER BY dateCom DESC");
      $query->execute(array($commentaires['articleId'], $commentaires['author'], $commentaires['content']));

      return $query;
    }

    // Récupère les commentaires signalés
    public function getAllReport()
    {
      $query = $this->pdo->prepare("SELECT id, article_id, author, content, DATE_FORMAT(dateCom, '%d/%m/%Y à %Hh%imin%ss') AS dateCom_fr, report FROM comments WHERE report = 1");
      $query->execute();

      return $query;
    }
}