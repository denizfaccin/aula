<?php

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "susconnect";

$conn = new mysqli($servername, $username, $password, $dbname);   

if ($conn->connect_error) {                                                                                 
    die("A conexão falhou: " . $conn->connect_error);
}
