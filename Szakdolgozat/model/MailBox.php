<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MailBox
 *
 * @author thees
 */
class MailBox {
    private $ID;
    private $email;
    private $name; 
    private $message; 
    private $subject; 
    private $dateTime;
    /*function __construct($ID, $email, $name, $message, $subject, $dateTime) {
        $this->ID = $ID;
        $this->email = $email;
        $this->name = $name;
        $this->message = $message;
        $this->subject = $subject;
        $this->dateTime = $dateTime;
    }*/
    
    public function getID() {
        return $this->ID;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getName() {
        return $this->name;
    }

    public function getMessage() {
        return $this->message;
    }

    public function getSubject() {
        return $this->subject;
    }

    public function getDateTime() {
        return $this->dateTime;
    }

    //SET nem kell, mert ezeket az adatokat csak elküldjük mailben, nem tárolnánk

}
