<!DOCTYPE html>
<?php
#region Login check
session_start();

if($_SESSION){
    
    if($_SESSION["loggedin"]==0)
    header("Location:../index.php");
    exit;
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
  </head>

  <body id="ResView_Body">
    <ul id="sideNavigator" class="side-nav">
      <li><a class="waves-effect"><i class="material-icons left">view_list</i>Overview</a></li>
      <li><a class="waves-effect"><i class="material-icons left">format_list</i>Stats</a></li>
    </ul>
    <a href="#" id="ResView_SideNavActivator" data-activates="sideNavigator" class="button-collapse"><i class="material-icons">menu</i></a>
    <table id="ResView_OberviewTable">
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
        <!-- Components -->
      </ul>
    </div>
  </body>

  </html>