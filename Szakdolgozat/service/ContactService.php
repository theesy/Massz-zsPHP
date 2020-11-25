<?php
require_once '../model/Contact.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ContactService
 *
 * @author thees
 */
class ContactService {
    private $dbcon;   
    function __construct() {
        $this->dbcon=mysqli_connect("localhost", "root", "", "masszazsoldal");
        
    }

    public function registration($user) {   //ez mi??
    
    }
    

    //listázás, kiíratás
    
    public function updateContact($contact) {
        $c=$contact; 
        $s=new ContactService();
        $query=mysqli_query($s->dbcon, 'CALL update_contact ("'.$c->getAddress().'","'.$c->getPhone().'","'.$c->getFacebook().')');
       //print 'CALL update_contact ("'.$c->getAddress().'","'.$c->getPhone().'","'.$c->getFacebook().')'; //kiírni, teszt
    }
    
    
        public function deleteContact($contact) {
        $c=$contact; 
        $s=new ContactService();
        $query=mysqli_query($s->dbcon, 'CALL delete_contact ('.$c->getID().')');       
    }

        public function readContact($ID){
        $s=new ContactService();
        $query= mysqli_query($s->dbcon, 'CALL read_contact ('.$ID.')');
        $row = mysqli_fetch_assoc($query);
        //print_r ($row);
        $contact=new Contact($ID, $row['address'], $row['phone'], $row['facebook']);
        return $contact;
        
    }
    
    public function createContact($contact){
        $s=new ContactService();
        $c=$contact; 
        $b=$s->dbcon;
        $sql='CALL create_contact ("'.$c->getAddress().'","'.$c->getPhone().'","'.$c->getFacebook().'")';
        file_put_contents("sql.txt", $sql);
        $query=mysqli_query($b,$sql);
        $id=mysqli_query($b,"select max(id) as id from contact");
        $idnumber= mysqli_fetch_assoc($id);
        file_put_contents("sql.txt", $idnumber["id"]);
        $contact=$s->readContact($idnumber["id"]);
        return $contact; 
    }
}
