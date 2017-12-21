<?php
$firstname = $_POST["textfield_firstname"];
$lastname = $_POST["textfield_lastname"];
$username = $_POST["textfield_username"];
$password = $_POST["textfield_password"];
$hashed = hash('SHA256', $password);
$isX = $_POST["isX"];
$isRestaurant = 0;
$isParent = 0;
$isDayCare = 0;

//Prüft welcher der Radiobuttons ausgewählt wurde
if ($isX == 'isRestaurant') {
    $isRestaurant = 1;
}
if ($isX == 'isDayCare') {
    $isDayCare = 1;
}
if ($isX == 'isParent') {
    $isParent = 1;
}

else{
    require_once("../PHPClasses/Helper.php");
    $DatabaseHelper=new DatabaseHelper();
    
    $connection=$DatabaseHelper->Connect("localhost","root","poelzlpichler_gr04!","meal_management");
    $getLatesIDDataQuery="SELECT max(id) FROM tb_users";
    $IDQueryResult=$DatabaseHelper->Query($connection,$getLatestIDDataQuery);
    $resultObject=mysqli_fetch_object($IDQueryResult);
    $resultObject=get_object_vars($resultObject);
    $resultObject=array_values($resultObject)[0];
    $nextID=$resultObject;
    
    $createUserDataQuery="INSERT INTO tb_users (id, firstname, lastname, username, password, isRestaurant, isDayCare, isParent) VALUES ('$nextID', '$firstname', '$lastname', '$username', '$hashed', '$isRestaurant', '$isDayCare', '$isParent')";
    // ALTERNATIVE QUERY $createUserDataQuery="INSERT INTO tb_users VALUES ('$id', '$firstname', '$lastname', '$username', '$hashed', '$isRestaurant', '$isDayCare', '$isParent')";
    $createUser=$DatabaseHelper->Query($connection,$createUserDataQuery);
}