<?php

header("content-type:application/json");
require_once '../service/ContactService.php';
session_start();
function getContact ($page) {
    
    $x=new ContactService();
    $result=$x->listing($page);
    return $result;
}

$task=$_POST["task"];
$page=$_POST["page"]; //kivesszük őket

if ($task=="listing") {
    $x=new ContactService();
    $result=$x->listing($page);
    print json_encode($result);
    
}

if($task=="set new address"){
    $_SESSION["loggeduser"]->setAddress($_POST["address"]);
    $x->updateContact($_SESSION["loggeduser"]);
}

if($task=="set new phone number"){
    $_SESSION["loggeduser"]->setPhone($_POST["phone"]);
    $x->updateContact($_SESSION["loggeduser"]);
}

if($task=="set new facebook page"){
    $_SESSION["loggeduser"]->setFacebook($_POST["facebook"]);
    $x->updateContact($_SESSION["loggeduser"]);
}

if($task=="delete contact"){
    $id=$_POST['ID'];
    $contact=$x->readContact($id);
    $x->deleteContact($contact);    
}