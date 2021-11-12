<?php

namespace blog\Model;

use blog\lib\Model;
use blog\Model\Post;

class PostAdmin extends Model
{

  // affiche la liste des articles du blog
  public function getPosts()
  {
      $posts = [];
      $sql = 'SELECT posts_id, title, chapo, content, DATE_FORMAT(updated_date, \'%d/%m/%Y à %Hh%imin%ss\') AS updated_date_fr FROM posts ORDER BY updated_date DESC';
      $request = $this->executerRequete($sql);
      while ($datas = $request->fetch())
      {
        $posts[] = new Post($datas);
      }
      return $posts;
  }
  
  //Affiche un article au complet avec jointure pour afficher le nom du membre ayant commenté et non son id
  public function getPost($posts_id)
  {
    	$sql = 'SELECT users.login, posts_id, title, chapo, content, DATE_FORMAT(created_date, \'%d/%m/%Y à %Hh%imin%ss\') AS created_date_fr, DATE_FORMAT(updated_date, \'%d/%m/%Y à %Hh%imin%ss\') AS updated_date_fr FROM users INNER JOIN posts on users.users_id = posts.users_id WHERE posts_id=?';
    	$request = $this->executerRequete($sql, array($posts_id));
    	if ($request->rowCount() == 1) {
        $post = new Post($request->fetch());
        return $post;  // Accès à la première ligne de résultat
      } else
          throw new \Exception("Aucun article ne correspond à l'identifiant '$posts_id'");
  }

// valeur par defaut de users_id à 1 = admin
  public function addPost($title, $chapo, $content, $users_id)
  {
    	$sql = 'INSERT INTO posts (title, chapo, content, users_id, created_date, updated_date) VALUES (?, ?, ?, 1, NOW(), NOW())';
    	$this->executerRequete($sql, array($title, $chapo, $content));
  }

// user_id ne fonctionne pas avec le login, modif impossible
  public function updatePost($title, $chapo, $content, $users_id, $posts_id)
  {
    	$sql ='UPDATE posts SET title=?, chapo=?, content=?, users_id=?, updated_date=NOW() WHERE posts_id=?';
    	$this->executerRequete($sql, array($title, $chapo, $content, $users_id, $posts_id));
  }

  public function removePost($posts_id)
  {
    	$sql = 'DELETE FROM posts WHERE posts_id = ?';
    	$this->executerRequete($sql, array($posts_id));
  }

}
