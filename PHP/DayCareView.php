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
    <title>title</title>
    <!-- Libraries -->
    <script src="../Libraries/jQuery/jQuery.js"></script>
    <!-- Not sure of below script type is needed -->
    <script src="../Libraries/jQueryDataTables/datatables.js" type="text/javascript"></script>
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
    <div class="fixed-action-btn horizontal">
      <a class="btn-floating btn-large red">
        <i class="large material-icons">mode_edit</i>
      </a>
      <ul>
        <a href="#" class="btn-floating blue"><i class="material-icons">refresh</i></a>
      </ul>
    </div>
  </body>

  </html>