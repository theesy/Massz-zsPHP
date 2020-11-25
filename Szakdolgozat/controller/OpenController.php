<?php

header("content-type:application/json");
require_once '../service/OpenService.php';
session_start();
function getOpen ($page) {
    
    $x=new OpenService();
    $result=$x->listing($page);
    return $result;
}

$task=$_POST["task"];
$page=$_POST["page"]; 

if ($task=="listing") {
    $x=new OpenService();
    $result=$x->listing($page);
    print json_encode($result);
    
}

if($task=="set open day"){
    $_SESSION["loggeduser"]->setDay($_POST["day"]);
    $x->updateOpen($_SESSION["loggeduser"]);
}

if($task=="set open from"){
    $_SESSION["loggeduser"]->setFrom($_POST["from"]);
    $x->updateOpen($_SESSION["loggeduser"]);
}

if($task=="set open to"){
    $_SESSION["loggeduser"]->setTo($_POST["to"]);
    $x->updateOpen($_SESSION["loggeduser"]);
}

if($task=="set holiday"){
    $_SESSION["loggeduser"]->setIsHoliday($_POST["isholiday"]);
    $x->updateOpen($_SESSION["loggeduser"]);
}

if($task=="set holiday message"){
    $_SESSION["loggeduser"]->setHolidayMsg($_POST["holidaymsg"]);
    $x->updateOpen($_SESSION["loggeduser"]);
}

if($task=="set closed"){
    $_SESSION["loggeduser"]->setClosed($_POST["closed"]);
    $x->updateOpen($_SESSION["loggeduser"]);
}

if($task=="delete open"){
    $id=$_POST['ID'];
    $open=$x->readOpen($id);
    $x->deleteOpen($open);    
}