<?php
session_start();

if($_SESSION){
    
    if($_SESSION["loggedin"]==1){
        session_destroy();
        // header("Location:http://foodmanagement.naxant.at/experimental/index.php");
        header("Location:http://foodmanagement.naxant.at/experimental/index.php");
        exit;
    }
}

?>