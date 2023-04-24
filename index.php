<?php 
require_once("vendor/autoload.php");
function remember_Variable($var){
    if(isset($_POST[$var])&&!empty($_POST[$var])){
        return $_POST[$var];
}}
session_start();

$db= new MySqlHandler("users");
$articles= new MySqlHandler("articles");

if(isset($_GET["id"]) && is_numeric ($_GET["id"])){
    require_once("views/articles/all.php");
}
else{
    
    require_once("views/articles/all.php");
}
?>