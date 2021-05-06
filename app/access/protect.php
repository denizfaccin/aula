<?php

function protect(){
        
    if(!isset($_SESSION)){
        session_start();
        
        if (!isset($_SESSION['user_id'])){
            header("location: app/access/login.php");
        }
    }
}

