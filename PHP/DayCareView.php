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
    <table id="table_DCH">
      <thead>
        <th>Name</th>
        <th>Date</th>
        <th>Attended</th>
      </thead>
      <tbody>
        <?php
#region Get data from database
require_once("../PHPClasses/Helper.php")
$DatabaseHelper=new DatabaseHelper();
$connection=$DatabaseHelper->Connect("localhost","root","poelzlpichler_gr04!","meal_management");
$query_GetAllFromDCH="SELECT * FROM tb_daycare_history";
$queryResult=$DatabaseHelper->Query($connection,$query_GetAllFromDCH);

if($DatabaseHelper->GetRownNr($queryResult)>0){
    
    while($row=mysqli_fetch_assoc($queryResult)){
        
        echo "<tr><td>".$row["name"]."</td><td>".$row["date"]."</td><td>".$row["amount"]."</td></tr>"; /*must be changed*/
    }
}

#endregion
$DatabaseHelper->Disconnect($connection);
?>
      </tbody>
    </table>
    <!--Dialogs START-->
    <form id="dialog_AddChild" class="centerText centerHoriVerti" method="POST" action="http://foodmanagement.naxant.at/experimental/PHPScripts/AddChild.php">

      <input type="text" name="textfield_childFirstname" />
      <input type="text" name="textfield_childLastname" />
      <select name="parentSelect">
        <?php
#region Get Parents
$connection=$DatabaseHelper->Connect("localhost","root","poelzlpichler_gr04!");
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
      <input type="submit" class="btn green" value="Create" />
    </form>
    <!--Dialogs END -->

    <div class="fixed-action-btn horizontal">
      <a class="btn-floating btn-large red">
        <i class="large material-icons">mode_edit</i>
      </a>
      <ul>
        <li><a class="btn-floating red;" id="btn_AddChild"><i class="material-icons">add</i></a></li>
      </ul>
    </div>
  </body>

  </html>