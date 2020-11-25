<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Booking
 *
 * @author thees
 */
class Booking {
    private $ID;
    private $dateTime;
    private $timeStart; 
    private $timeEnd; 
    private $userID; 
    private $serviceID; 
    private $adminNote; 
    function __construct($ID, $dateTime, $timeStart, $timeEnd, $userID, $serviceID, $adminNote) {
        $this->ID = $ID;
        $this->dateTime = $dateTime;
        $this->timeStart = $timeStart;
        $this->timeEnd = $timeEnd;
        $this->userID = $userID;
        $this->serviceID = $serviceID;
        $this->adminNote = $adminNote;
    }
    
    
    public function getID() {
        return $this->ID;
    }

    public function getDateTime() {
        return $this->dateTime;
    }

    public function getTimeStart() {
        return $this->timeStart;
    }

    public function getTimeEnd() {
        return $this->timeEnd;
    }

    public function getUserID() {
        return $this->userID;
    }

    public function getServiceID() {
        return $this->serviceID;
    }

    public function getAdminNote() {
        return $this->adminNote;
    }
    
    public function setDateTime($dateTime) {
        $this->dateTime = $dateTime;
    }
        
    public function setTimeStart($timeStart){
        $this->timeStart = $timeStart;
    }
    
    public function setTimeEnd($timeEnd) {
        $this->timeEnd = $timeEnd;
    }
        
    public function setAdminNote($adminNote) {
        $this->adminNote = $adminNote;
    }
    
}
