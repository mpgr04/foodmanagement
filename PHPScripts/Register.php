<?php

function login($username, $password, $mysqli) {
    
    $firstname = $_POST["textfield_firstname"];
    $lastname = $_POST["textfield_lastname"];
    $username = $_POST["textfield_username"];
    $password = $_POST["textfield_password"];
    
    else{
        require_once("../PHPClasses/Helper.php");
        $DatabaseHelper=new DatabaseHelper();

        $connection=$DatabaseHelper->Connect("localhost","root","poelzlpichler_gr04!","meal_management");
        $getLatesIDDataQuery="SELECT max(id) FROM tb_users";
        $result=$DatabaseHelper->Query($connection,$getLatestIDDataQuery);
        echo $result;
        $createUserDataQuery="INSERT INTO tb_users (id, firstname, lastname, username, password) VALUES ('$id', '$firstname', '$lastname', '$username', '$password')";
    }
}