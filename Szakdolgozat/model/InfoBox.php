<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of InfoBox
 *
 * @author thees
 */
class InfoBox {
    private $ID;
    private $imageUrl;
    private $status; 
    function __construct($ID, $imageUrl, $status) {
        $this->ID = $ID;
        $this->imageUrl = $imageUrl;
        $this->status = $status;
    }      
    
    public function getID() {
        return $this->ID;
    }

    public function getImageUrl() {
        return $this->imageUrl;
    }

    public function getStatus() {
        return $this->status;
    }
    public function setImageUrl($imageUrl) {
        $this->imageUrl = $imageUrl;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

}
