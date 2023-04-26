<?php
    function remember_Variable($var){
        if(isset($_POST[$var])&&!empty($_POST[$var])){
            return $_POST[$var];
    }}
?>