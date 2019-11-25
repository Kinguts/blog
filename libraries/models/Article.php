<?php

namespace Models;

class Article extends Model
{
   
    protected $table = "articles";

    public function getArticle(int $id)
    {
        $query = $this->pdo->prepare("SELECT id, title, introduction, content, DATE_FORMAT(dateArt, '%d/%m/%Y à %Hh%imin%ss') AS dateArt_fr  FROM articles WHERE id = :id ORDER BY dateArt DESC");
        $query->execute(['id' => $id]);
        $item = $query->fetch(); 
        return $item;
    } 

    public function getArticlesList()
    {
        $query = $this->pdo->prepare("SELECT id, title, introduction, content, DATE_FORMAT(dateArt, '%d/%m/%Y à %Hh%imin%ss') AS dateArt_fr FROM articles ORDER BY DateArt DESC");
        $query->execute();
        $articles = $query->fetchAll();

        return $articles;
    }
    
    public function addArticle($articles)
    {
        $query = $this->pdo->prepare("INSERT INTO articles(title, introduction, content, dateArt) VALUES(?,?,?,NOW())");
        $query->execute(array($articles['title'], $articles['introduction'], $articles['content']));

        return $query;
    }
    
    // Modifie un article
    public function updateArticle($articles)
    {
        $query = $this->pdo->prepare("UPDATE articles SET title = ?, introduction = ?, content = ? WHERE id = ?");
        $query->execute(array($articles['title'], $articles['introduction'], $articles['content'], $articles['id']));

        return $query;
    }
}
