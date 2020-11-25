<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Service
 *
 * @author thees
 */
class Service {
    private $ID;
    private $type;
    private $timeContent; 
    private $price; 
    private $description; 
    
    function __construct($ID, $type, $timeContent, $price, $description) {
        $this->ID = $ID;
        $this->type = $type;
        $this->timeContent = $timeContent;
        $this->price = $price;
        $this->description = $description;
    }
    
    public function getID() {
        return $this->ID;
    }

    public function getType() {
        return $this->type;
    }

    public function getTimeContent() {
        return $this->timeContent;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function setTimeContent($timeContent) {
        $this->timeContent = $timeContent;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    
}
