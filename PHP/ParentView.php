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
    <div class="valign-wrapper">
      <div class="row-valign">
        <div class="col">
          <div class="card hoverable" style="width:150px;height:150px;">
            <h2>[PLACEHOLDER]</h2>

            <div class="input-field col s12">
              <select>
                <option value="" disabled selected>Choose your option</option>
                <option value="1">Option 1</option>
                <option value="2">Option 2</option>
                <option value="3">Option 3</option>
              </select>
              <label>Select</label>
            </div>

          </div>
        </div>
      </div>
    </div>

    <div class="fixed-action-btn horizontal">
      <a class="btn-floating btn-large red">
        <i class="large material-icons">mode_edit</i>
      </a>
      <ul>
        <a href="#" class="btn-floating blue"><i class="material-icons">refresh</i></a>
        <a class="btn-floating "><i class="material-icons">exit_to_update</i></a>
      </ul>
    </div>
  </body>

  </html>