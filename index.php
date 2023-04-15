<?php

require_once('vendor/autoload.php');

$_groups_sqlhandler = new MySQLHandler("groups");

require_once("views/Groups/all.php");