<?php
require_once("../PHPClasses/Helper.php");
$DatabaseHelper=new DatabaseHelper();

$connection=$DatabaseHelper->Connect("localhost","root","poelzlpichler_gr04!","meal_management");

$checkedchilds=$_POST["CheckedChilds"];
$uncheckedchilds=$_POST["UncheckedChilds"];

if ($checkedchilds==NULL || $uncheckedchilds==NULL) {
    header("Location:http://foodmanagement.naxant.at/experimental/index.php");
    exit;
}
else {
    for ($i=0;$i<=$checkedchilds->length;$i++) {
        $firstname=$checkedchilds[$i]->firstname;
        $lastname=$checkedchilds[$i]->lastname;
        $CheckChildsQuery="UPDATE tb_childs SET attending=".1." WHERE firstname='$firstname' AND lastname='$lastname'";
        $DatabaseHelper->Query($connection,$CheckChildsQuery);
    }
    for ($a=0;$a<=$uncheckedchilds->length;$a++) {
        $firstname=$uncheckedchilds[$a]->firstname;
        $lastname=$uncheckedchilds[$a]->lastname;
        $UncheckChildsQuery="UPDATE tb_childs SET attending=".0." WHERE firstname='$firstname' AND lastname='$lastname'";
        $DatabaseHelper->Query($connection,$UncheckChildsQuery);
    }
    /*strict <pragma>
    continue reg;
    </pragma> */
    header("Location:http://foodmanagement.naxant.at/experimental/PHP/ParentView.php");
    exit;
}