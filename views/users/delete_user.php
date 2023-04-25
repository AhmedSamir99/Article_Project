<?php
require_once '../../vendor/autoload.php'; 
if(isset($_GET['id']) && isset($_GET['confirm']) && $_GET['confirm'] == 'true') {
    $id = $_GET['id'];
    $db = new MySqlHandler('users');
    $db->deleteRecordById($id);
    header("Location:all.php");
}

?>
