<?php
  namespace Models;

  class UsersManager extends Model
  {
    // Récupère les données d'un utilisateur
    public function getUser($username)
    {
        $query = $this->pdo->prepare("SELECT id, username, password FROM users WHERE username = ?");
        $query->execute(array($username));
        $user = $query->fetch();

        return $user;
    }

    // Modifie l'utilisateur
    public function updateUser($password, $username, $id)
    {
        
    }
  }
?>
