<?php

namespace blog\Model;

use blog\lib\Model;
require "app/Model/Posts.php";


class PostsAdmin extends Model 
{

  // Renvoie la liste des billets du blog
  public function getPost() 
  {
      $post = [];
      $sql = 'SELECT id, title, chapo, content, DATE_FORMAT(date_create, \'%d/%m/%Y à %Hh%imin%ss\') AS date_create_fr FROM posts ORDER BY date_create DESC';
      $request = $this->executerRequete($sql);
      while ($datas = $request->fetch())
      {
        $post[] = new Posts($datas);
      }
      return $post;
  }
  
  //Renvoie un billet
  public function getPosts($postsId)
  {
    	$sql = 'SELECT id, title, chapo, content, DATE_FORMAT(date_create, \'%d/%m/%Y à %Hh%imin%ss\') AS date_create_fr FROM posts WHERE id=?';
    	$request = $this->executerRequete($sql, array($postsId));
    	if ($request->rowCount() == 1) {
        $posts = new Posts($request->fetch());
        return $posts;  // Accès à la première ligne de résultat
      } else
          throw new \Exception("Aucun posts ne correspond à l'identifiant '$postsId'");
  }

  public function addPosts($title, $chapo, $content)
  {
    	$sql = 'INSERT INTO posts (title, chapo, content, date_create) VALUES (?, ?, ?, ?, NOW())';
    	$this->executerRequete($sql, array($title, $chapo, $content));
  }

  public function updatePosts($title, $chapo, $content, $PostsId)
  {
    	$sql ='UPDATE posts SET title=?, chapo=?, content=?, date_create=NOW() WHERE id=?';
    	$this->executerRequete($sql, array($title, $chapo, $content,$postsId));
  }

  public function removePosts($postsId)
  {
    	$sql = 'DELETE FROM posts WHERE id = ?';
    	$this->executerRequete($sql, array($postsId));
  }

}
