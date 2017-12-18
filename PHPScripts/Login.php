<?php

$enteredUsername=$_POST["textfield_username"];
$enteredPassword=$_POST["textfield_password"];

if($enteredUsername==""||$enteredPassword==""){
    
    header("Location:../index.php");
    exit;
}
else{
    
    require_once("../PHPClasses/Helper.php");
    $DatabaseHelper=new DatabaseHelper();
    
    $qry_getAllUsers="SELECT * FROM tb_users WHERE username='".$enteredUsername."'";
    $connection=$DatabaseHelper->Connect("localhost","root","","meal_management");
    
    $DatabaseHelper->Query($connection,$qry_getAllUsers);
    
    
    
}


?>