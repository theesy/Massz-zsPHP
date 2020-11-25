<?php
require_once '../model/Booking.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BookingService
 *
 * @author thees
 */
class BookingService {
    private $dbcon;   
    function __construct() {
        $this->dbcon=mysqli_connect("localhost", "root", "", "masszazsoldal");
        
    }

    public function registration($user) {
    
    }
    
    //listázás, kiíratás
    
    public function updateBooking($booking) {
        $b=$booking; 
        $s=new BookingService();
        $query=mysqli_query($s->dbcon, 'CALL update_booking ("'.$b->getDateTime().'","'.$b->getTimeStart().'","'.$b->getTimeEnd().'","'.$b->getAdminNote().'",'.$b->getID().')');
       
       //print 'CALL update_booking ("'.$b->getDateTime().'","'.$b->getTimeStart().'","'.$b->getTimeEnd().'","'.$b->getAdminNote().'",'.$b->getID().')';
        //teszt kiírás   
    }
    
        public function deleteBooking($booking) {
        $b=$booking; 
        $s=new BookingService();
        $query=mysqli_query($s->dbcon, 'CALL delete_booking ('.$b->getID().')');       
    }

        public function readBooking($ID){
        $s=new BookingService();
        $query= mysqli_query($s->dbcon, 'CALL read_booking ('.$ID.')');
        $row = mysqli_fetch_assoc($query);
        //print_r ($row);
        $booking=new Booking($ID, $row['datetime'], $row['timestart'], $row['timeend'], $row['userid'], $row['serviceid'], $row['adminnote']);
        return $booking;
        
    }
    
    public function createBooking($booking){
        $s=new BookingService();
        $b=$booking; 
        $x=$s->dbcon;
        $sql='CALL create_booking ("'.$b->getDateTime().'","'.$b->getTimeStart().'","'.$b->getTimeEnd().'","'.$b->getUserID().'","'.$b->getServiceID().'","'.$b->getAdminNote().'")';
        file_put_contents("sql.txt", $sql);
        $query=mysqli_query($x,$sql);
        $id=mysqli_query($x,"select max(id) as id from booking");
        $idnumber= mysqli_fetch_assoc($id);
        file_put_contents("sql.txt", $idnumber["id"]);
        $booking=$s->readBooking($idnumber["id"]);
        return $booking; 
    }
}


