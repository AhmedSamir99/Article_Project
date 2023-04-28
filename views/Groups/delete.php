<?php
include_once("group_object.php");
$id = (isset($_GET["id"]))? intval($_GET["id"])  : 0;
$_groups_sqlhandler->delete($id);
header("Location:index.php");

?>