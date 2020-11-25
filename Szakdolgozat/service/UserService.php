<?php
require_once '../model/User.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserService
 *
 * @author thees
 */
class UserService {
    private $dbcon;   
    function __construct() {
        $this->dbcon=mysqli_connect("localhost", "root", "", "masszazsoldal");  //megadjuk fixnek a értéket, nem módosulhat
        
    }

    public function listing ($page) {
        $from=$page*30-30;
        $s=new UserService();
        $query=mysqli_query($s->dbcon, "CALL list_user_username_30_asc ($from)");
        $table= array(); 
        while ($row = mysqli_fetch_assoc($query)) {
        $table[]=$row;
            }
        return $table;
    }
    
    public function updateUser($user) {
        //$u=new User();
        $u=$user; 
        $s=new UserService();
        $query=mysqli_query($s->dbcon, 'CALL update_user ("'.$u->getEmail().'","'.$u->getPassword().'","'.$u->getFirstName().'","'.$u->getLastName().'","'.$u->getPhone().'","'.$u->getConfirmUrl().'",'.$u->getID().')');
        //print 'CALL update_user ("'.$u->getEmail().'","'.$u->getPassword().'","'.$u->getFirstName().'","'.$u->getLastName().'","'.$u->getPhone().'","'.$u->getConfirmUrl().'",'.$u->getID().')';    
    }
    
    public static function getSaltSting(){
        return "1r0Nm4N";
    }
    public function readUser($ID){
        $s=new UserService();
        $query= mysqli_query($s->dbcon, 'CALL read_user ('.$ID.')');
        $row = mysqli_fetch_assoc($query);
        //print_r ($row);
        $user=new User($ID, $row['email'], $row['password'], $row['firstname'], $row['lastname'], $row['phone'], $row['username'], $row['confirmurl']);
        return $user;

    }
    
    //ezek az adatok mennek ki a frontendre adb-ből
    public function userToArray($u){
        $userData=array();
        $user=new User($u->getID(),$u->getEmail(),$u->getPassword(),$u->getFirstName(),$u->getLastName(),$u->getPhone(),$u->getUsername(), $u->getConfirmUrl()); //constructor sorrend
        $userData["ID"]=$user->getID();
        $userData["Email"]=$user->getEmail();
        $userData["FirstName"]=$user->getFirstName();
        $userData["LastName"]=$user->getLastName();
        $userData["Phone"]=$user->getPhone();
        $userData["Username"]=$user->getUserName();
        return $userData;
    }
    
     public function deleteUser($user) {
        $u=$user; 
        $s=new UserService();
        $query=mysqli_query($s->dbcon, 'CALL delete_user ('.$u->getID().')');       
    }
    
     public function createUser($user){
        $s=new UserService(); 
        $u=$user; 
        $b=$s->dbcon;
        $salt=UserService::getSaltSting(); 
        $sql='CALL create_user ("'.$u->getEmail().'","'.$u->getPassword().$salt.'","'.$u->getFirstName().'","'.$u->getLastName().'","'.$u->getPhone().'","'.$u->getUserName().'","'.$u->getConfirmUrl().'")';
        
        //file_put_contents("sql.txt", $sql); --teszteléshez kellett
        $query=mysqli_query($b,$sql); 
        $id=mysqli_query($b,"select max(id) as id from user"); 
        $idnumber= mysqli_fetch_assoc($id); 
        //file_put_contents("sql.txt", $idnumber["id"]); --teszthez kellett
        $user=$s->readUser($idnumber["id"]);
        if($s->sendemail($user)){
            //ide írjuk, amit sikeres mail küldés esetén szeretnénk csinálni
        }
        //else ág: sikertelen email küldés esetén

        return $user; 
    }
    
    public function login($user, $password) {
        
        $s=new UserService(); 
        $b=$s->dbcon;
        $sql='CALL login("'.$user.'","'.$password.'")';
        $query=mysqli_query($b,$sql); 
        $idnumber= mysqli_fetch_assoc($query); 
        $u=$s->readUser($idnumber["id"]); 
        return $u;
        
    }

    
    public function sendemail($user){
        
        $to = $user->getEmail();
        $subject = "Regisztráció megerősítése";
        $txt = "Kérjük, hogy a regisztráció megerősítéséhez kattints a következő linkre.".$user->getConfirmUrl();
        $headers = "From: webmaster@example.com"; //küldő e-mail címe
        $return=mail($to,$subject,$txt,$headers);
        return $return;        
    }
}

