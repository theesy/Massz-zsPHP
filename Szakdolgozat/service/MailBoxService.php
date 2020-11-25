<?php
require_once '../model/MailBox.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MailBoxService
 *
 * @author thees
 */
class MailBoxService {
    private $dbcon;   
    function __construct() {
        $this->dbcon=mysqli_connect("localhost", "root", "", "masszazsoldal");
        
    }

    public function registration($user) {
    
    }
    
    //listázás, kiíratás

    public function updateMailBox($mailbox) {
        $m=$mailbox; 
        $s=new MailBoxService();
        $query=mysqli_query($s->dbcon, 'CALL update_mailbox ("'.$m->getEmail().'","'.$m->getName().'","'.$m->getMessage().'","'.$m->getSubject().')');
        //print 'CALL update_mailbox ("'.$m->getEmail().'","'.$m->getName().'","'.$m->getMessage().'","'.$m->getSubject().')');
        //teszt kiírás
    }
    
        public function deleteMailBox($mailbox) {
        $m=$mailbox; 
        $s=new MailBoxService();
        $query=mysqli_query($s->dbcon, 'CALL delete_mailbox ('.$m->getID().')');       
    }

        public function readMailBox($ID){
        $s=new MailBoxService();
        $query= mysqli_query($s->dbcon, 'CALL read_mailbox ('.$ID.')');
        $row = mysqli_fetch_assoc($query);
        //print_r ($row);
        $mailbox=new MailBox($ID, $row['email'], $row['name'], $row['message'], $row['subject'], $row['datetime']);
        return $mailbox;
        
    }
    
    public function createMailBox($mailbox){
        $s=new MailBoxService();
        $m=$mailbox; 
        $b=$s->dbcon;
        $sql='CALL create_mailbox ("'.$m->getEmail().'","'.$m->getName().'","'.$m->getMessage().'","'.$m->getSubject().'","'.$m->getDateTime().'")';
        file_put_contents("sql.txt", $sql);
        $query=mysqli_query($b,$sql);
        $id=mysqli_query($b,"select max(id) as id from mailbox");
        $idnumber= mysqli_fetch_assoc($id);
        file_put_contents("sql.txt", $idnumber["id"]);
        $mailbox=$s->readMailBox($idnumber["id"]);
        return $mailbox; 
    }

}


