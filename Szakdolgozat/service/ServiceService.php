<?php
require_once '../model/Service.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ServiceService
 *
 * @author thees
 */
class ServiceService {
    private $dbcon;   
    function __construct() {
        $this->dbcon=mysqli_connect("localhost", "root", "", "masszazsoldal");
        
    }

    public function registration($user) {
    
    }

    //listázás, kiíratás
    
    public function updateService($service) {
        $c=$service; 
        $s=new ServiceService();
        $query=mysqli_query($s->dbcon, 'CALL update_service ("'.$c->getType().'","'.$c->getTimeContent().'","'.$c->getPrice().'","'.$c->getDescription().')');
        //print 'CALL update_service ("'.$c->getType().'","'.$c->getTimeContent().'","'.$c->getPrice().'","'.$c->getDescription().')';
        //teszt kiírás
    }
    
        public function deleteService($service) {
        $x=$service; 
        $s=new ServiceService();
        $query=mysqli_query($s->dbcon, 'CALL delete_service ('.$x->getID().')');       
    }

        public function readService($ID){
        $s=new ServiceService();
        $query= mysqli_query($s->dbcon, 'CALL read_service ('.$ID.')');
        $row = mysqli_fetch_assoc($query);
        //print_r ($row);
        $service=new Service($ID, $row['type'], $row['timecontent'], $row['price'], $row['description']);
        return $service;
        
    }
    
    public function createService($service){
        $s=new ServiceService();
        $x=$service; 
        $b=$s->dbcon;
        $sql='CALL create_service ("'.$x->getType().'","'.$x->getTimeContent().'","'.$x->getPrice().'","'.$x->getDescription().'")';
        file_put_contents("sql.txt", $sql);
        $query=mysqli_query($b,$sql);
        $id=mysqli_query($b,"select max(id) as id from service");
        $idnumber= mysqli_fetch_assoc($id);
        file_put_contents("sql.txt", $idnumber["id"]);
        $service=$s->readService($idnumber["id"]);
        return $service; 
    }
}



