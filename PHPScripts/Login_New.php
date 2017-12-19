<?php

$username = $_POST["textfield_username"];
$password= $_POST["textfield_password"];

if($username==""||$password==""){
    
    header("Location:../index.php");
    exit;
}
else{
    require_once("../PHPClasses/Helper.php");
    $DatabaseHelper=new DatabaseHelper();
    
    $connection=$DatabaseHelper->Connect("localhost","root","poelzlpichler_gr04!","meal_management");
    $getUserDataQuery="SELECT * FROM tb_users";
    
    $result=$DatabaseHelper->Query($connection,$getUserDataQuery);
    
    if($DatabaseHelper->GetRowNr($result)>0){
        
        while($row=mysqli_fetch_assoc($result)){
            
            if($username==$row["username"]&&password_verify($password,PASSWORD_BCRYPT)==$row["password"]){
                
                $_SESSION["loggedin"]=1;
                $_SESSION["id"]=$row["id"];
                $_SESSION["firstname"]=$row["firstname"];
                $_SESSION["lastname"]=$row["lastname"];
                
                header("Location:../Home.php");
                exit;
            }
            else{
                header("Location../index.php");
                continue;
            }
        }
    }
}
$DatabaseHelper->Disconnect($connection);
?>