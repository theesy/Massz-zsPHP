<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserActionLog
 *
 * @author thees
 */
class UserActionLog {
    private $ID;
    private $userID;
    private $URL; 
    private $action;  
    private $time;  
    
    public function getID() {
        return $this->ID;
    }

    public function getUserID() {
        return $this->userID;
    }

    public function getURL() {
        return $this->URL;
    }

    public function getAction() {
        return $this->action;
    }

    public function getTime() {
        return $this->time;
    }


    
}
