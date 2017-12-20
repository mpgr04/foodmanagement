<?php
session_start();

if($_SESSION){
    
    if($_SESSION["loggedin"]==1){
        session_destroy();
    }
}

?>