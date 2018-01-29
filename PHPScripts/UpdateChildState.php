<?php
session_start();
$checkedChilds=$_POST["CheckedChilds"];
$uncheckedChilds=$_POST["UncheckedChilds"];

if($checkedChilds==""||$uncheckedChilds==""){
    
}

$firstnamesCheckedChilds=array_column($checkedChilds,"firstname");
$lastnamesCheckedChilds=array_column($checkedChilds,"lastname");
$firstnamesUncheckedChilds=array_column($uncheckedChilds,"firstname");
$lastnamesUncheckedChilds=array_column($uncheckedChilds,"lastname");


require_once("../PHPClasses/Helper.php");

$DatabaseHelper=new DatabaseHelper();

$connection=$DatabaseHelper->Connect("localhost","root","poelzlpichler_gr04!","meal_management");


for($a=0;$a<=sizeof($firstnamesCheckedChilds);$a++){
    
    $updateChildQueryChecked="UPDATE tb_childs SET attending=1 WHERE parent='".$_SESSION["username"]."' AND firstname='".$firstnamesCheckedChilds[$a]."' AND lastname='".$lastnamesCheckedChilds[$a]."'";
    $DatabaseHelper->Query($connection,$updateChildQueryChecked);
}
for($b=0;$b<=sizeof($firstnamesUncheckedChilds);$b++){
    $updateChildQueryUnchecked="UPDATE tb_childs SET attending=0 WHERE parent='".$_SESSION["username"]."' AND firstname='".$firstnamesUncheckedChilds[$b]."' AND lastname='".$lastnamesUncheckedChilds[$b]."'";
    $DatabaseHelper->Query($connection,$updateChildQueryUnchecked);
}


header("Location:http://foodmanagement.naxant.at/experimental/PHP/ParentView.php");
exit;

?>