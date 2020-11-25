<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Contact
 *
 * @author thees
 */
class Contact {
    private $ID;
    private $address;
    private $phone; 
    private $facebook; 
    function __construct($ID, $address, $phone, $facebook) {
        $this->ID = $ID;
        $this->address = $address;
        $this->phone = $phone;
        $this->facebook = $facebook;
    }
    
    
    public function getID() {
        return $this->ID;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function getFacebook() {
        return $this->facebook;
    }

    public function setAddress($address) {
        $this->address = $adress;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
    }

    public function setFacebook($facebook) {
        $this->facebook = $facebook;
    }
    
    
}
