<?php 

namespace blog\Model;

use blog\lib\Model;
use blog\Model\Comment;

class CommentAdmin extends Model
{

// on affiche la liste des commentaires sur les articles avec jointure pour le login user
    public function getComments($posts_id)
    {
        $comments = [];
		$sql = 'SELECT users.login, comments_id, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM users INNER JOIN comments on users.users_id = comments.users_id WHERE posts_id=? AND approuve = 1 ORDER BY comment_date DESC';
		$request = $this->executerRequete($sql, array($posts_id));
        return $request->fetchAll(\PDO::FETCH_CLASS, Comment::class);
    }

// on affiche la liste des commentaires à modérer
    public function getCommentsApprouve()
    {
        $comments = [];
        $sql = 'SELECT users.login, comments_id, posts_id, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM users INNER JOIN comments on users.users_id = comments.users_id WHERE approuve = 0 ORDER BY comment_date DESC';
        $request = $this->executerRequete($sql);
        return $request->fetchAll(\PDO::FETCH_CLASS, Comment::class);
    }

    public function approuveComment($comments_id)
    {
        $sql = 'UPDATE comments SET approuve = 1 WHERE comments_id = ?';
        $this->executerRequete($sql, array($comments_id));
    }

    public function noApprouveComment($comments_id)
    {
        $sql = 'DELETE FROM comments WHERE comments_id = ?';
        $this->executerRequete($sql, array($comments_id));
    }

// Problème pour insérer et intégrer le login de connexion à la place de l'users_id, ajout impossible
    public function addComment($comment, $posts_id, $users_id, $login)
    {
		$sql = 'INSERT INTO comments (comment, comment_date, approuve, posts_id, users_id, SELECT login FROM users) VALUES (?,NOW(),0,?,?,?)';
		$this->executerRequete($sql, array($comment, $posts_id, $users_id, $login));
    }
}

