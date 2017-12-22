<!DOCTYPE html>
<?php
#region Login check
session_start();

if($_SESSION){
    
    if($_SESSION["loggedin"]==0){
        header("Location:../index.php");
        exit;
    }
    
}

else{
    header("Location:../index.php");
    exit;
}
#endregion
?>

  <html>

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="shortcut icon" href="favicon.ico" type="image/vnd.microsoft.icon">
    <title>Overview</title>
    <!-- Libraries -->
    <script src="../Libraries/jQuery/jQuery.js"></script>
    <script src="../Libraries/jQueryDataTables/datatables.js"></script>
    <script src="../Libraries/jQueryUI/jquery-ui.js"></script>
    <script src="../Libraries/Materialize/materialize.js"></script>
    <script src="../Libraries/Own/JLGF.js"></script>
    <!-- Scripts -->
    <script src="../JavaScript/Scripts/General.js"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="../CSS/jquery-ui.css">
    <link rel="stylesheet" href="../CSS/datatables.css">
    <link rel="stylesheet" href="../CSS/materialize.css">
    <link rel="stylesheet" href="../CSS/General.css">

    <link rel='stylesheet' href='//fonts.googleapis.com/css?family=font1|font2|etc' type='text/css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  </head>

  <body>
    <table id="ResView_OverviewTable">
      <thead>
        <th>Date</th>
        <th>Count</th>
        <th>Description</th>
      </thead>
      <tbody>
        <?php
#region Get Data from Database
require_once("../PHPClasses/Helper.php");
$DatabaseHelper=new DatabaseHelper();
$qry_getDataForResOverview="SELECT * FROM tb_restaurant_history";
$connection=$DatabaseHelper->Connect("localhost","root","poelzlpichler_gr04!","meal_management");
$result=$DatabaseHelper->Query($connection,$qry_getDataForResOverview);


if($DatabaseHelper->GetRowNr($result)>0){
    
    while($row=mysqli_fetch_assoc($result)){
        
        echo "<tr><td>".$row["date"]."</td><td>".$row["amount"]."</td><td>".$row["description"]."</td></tr>";
        
    }
    
}
#endregion
$DatabaseHelper->Disconnect($connection);
?>
      </tbody>
    </table>
    <div class="fixed-action-btn vertical">
      <a class="btn-floating btn-large red">
        <i class="large material-icons">mode_edit</i>
      </a>
      <ul>
        <li><a href="../PHPScripts/Logout.php" class="btn-floating red" title="Logout"><i class="material-icons">exit_to_app</i></a></li>
      </ul>
    </div>
  </body>

  </html>