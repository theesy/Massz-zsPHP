<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Gallery
 *
 * @author thees
 */
class Gallery {
    private $ID;
    private $imageUrl;
    private $status; 
    private $sort;  
    function __construct($ID, $imageUrl, $status, $sort) {
        $this->ID = $ID;
        $this->imageUrl = $imageUrl;
        $this->status = $status;
        $this->sort = $sort;
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

    public function getSort() {
        return $this->sort;
    }
    public function setImageUrl($imageUrl) {
        $this->imageUrl = $imageUrl;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function setSort($sort) {
        $this->sort = $sort;
    }

}
