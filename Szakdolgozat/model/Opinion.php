<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Opinion
 *
 * @author thees
 */
class Opinion {
    private $ID;
    private $text;
    private $status; 
    private $rating; 
    private $dateTime; 
    private $userID;
    function __construct($ID, $text, $status, $rating, $dateTime, $userID) {
        $this->ID = $ID;
        $this->text = $text;
        $this->status = $status;
        $this->rating = $rating;
        $this->dateTime = $dateTime;
        $this->userID = $userID;
    }    
    
    
    public function getID() {
        return $this->ID;
    }

    public function getText() {
        return $this->text;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getRating() {
        return $this->rating;
    }

    public function getDateTime() {
        return $this->dateTime;
    }

    public function getUserID() {
        return $this->userID;
    }

    public function setText($text) {
        $this->text = $text;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

}
