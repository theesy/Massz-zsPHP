<?php
require_once '../model/Open.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of OpenService
 *
 * @author thees
 */
class OpenService {
    private $dbcon;   
    function __construct() {
        $this->dbcon=mysqli_connect("localhost", "root", "", "masszazsoldal");
        
    }

    public function registration($user) {
    
    }

    //listázás, kiíratás
    
    public function updateOpen($open) {
        $o=$open; 
        $s=new OpenService();
        $query=mysqli_query($s->dbcon, 'CALL update_open ("'.$o->getDay().'","'.$o->getFrom().'","'.$o->getTo().'","'.$o->getIsHoliday().'",'.$o->getHolidayMsg().'",'.$o->getClosed().')');
      print 'CALL update_open ("'.$o->getDay().'","'.$o->getFrom().'","'.$o->getTo().'","'.$o->getIsHoliday().'",'.$o->getHolidayMsg().'",'.$o->getClosed().')';
        //teszt kiírás
    }
    
        public function deleteOpen($open) {
        $o=$open; 
        $s=new OpenService();
        $query=mysqli_query($s->dbcon, 'CALL delete_open ('.$o->getID().')');       
    }

        public function readOpen($ID){
        $s=new OpenService();
        $query= mysqli_query($s->dbcon, 'CALL read_open ('.$ID.')');
        $row = mysqli_fetch_assoc($query);
        //print_r ($row);
        $open=new Open($ID, $row['day'], $row['from'], $row['to'], $row['isholiday'], $row['holidaymsg'], $row['closed']);
        return $open;
        
    }
    
    public function createOpen($open){
        $s=new OpenService();
        $o=$open; 
        $b=$s->dbcon;
        $sql='CALL create_open ("'.$o->getDay().'","'.$o->getFrom().'","'.$o->getTo().'","'.$o->getIsHoliday().'","'.$o->getHolidayMsg().'","'.$o->getClosed().'")';
        file_put_contents("sql.txt", $sql);
        $query=mysqli_query($b,$sql);
        $id=mysqli_query($b,"select max(id) as id from open");
        $idnumber= mysqli_fetch_assoc($id);
        file_put_contents("sql.txt", $idnumber["id"]);
        $open=$s->readOpen($idnumber["id"]);
        return $open; 
    }
}

