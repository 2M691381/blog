<?php 

namespace blog\Model;

class Post
{
	private $posts_id;
	private $title;
	private $chapo;
	private $content; 
    private $created_date_fr;
    private $updated_date_fr;
    private $users_id;
    private $login;

	public function __construct(array $datas)
	{
      $this->hydrate($datas);
	}
    
    public function hydrate(array $datas)
    {
	  foreach ($datas as $key => $value)
	  {
	    // On récupère le nom du setter correspondant à l'attribut.
	    $method = 'set'.ucfirst($key);
	        
	    // Si le setter correspondant existe.
	    if (method_exists($this, $method))
	    {
	      // On appelle le setter.
	      $this->$method($value);
	    }
      }
    }

    public function getPosts_id()
    {
    	return $this->posts_id;
    }

    public function setPosts_id($posts_id)
    {
    	$this->posts_id = $posts_id;
    }

    public function getTitle()
    {
    	return $this->title; 
    }

    public function setTitle($title)
    {
    	$this->title = $title;
    }

    public function getChapo()
    {
    	return $this->chapo; 
    }

    public function setChapo($chapo)
    {
    	$this->chapo = $chapo;
    }

    public function getContent()
    {
    	return $this->content; 
    }

    public function setContent($content)
    {
    	$this->content = $content;
    }

    public function getCreated_date_fr()
    {
    	return $this->created_date_fr;
    }

    public function setCreated_date_fr($created_date_fr)
    {
    	$this->created_date_fr = $created_date_fr;
    }

    public function getUpdated_date_fr()
    {
    	return $this->updated_date_fr;
    }

    public function setUpdated_date_fr($updated_date_fr)
    {
    	$this->updated_date_fr = $updated_date_fr;
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

