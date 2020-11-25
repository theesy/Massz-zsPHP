<?php
require_once '../model/Gallery.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GalleryService
 *
 * @author thees
 */
class GalleryService {
    private $dbcon;   
    function __construct() {
        $this->dbcon=mysqli_connect("localhost", "root", "", "masszazsoldal");
        
    }

    public function registration($user) {
    
    }
    
//listázás, kiíratás
    
    public function updateGallery($gallery) {
        $g=$gallery; 
        $s=new GalleryService();
        $query=mysqli_query($s->dbcon, 'CALL update_gallery ("'.$g->getImageUrl().'","'.$g->getStatus().'","'.$g->getSort().')');
      // print 'CALL update_gallery ("'.$g->getImageUrl().'","'.$g->getStatus().'","'.$g->getSort().')';
       //teszt kiírás
    }
    
    
        public function deleteGallery($gallery) {
        $g=$gallery; 
        $s=new GalleryService();
        $query=mysqli_query($s->dbcon, 'CALL delete_gallery ('.$g->getID().')');       
    }

        public function readGallery($ID){
        $s=new GalleryService();
        $query= mysqli_query($s->dbcon, 'CALL read_gallery ('.$ID.')');
        $row = mysqli_fetch_assoc($query);
        //print_r ($row);
        $gallery=new Gallery($ID, $row['imageurl'], $row['status'], $row['sort']);
        return $gallery;
        
    }
    
    public function createGallery($gallery){
        $s=new GalleryService();
        $g=$gallery; 
        $b=$s->dbcon;
        $sql='CALL create_gallery ("'.$g->getImageUrl().'","'.$g->getStatus().'","'.$g->getSort().'")';
        file_put_contents("sql.txt", $sql);
        $query=mysqli_query($b,$sql);
        $id=mysqli_query($b,"select max(id) as id from gallery");
        $idnumber= mysqli_fetch_assoc($id);
        file_put_contents("sql.txt", $idnumber["id"]);
        $gallery=$s->readGallery($idnumber["id"]);
        return $gallery; 
    }
    
    public function newImage($gallery){
        $s=new GalleryService();
        $g=$gallery; 
        $b=$s->dbcon;
        $sql='CALL create_gallery ("'.$g->getImageUrl().'",0,0)'; //fogy.köv pénteken
        file_put_contents("sql.txt", $sql);
        $query=mysqli_query($b,$sql);
        $id=mysqli_query($b,"select max(id) as id from gallery");
        $idnumber= mysqli_fetch_assoc($id);
        file_put_contents("sql.txt", $idnumber["id"]);
        $gallery=$s->readGallery($idnumber["id"]);
        return $gallery; 
    }
}



