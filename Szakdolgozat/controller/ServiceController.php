<?php

header("content-type:application/json");
require_once '../service/ServiceService.php';
session_start();
function getService ($page) {
    
    $x=new ServiceService();
    $result=$x->listing($page);
    return $result;
}

$task=$_POST["task"];
$page=$_POST["page"]; 

if ($task=="listing") {
    $x=new ServiceService();
    $result=$x->listing($page);
    print json_encode($result);
    
}

if($task=="set new type"){
    $_SESSION["loggeduser"]->setType($_POST["type"]);
    $x->updateOpinion($_SESSION["loggeduser"]);
}

if($task=="set new timecontent"){
    $_SESSION["loggeduser"]->setTimeContent($_POST["timecontent"]);
    $x->updateOpinion($_SESSION["loggeduser"]);
}

if($task=="set new price"){
    $_SESSION["loggeduser"]->setPrice($_POST["price"]);
    $x->updateOpinion($_SESSION["loggeduser"]);
}

if($task=="set new description"){
    $_SESSION["loggeduser"]->setDescription($_POST["description"]);
    $x->updateOpinion($_SESSION["loggeduser"]);
}

if($task=="delete service"){
    $id=$_POST['ID'];
    $service=$x->readService($id);
    $x->deleteService($service);    
}