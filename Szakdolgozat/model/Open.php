<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Open
 *
 * @author thees
 */
class Open {
    private $ID;
    private $day;
    private $from; 
    private $to; 
    private $isHoliday; 
    private $holidayMsg; 
    private $closed;
    function __construct($ID, $day, $from, $to, $isHoliday, $holidayMsg, $closed) {
        $this->ID = $ID;
        $this->day = $day;
        $this->from = $from;
        $this->to = $to;
        $this->isHoliday = $isHoliday;
        $this->holidayMsg = $holidayMsg;
        $this->closed = $closed;
    }    
    
    
    public function getID() {
        return $this->ID;
    }

    public function getDay() {
        return $this->day;
    }

    public function getFrom() {
        return $this->from;
    }

    public function getTo() {
        return $this->to;
    }

    public function getIsHoliday() {
        return $this->isHoliday;
    }

    public function getHolidayMsg() {
        return $this->holidayMsg;
    }

    public function getClosed() {
        return $this->closed;
    }

    public function setDay($day) {
        $this->day = $day;
    }

    public function setFrom($from) {
        $this->from = $from;
    }

    public function setTo($to) {
        $this->to = $to;
    }

    public function setIsHoliday($isHoliday) {
        $this->isHoliday = $isHoliday;
    }

    public function setHolidayMsg($holidayMsg) {
        $this->holidayMsg = $holidayMsg;
    }

    public function setClosed($closed) {
        $this->closed = $closed;
    }
    
}






        