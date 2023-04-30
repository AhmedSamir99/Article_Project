<?php
require_once '../../vendor/autoload.php'; 

if(isset($_GET['id']) && isset($_GET['confirm']) && $_GET['confirm'] == 'true') {
    $id = $_GET['id'];
    
    $db = new MySqlHandler('articles');
    $sql="SELECT image FROM articles WHERE id=".$id;
    $result= $db->getResults($sql);

    $file_path="../../images/".$result[0]['image'];
    unlink($file_path); // delete the image file

    $db->deleteRecordById($id); // delete the row from the database

    header("Location:all.php");
}


?>