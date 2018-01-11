<?php

$username = $_POST["textfield_username"];
$password= $_POST["textfield_password"];

if($username==""||$password==""){
    
    // header("Location:http://foodmanagement.naxant.at/experimental/index.php");
    // exit;
    header("Location:http://foodmanagement.naxant.at/experimental/index.php");
    exit;
}
else{
    require_once("../PHPClasses/Helper.php");
    $DatabaseHelper=new DatabaseHelper();
    
    $connection=$DatabaseHelper->Connect("localhost","root","poelzlpichler_gr04!","meal_management");
    $getUserDataQuery="SELECT * FROM tb_users";
    
    $result=$DatabaseHelper->Query($connection,$getUserDataQuery);
    $password=trim($password);
    if($DatabaseHelper->GetRowNr($result)>0){
        
        while($row=mysqli_fetch_assoc($result)){
            
            if($username==$row["username"]&&hash('SHA256', $password)==$row["password"]){
                session_start();
                $_SESSION["loggedin"]=1;
                $_SESSION["username"]=$row["username"];
                $_SESSION["id"]=$row["id"];
                $_SESSION["firstname"]=$row["firstname"];
                $_SESSION["lastname"]=$row["lastname"];
                $_SESSION["isParent"]= $row["isParent"];
                $_SESSION["isDayCare"]=$row["isDayCare"];
                $_SESSION["isRestaurant"]=$row["isRestaurant"];
                #region Redirect based on role
                if($_SESSION["isParent"]==1&&$_SESSION["isDayCare"]==0&&$_SESSION["isRestaurant"]==0){
                    header("Location:http://foodmanagement.naxant.at/experimental/PHP/ParentView.php");
                    exit;
                }
                elseif ($_SESSION["isParent"]==0&&$_SESSION["isDayCare"]==1&&$_SESSION["isRestaurant"]==0) {
                    header("Location:http://foodmanagement.naxant.at/experimental/PHP/DayCareView.php");
                    exit;
                }
                elseif($_SESSION["isParent"]==0&&$_SESSION["isDayCare"]==0&&$_SESSION["isRestaurant"]==1){
                    header("Location:http://foodmanagement.naxant.at/experimental/PHP/RestaurantView.php");
                    exit;
                }
                #endregion
            }
            else{
                // header("Location:http://foodmanagement.naxant.at/experimental/index.php");
                header("Location:http://foodmanagement.naxant.at/experimental/index.php");
                exit;
            }
        }
    }
}
$DatabaseHelper->Disconnect($connection);
?>