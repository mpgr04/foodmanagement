<?php

$firstname=$_POST["textfield_childFirstname"];
$lastname=$_POST["textfield_childLastname"];
$selectedParent=$_POST["parentSelect"];


if($firstname==""||$lastname==""||$selectedParent==""){
    
    header("Location:http://foodmanagement.naxant.at/experimental/PHP/DayCareView.php");
    exit;
}
else{
    require_once("../PHPClasses/Helper.php");
    $DatabaseHelper=new DatabaseHelper();
    $connection=$DatabaseHelper->Connect("localhost","root","poelzlpichler_gr04!","meal_management");
    $addChildQuery="INSERT INTO tb_childs('placeholder','.$firstname.','.$lastname.','.$selectedParent.',0)";
    $result=$DatabaseHelper->Query($connection,$addChildQuery);
    
    $DatabaseHelper->Disconnect($connection);
    header("Location:http://foodmanagement.naxant.at/experimental/PHP/DayCareView.php");
    exit;
}
?>