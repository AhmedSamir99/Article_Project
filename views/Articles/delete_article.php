<?php
require_once '../../vendor/autoload.php'; 
$db = new MySqlHandler('articles');
$id = (isset($_GET["id"]))? intval($_GET["id"])  : 0;
    
    $sql="SELECT image FROM articles WHERE id=".$id;
    $result= $db->getResults($sql);

    $file_path="../../images/".$result[0]['image'];
    unlink($file_path); // delete the image file

    $db->delete($id); // delete the row from the database
?>
<script>
window.location.href = "all.php";
</script>