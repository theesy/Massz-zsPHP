<?php

header("content-type:application/json");
require_once '../service/MailBoxService.php';
session_start();
function getMailBox ($page) {
    
    $x=new MailBoxService();
    $result=$x->listing($page);
    return $result;
}

$task=$_POST["task"];
$page=$_POST["page"]; 

if ($task=="listing") {
    $x=new MailBoxService();
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
    $_SESSION["loggeduser"]->setPhone($_POST["facebook"]);
    $x->updateContact($_SESSION["loggeduser"]);
}
