<?php
require_once '../../vendor/autoload.php'; 
if(isset($_GET['id']) && isset($_GET['confirm']) && $_GET['confirm'] == 'true') {
    $id = $_GET['id'];
    $db = new MySqlHandler('articles');
    $db->deleteRecordById($id);
    header("Location:../../index.php");
}

?>