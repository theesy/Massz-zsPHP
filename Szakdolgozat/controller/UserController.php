<?php
header("content-type:application/json");
header("Access-Control-Allow-Origin: *");
require_once '../service/UserService.php';
session_start();
$user=new User(1, 'email@dd.hu', 'dsspassdsfaword', 'firstName', 'lastName', '4695554', 'userName', 'confirmsafsafsasaUrl'); //csináltunk egy usert amit session-be teszünk
$_SESSION["loggeduser"]=$user;


function getAllUsers ($page) { //fixed me routingolás
    
    $x=new UserService();
    $result=$x->listing($page);
    return $result;
}

/*
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['task'])){
    $task=$_POST["task"];
}*/
$task="create user";

//$page=$_POST["page"]; //kivesszük őket
$x=new UserService();
if ($task=="listing") {
    $result=$x->listing($page);
    print json_encode($result);
 
 
    
}
if ($task=="change password") {
    $old=$_POST["oldpasswd"];
    $new=$_POST["newpasswd"];
    $id=$_SESSION["loggeduser"]->getID();
    if(sha1($old.UserService::getSaltSting())==$_SESSION["loggeduser"]->getPassword()){ 
        $_SESSION["loggeduser"]->setPassword(sha1($new));
        $x->updateUser($_SESSION["loggeduser"]);
    }
}
if($task=="set new phone number"){
    $_SESSION["loggeduser"]->setPhone($_POST["phone"]);
    $x->updateUser($_SESSION["loggeduser"]);
}

if($task=="set firstname"){
    $_SESSION["loggeduser"]->setFirstName($_POST["firstname"]);
    $x->updateUser($_SESSION["loggeduser"]);
}

if($task=="get user"){
    $_SESSION["loggeduser"]=$x->readUser($_POST['ID']);
  //  print json_encode((array)$_SESSION["loggeduser"]); //konvertálás? kell, nem tud assz. tömböt csinálni a példányból
    print json_encode($x->userToArray($_SESSION["loggeduser"]));
    
}

if($task=="delete user"){
    $id=$_POST['ID'];
    $user=$x->readUser($id); //validálni itt majd lehet
    $x->deleteUser($user);    
}

if($task=="create user"){
    $email= trim(strip_tags($_POST['email']));   //strip_tags leszedi a html kódokat, hogy adb-be ne kerüljenek bele, sztring két oldalát is leszedi, sql injection ellehetlenít, támadások ellen, pl. tábla törlés ellen
    $password=trim(strip_tags($_POST['password']));
    $firstname=trim(strip_tags($_POST['firstname']));
    $lastname=trim(strip_tags($_POST['lastname']));
    $phone=trim(strip_tags($_POST['phone']));
    $username=trim(strip_tags($_POST['username']));
    $url= sha1(time().$email); //time=1970 óta eltelt sec száma + user mailje
    //file_put_contents("alma.txt", $username); -- teszthez kellett
    $user=new User(1, $email, $password, $firstname, $lastname, $phone, $username, $url); //user lepéldányosítva
    $keszuser=$x->createUser($user); //meghívjuk createUser-t ez másik $user már, a példányt adjuk át
    $userdata=$x->userToArray($keszuser);
    print json_encode($userdata); //átkonvertálja a user adatait, az asszoc. tömböt json formátumba teszi
    }
    
    
  if($task=="login"){
    $user= trim(strip_tags($_POST['user']));
    $password=trim(strip_tags($_POST['password']));
    $keszuser=$x->login($user, $password);
    $userdata=$x->userToArray($keszuser);
    print json_encode($userdata); //átkonvertálja a user adatait, az asszoc. tömböt json formátumba teszi
  }