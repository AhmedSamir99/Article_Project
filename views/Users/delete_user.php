<?php
require_once '../../vendor/autoload.php'; 
$db = new MySqlHandler('users');
$id = (isset($_GET["id"]))? intval($_GET["id"])  : 0;
$db->delete($id);
?>
<script>
window.location.href = "all.php";
</script>

