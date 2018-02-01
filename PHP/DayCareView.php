<!DOCTYPE html>
<?php
#region Login check
session_start();
if($_SESSION){
    if($_SESSION["loggedin"]==0&&$_SESSION["isDayCare"]==0){
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
    <title>Day care View</title>
    <!-- Libraries -->
    <script src="http://foodmanagement.naxant.at/experimental/Libraries/jQuery/jQuery.js"></script>
    <script src="http://foodmanagement.naxant.at/experimental/Libraries/jQueryDataTables/datatables.js" type="text/javascript"></script>
    <script src="http://foodmanagement.naxant.at/experimental/Libraries/jQueryUI/jquery-ui.js"></script>
    <script src="http://foodmanagement.naxant.at/experimental/Libraries/Materialize/materialize.js"></script>
    <script src="http://foodmanagement.naxant.at/experimental/Libraries/Own/JLGF.js"></script>
    <!-- Scripts -->
    <script src="http://foodmanagement.naxant.at/experimental/JavaScript/Scripts/Init.js"></script>
    <script src="http://foodmanagement.naxant.at/experimental/JavaScript/Scripts/General.js"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="http://foodmanagement.naxant.at/experimental/CSS/jquery-ui.css">
    <link rel="stylesheet" href="http://foodmanagement.naxant.at/experimental/CSS/datatables.css">
    <link rel="stylesheet" href="http://foodmanagement.naxant.at/experimental/CSS/jQueryUICustom.css">
    <link rel="stylesheet" href="http://foodmanagement.naxant.at/experimental/CSS/materialize.css">
    <link rel="stylesheet" href="http://foodmanagement.naxant.at/experimental/CSS/General.css">
    <link rel='stylesheet' href='//fonts.googleapis.com/css?family=font1|font2|etc' type='text/css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  </head>

  <body>
    <table id="table_DCH">
      <thead>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Parent</th>
        <th>Attended</th>
      </thead>
      <tbody>
        <?php
#region Get data from database
require_once("../PHPClasses/Helper.php");
$DatabaseHelper=new DatabaseHelper();
$connection=$DatabaseHelper->Connect("localhost","root","poelzlpichler_gr04!","meal_management");
$query_GetAllFromDCH="SELECT * FROM tb_daycare_history";
$queryResult=$DatabaseHelper->Query($connection,$query_GetAllFromDCH);
if($DatabaseHelper->GetRowNr($queryResult)>0){
    
    while($row=mysqli_fetch_assoc($queryResult)){
        
        echo "<tr><td>".$row["date"]."</td><td>".$row["description"]."</td><td>".$row["child"]."</td><td>".$row["amount"]."</td></tr>";
    }
}

#endregion
$DatabaseHelper->Disconnect($connection);
?>
      </tbody>
    </table>
    <!--Dialogs START-->
    <form id="dialog_AddChild" class="centerHoriVerti centerText" method="POST" style="display:none; width:300px;height:300px;" action="http://foodmanagement.naxant.at/experimental/PHPScripts/AddChild.php">
      <input type="text" name="textfield_childFirstname" placeholder="Firstname" />
      <input type="text" name="textfield_childLastname" placeholder="Lastname" />
      <select id="select_parents" style="display:block;" name="parentSelect" class="input-field col s12">
        <?php
#region Get Parents
$connection=$DatabaseHelper->Connect("localhost","root","poelzlpichler_gr04!","meal_management");
$getParentsQuery="SELECT username FROM tb_users WHERE isParent = 1";
$result=$DatabaseHelper->Query($connection,$getParentsQuery);

if($DatabaseHelper->GetRowNr($result)>0){
    
    while($row=mysqli_fetch_assoc($result)){
        
        echo "<option>".$row["username"]."</option>";
    }
}
else{
    echo "<option disabled>No Data available</option>";
}
#endregion
$DatabaseHelper->Disconnect($connection);
?>

      </select>
      <br>
      <input type="submit" class="btn green" value="Create" />
    </form>
    <!--Dialogs END -->

    <div class="fixed-action-btn horizontal">
      <a class="btn-floating btn-large red">
        <i class="large material-icons">mode_edit</i>
      </a>
      <ul>
        <li><a id="btn_AddChild" class="btn-floating blue"><i class="material-icons">add</i></a></li>
        <li><a href="http://foodmanagement.naxant.at/experimental/PHPScripts/Logout.php" class="btn-floating red"><i class="material-icons">exit_to_app</i></a></li>
      </ul>
    </div>
  </body>

  </html>