<?php

header("content-type:application/json");
require_once '../service/OpinionService.php';
session_start();
function getOpinion ($page) {
    
    $x=new OpinionService();
    $result=$x->listing($page);
    return $result;
}

$task=$_POST["task"];
if (isset($_POST["page"]))
    $page=$_POST["page"]; 

//********
if ($task=="listing") {
    $x=new OpinionService();
    $result=$x->listing($page);
    print json_encode($result);
    
}

if($task=="set new text"){
    $_SESSION["loggeduser"]->setText($_POST["text"]);
    $x->updateOpinion($_SESSION["loggeduser"]);
}

if($task=="set status"){
    $_SESSION["loggeduser"]->setStatus($_POST["status"]);
    $x->updateOpinion($_SESSION["loggeduser"]);
}

if($task=="delete opinion"){
    $id=$_POST['ID'];
    $opinion=$x->readOpinion($id);
    $x->deleteOpinion($opinion);    
}

$x=new OpinionService();

if($task=="create opinion"){
    $o=new Opinion(0, $_POST["text"], 0, 0, date("Y-m-d H:i:s"), 1);
    $opinion=$x->createOpinion($o);
    $o=$x->readOpinion($opinion->getID());    
    print '{"RD":"OK"}';
}
