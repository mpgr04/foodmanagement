<?php
session_start();

if (isset($_SESSION["loggedin"])&&$_SESSION["loggedin"]==1) {
    session_destroy();
    header("Location:../index.php");
    exit;
}
?>