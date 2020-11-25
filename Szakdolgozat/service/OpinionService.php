<?php
require_once '../model/Opinion.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of OpinionService
 *
 * @author thees
 */
class OpinionService {
    private $dbcon;   
    function __construct() {
        $this->dbcon=mysqli_connect("localhost", "root", "", "masszazsoldal");
        
    }

    public function registration($user) {
    
    }

    //listázás, kiíratás
    
    public function updateOpinion($opinion) {
        $o=$opinion; 
        $s=new OpinionService();
        $query=mysqli_query($s->dbcon, 'CALL update_opinion ("'.$o->getText().'","'.$o->getStatus().'","'.$o->getRating().'","'.$o->getDateTime().'","'.$o->getUserID().'",'.$o->getID().')');
       // print 'CALL update_opinion ("'.$o->getText().'","'.$o->getStatus().'","'.$o->getRating().'","'.$o->getDateTime().'","'.$o->getUserID().'",'.$o->getID().')';
    }
    
        public function deleteOpinion($opinion) {
        $o=$opinion; 
        $s=new OpinionService();
        $query=mysqli_query($s->dbcon, 'CALL delete_opinion ('.$o->getID().')');       
    }

    /*******/
   public function listing ($page) {
        $from=$page*30-30;
        $s=new OpinionService();
        $query=mysqli_query($s->dbcon, "CALL get_all_active_opinion ($from)");
        $table= array(); 
        while ($row = mysqli_fetch_assoc($query)) {
        $table[]=$row;
            }
        return $table;
    }
    
    public function readOpinion($ID){
        $s=new OpinionService();
        $query= mysqli_query($s->dbcon, 'CALL read_opinion ('.$ID.')');
        $row = mysqli_fetch_assoc($query);
        //print_r ($row);
        $opinion=new Opinion($ID, $row['text'], $row['status'], $row['rating'], $row['datetime'], $row['userid']);
        return $opinion;
        
    }
    
    public function createOpinion($opinion){
        $s=new OpinionService();
        $o=$opinion; 
        $b=$s->dbcon;
        $sql='CALL create_opinion ("'.$o->getText().'","'.$o->getStatus().'","'.$o->getRating().'","'.$o->getDateTime().'","'.$o->getUserID().'")';
        file_put_contents("sql.txt", $sql);
        $query=mysqli_query($b,$sql);
        $id=mysqli_query($b,"select max(id) as id from opinion");
        $idnumber= mysqli_fetch_assoc($id);
        file_put_contents("sql.txt", $idnumber["id"]);
        $opinion=$s->readOpinion($idnumber["id"]);
        return $opinion; 
    }
    
}

