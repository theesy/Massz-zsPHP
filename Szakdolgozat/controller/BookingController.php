<?php

header("content-type:application/json");
require_once '../service/BookingService.php';
session_start();
function getBooking ($page) {
    
    $x=new BookingService();
    $result=$x->listing($page);
    return $result;
}

$task=$_POST["task"];
$page=$_POST["page"]; 

if ($task=="listing") {
    $x=new BookingService();
    $result=$x->listing($page);
    print json_encode($result);
    
}

if($task=="set datetime"){
    $_SESSION["loggeduser"]->setDateTime($_POST["datetime"]);
    $x->updateBooking($_SESSION["loggeduser"]);
}

if($task=="set timestart"){
    $_SESSION["loggeduser"]->setTimeStart($_POST["timestart"]);
    $x->updateBooking($_SESSION["loggeduser"]);
}

if($task=="set timeend"){
    $_SESSION["loggeduser"]->setTimeEnd($_POST["timeend"]);
    $x->updateBooking($_SESSION["loggeduser"]);
}

if($task=="set admin note"){
    $_SESSION["loggeduser"]->setAdminNote($_POST["adminnote"]);
    $x->updateBooking($_SESSION["loggeduser"]);
}

if($task=="delete booking"){
    $id=$_POST['ID'];
    $booking=$x->readBooking($id);
    $x->deleteBooking($booking);    
}