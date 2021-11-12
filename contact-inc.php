<?php

class Contact {

    public $firstname;
    public $lastname;
    public $email;
    public $object;
    public $message;


    public function __construct($firstname, $lastname, $email, $object, $message)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->object = $object;
        $this->message = $message;

    }
}