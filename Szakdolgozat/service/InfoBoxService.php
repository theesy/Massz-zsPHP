<?php
require_once '../model/InfoBox.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of InfoBoxService
 *
 * @author thees
 */
class InfoBoxService {
    private $dbcon;   
    function __construct() {
        $this->dbcon=mysqli_connect("localhost", "root", "", "masszazsoldal");
        
    }

    public function registration($user) {
    
    }

 //listázás, kiíratás
    
    public function updateInfoBox($infobox) {
        $i=$infobox; 
        $s=new InfoBoxService();
        $query=mysqli_query($s->dbcon, 'CALL update_infobox ("'.$i->getImageUrl().'","'.$i->getStatus().')');
        //print 'CALL update_infobox ("'.$i->getImageUrl().'","'.$i->getStatus().')';
        //teszt kiírás
    }
    
        public function deleteInfoBox($infobox) {
        $i=$infobox; 
        $s=new InfoBoxService();
        $query=mysqli_query($s->dbcon, 'CALL delete_infobox ('.$i->getID().')');       
    }
    public function readInfoBox($ID){
        $s=new InfoBoxService();
        $query= mysqli_query($s->dbcon, 'CALL read_infobox ('.$ID.')');
        $row = mysqli_fetch_assoc($query);
        //print_r ($row);
        $infobox=new InfoBox($ID, $row['imageurl'], $row['status']);
        return $infobox;
        
    }
    
    public function createInfoBox($infobox){
        $s=new InfoBoxService();
        $i=$infobox; 
        $b=$s->dbcon;
        $sql='CALL create_infobox ("'.$i->getImageUrl().'","'.$i->getStatus().'")';
        file_put_contents("sql.txt", $sql);
        $query=mysqli_query($b,$sql);
        $id=mysqli_query($b,"select max(id) as id from infobox");
        $idnumber= mysqli_fetch_assoc($id);
        file_put_contents("sql.txt", $idnumber["id"]);
        $infobox=$s->readInfoBox($idnumber["id"]);
        return $infobox; 
    }    
}

