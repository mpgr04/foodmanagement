<!DOCTYPE html>
<?php
#region Login check
session_start();
if($_SESSION){
    if($_SESSION["loggedin"]==0&&$_SESSION["isParent"]==0){
        header("Location:http://foodmanagement.naxant.at/experimental/index.php");
        exit;
    }
}
else{
    header("Location:http://foodmanagement.naxant.at/experimental/index.php");
    exit;
}

#endregion

?>
  <html>

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="shortcut icon" href="favicon.ico" type="image/vnd.microsoft.icon">
    <title>Parent view</title>
    <!-- Libraries -->
    <script src="http://foodmanagement.naxant.at/experimental/Libraries/jQuery/jQuery.js"></script>
    <script src="http://foodmanagement.naxant.at/experimental/Libraries/jQueryDataTables/datatables.js" type="text/javascript"></script>
    <script src="http://foodmanagement.naxant.at/experimental/Libraries/jQueryUI/jquery-ui.js"></script>
    <script src="http://foodmanagement.naxant.at/experimental/Libraries/Materialize/materialize.js"></script>
    <script src="http://foodmanagement.naxant.at/experimental/Libraries/Own/JLGF.js"></script>
    <!-- Scripts -->
    <script src="http://foodmanagement.naxant.at/experimental/JavaScript/Scripts/General.js"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="http://foodmanagement.naxant.at/experimental/CSS/jquery-ui.css">
    <link rel="stylesheet" href="http://foodmanagement.naxant.at/experimental/CSS/datatables.css">
    <link rel="stylesheet" href="http://foodmanagement.naxant.at/experimental/CSS/materialize.css">
    <link rel="stylesheet" href="http://foodmanagement.naxant.at/experimental/CSS/materializeCustom.css">
    <link rel="stylesheet" href="http://foodmanagement.naxant.at/experimental/CSS/General.css">

    <link rel='stylesheet' href='//fonts.googleapis.com/css?family=font1|font2|etc' type='text/css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  </head>

  <body>

    <div class="row-valign">
      <div class="valign-wrapper">
        <?php
require_once("../PHPClasses/Helper.php");
$DatabaseHelper = new DatabaseHelper();
$connection=$DatabaseHelper->Connect("localhost","root","poelzlpichler_gr04!","meal_management");

$getallChildrenQuery="SELECT * FROM tb_childs WHERE parent='".$_SESSION['username']."'";
$result=$DatabaseHelper->Query($connection,$getallChildrenQuery);

if($DatabaseHelper->GetRowNr($result)>0){
    
    while($row=mysqli_fetch_assoc($result)){
        
        echo "
        <div class='col' style='padding-top:40px;padding-left:40px;'>
        <div class='card hoverable z-depth-1 centerText' style='width:200px;height:87px;'>
        <h5 class='centerText'style='color:#d32f2f;'>".$row['firstname']." ".$row['lastname']."</h5>
        <div class='divider'></div>
        <label>Attending</label>
        <div class='switch'>
        <label>
        <input type='checkbox'/>
        <span class='lever'></span>
        </label>
        </div>
        
        </div>
        </div>
        ";
    }
}
$DatabaseHelper->Disconnect($connection);
?>
      </div>
    </div>

    <div class="fixed-action-btn horizontal">
      <a class="btn-floating btn-large red">
        <i class="large material-icons">mode_edit</i>
      </a>
      <ul>
        <li><a id="link_refreshPage" class="btn-floating blue"><i class="material-icons">refresh</i></a></li>
        <li><a id="link_updateChildState" class="btn-floating green"><i class="material-icons">save</i></a></li>
        <li><a href="http://foodmanagement.naxant.at/experimental/PHPScripts/Logout.php" class="btn-floating red"><i class="material-icons">exit_to_update</i></a></li>
      </ul>
    </div>
  </body>

  </html>