<?php

header("content-type:application/json");
require_once '../service/InfoBoxService.php';
session_start();
function getInfoBox ($page) {
    
    $x=new InfoBoxService();
    $result=$x->listing($page);
    return $result;
}

$task=$_POST["task"];
$page=$_POST["page"]; 

if ($task=="listing") {
    $x=new InfoBoxService();
    $result=$x->listing($page);
    print json_encode($result);
    
}

if($task=="set image url"){
    $_SESSION["loggeduser"]->setImageUrl($_POST["imageurl"]);
    $x->updateInfoBox($_SESSION["loggeduser"]);
}

if($task=="set the image status"){
    $_SESSION["loggeduser"]->setStatus($_POST["status"]);
    $x->updateInfoBox($_SESSION["loggeduser"]);
}

if($task=="delete infobox"){
    $id=$_POST['ID'];
    $infobox=$x->readInfoBox($id);
    $x->deleteInfoBox($infobox);    
}