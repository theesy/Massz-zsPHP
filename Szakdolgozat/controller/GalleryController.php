<?php

header("content-type:application/json");
require_once '../service/GalleryService.php';
session_start();
function getGallery ($page) {
    
    $x=new GalleryService();
    $result=$x->listing($page);
    return $result;
}

$task=$_POST["task"];
$page=$_POST["page"];

if ($task=="listing") {
    $x=new GalleryService();
    $result=$x->listing($page);
    print json_encode($result);
    
}

if($task=="set image"){
    $_SESSION["loggeduser"]->setImageUrl($_POST["imageurl"]);
    $x->updateGallery($_SESSION["loggeduser"]);
}

if($task=="set the image status"){
    $_SESSION["loggeduser"]->setStatus($_POST["status"]);
    $x->updateGallery($_SESSION["loggeduser"]);
}

if($task=="set sort of the image"){
    $_SESSION["loggeduser"]->setSort($_POST["sort"]);
    $x->updateGallery($_SESSION["loggeduser"]);
}

if($task=="delete gallery"){
    $id=$_POST['ID'];
    $gallery=$x->readGallery($id);
    $x->deleteGallery($gallery);    
}