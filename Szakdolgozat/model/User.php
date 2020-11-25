<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author thees
 */
class User {
    private $ID;
    private $email;
    private $password; 
    private $firstName; 
    private $lastName; 
    private $phone; 
    private $userName; 
    private $confirmUrl; 
    private $createdDate; 
    private $modifiedDate; 
    function __construct($ID, $email, $password, $firstName, $lastName, $phone, $userName, $confirmUrl) {
        $this->ID = $ID;
        $this->email = $email;
        $this->password = $password;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->phone = $phone;
        $this->userName = $userName;
        $this->confirmUrl = $confirmUrl;
        $this->createdDate = 1;
        $this->modifiedDate = 1;
    }

    
    public function getID() {
        return $this->ID;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function getUserName() {
        return $this->userName;
    }

    public function getConfirmUrl() {
        return $this->confirmUrl;
    }

    public function getCreatedDate() {
        return $this->createdDate;
    }

    public function getModifiedDate() {
        return $this->modifiedDate;
    }
    
    public function setEmail($email) {
        $this->email = $email;
    }

    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    public function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
    }

    public function setConfirmUrl($confirmUrl) {
        $this->confirmUrl = $confirmUrl;
    }



}


