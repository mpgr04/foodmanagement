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
    $connection=$DatabaseHelper->Connect("localhost","poelzlpichler_gr04!","meal_management");
    $getLatesIDDataQuery="SELECT max(id) FROM tb_users";
    $IDQueryResult=$DatabaseHelper->Query($connection,$getLatesIDDataQuery);
    $resultObject=mysqli_fetch_object($IDQueryResult);
    $resultObject=get_object_vars($resultObject);
    $resultObject=array_values($resultObject)[0];
    $nextID=$resultObject + 1; 
    $addChildQuery="INSERT INTO tb_childs($nextID,'.$firstname.','.$lastname.','.$selectedParent.',0)";
    $result=$DatabaseHelper->Query($connection,$addChildQuery);
    
    $DatabaseHelper->Disconnect($connection);
    header("Location:http://foodmanagement.naxant.at/experimental/PHP/DayCareView.php");
    exit;
}
?>