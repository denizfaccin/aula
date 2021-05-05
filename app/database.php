<?php

include 'config/default.php';


require 'vendor/thingengineer/mysqli-database-class/MysqliDb.php';

$mysqli = new mysqli ($servername, $username, $password, $dbname);
$db = new MysqliDb ($mysqli);

?>