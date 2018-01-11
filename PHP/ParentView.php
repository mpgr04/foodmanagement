<!DOCTYPE html>
<?php
#region Login check
session_start();
if($_SESSION){
    if($_SESSION["loggedin"]==0){
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
    <title>title</title>
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
    <link rel="stylesheet" href="http://foodmanagement.naxant.at/experimental/CSS/General.css">

    <link rel='stylesheet' href='//fonts.googleapis.com/css?family=font1|font2|etc' type='text/css'>
  </head>

  <body>
    <nav>
      <div class="nav-wrapper">
        <a href="#" class="brand-logo">Logo</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li><a id="link_openUserActionsMenu"><i class="material-icons">profile</i></a></li>
        </ul>
      </div>
    </nav>

    <div class="valign-wrapper">
      <div class="row-valign">
        <?php
require_once("http://foodmanagement.naxant.at/experimental/PHPClasses/Helper.php");
$DatabaseHelper = new DatabaseHelper();
$connection=$DatabaseHelper->Connect("root","poelzlpichler_gr04!","meal_management");

$getallChildrenQuery="SELECT firstname,lastname FROM tb_childs WHERE parent='.$_SESSION['username'].'";
$result=$DatabaseHelper->Query($connection,$getallChildrenQuery);

if($DatabaseHelper->GetRowNr($result)>0){
    
    while($row=mysqli_fetch_assoc($result)){
        
        echo "
        <div class='card hoverable z-depth-1' style='width:150px;height:150px;'>
        <h5>".$row['firstname']." ".$_SESSION['lastname']."</h5>
        <div class='divider'></div>
        <br>
        <input type='checkbox' class='filled-in' id='cb_Attends'/>
        <br>
        <label for='cb_Attends'>Attends</label>
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
        <a class="btn-floating blue"><i class="material-icons">refresh</i></a>
        <a id="link_updateChildState" class="btn-floating green"><i class="material-icons">save</i></a>
      </ul>
    </div>
    <!--Menues Start-->
    <ul class="menu">
      <li class="ui-state-disabled">
        <div>Logout</div>
      </li>
    </ul>
    <!--Menues End-->
  </body>

  </html>