<?php

namespace blog\Controller;

use blog\lib\View;


class ControllerContact{

    public $name;
    public $firstname;
    public $email;
    public $message;


    public $webmaster = 'contact@mickaelgrole.fr';
    
    public function verif_null($var)
    { 
        if($var!="" and !empty($var)){
          return trim($var);
        }
        return null;
    }

    public function verif_email($var) 
    {
        $code_syntaxe='#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,5}$#';   
        if(preg_match($code_syntaxe,$var)){ 
          return $var;
        }
        return null;   
    }

    
    function envoi_email(){ //fonction qui envoie le mail
       
       $contenu_message = "Nom : ".$this->name."\nPrénom : ".$this->firstname."\nEmail : ".$this->email."\nMessage : ".$this->message;
	     $entete = "From: ".$this->name." <".$this->email."> \nContent-Type: text/html; charset=iso-8859-1";	 
       email($this->webmaster,$this->$contenu_message,$entete);
	
	  }
    
    public function loadForm($data){
        extract($data);
        $this->name      = trim(htmlentities($name, ENT_QUOTES));
        $this->firstname      = trim(htmlentities($firstname, ENT_QUOTES));
        $this->email     = $this->verif_email($email);
        $this->message  = trim(htmlentities($message, ENT_QUOTES));
        $test = $this->testForm();
        if(!empty($test)){
           $this->envoi_email();
        };
    } 
    
    public function testForm(){
       if($this->verif_null($this->name) and $this->verif_null($this->firstname) and $this->verif_null($this->email) and $this->verif_null($this->message)){
          if($this->verif_mail($this->email)){
              return 1;
          }
          return null; 
       }
       return null; 
    }

}

?>
