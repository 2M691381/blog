<?php 

namespace blog\Model;

class Comment
{
	private $comments_id;
	private $comment;
	private $comment_date_fr;
	private $approuve;
	private $posts_id;
    private $users_id;
    private $login;

    public function getComments_id()
    {
    	return $this->comments_id;
    }

    public function setComments_id($comments_id)
    {
    	$this->comments_id = $comments_id;
    }

    public function getComment()
    {
    	return $this->comment;
    }

    public function setComment($comment)
    {
    	$this->comment = $comment;
    }

    public function getComment_date_fr()
    {
        return $this->comment_date_fr;
    }

    public function setComment_date_fr($comment_date_fr)
    {
        $this->comment_date_fr = $comment_date_fr;
    }

    public function getApprouve()
    {
        return $this->approuve;
    }

    public function setApprouve($approuve)
    {
        $this->approuve = $approuve;
    }

    public function getPosts_id()
    {
    	return $this->posts_id;
    }

    public function setPosts_id($posts_id)
    {
    	$this->posts_id = $posts_id;
    }

    public function getUsers_id()
    {
        return $this->users_id;
    }

    public function setUsers_id($users_id)
    {
        $this->users_id = $users_id;
    }

     public function getLogin()
    {
        return $this->login;
    }

    public function setLogin($login)
    {
        $this->login = $login;
    }
}    