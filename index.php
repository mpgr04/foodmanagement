<!DOCTYPE html>
<?php
#region Login check
session_start();

if ($_SESSION) {
    if ($_SESSION["loggedin"]==1) {
        header("Location:http://foodmanagement.naxant.at/experimental/PHP/RestaurantView.php");
        exit;
    }
} else {
}
#endregion

?>

  <html>

  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="shortcut icon" href="favicon.ico" type="image/vnd.microsoft.icon">
    <title>Login</title>

    <!-- Libraries -->
    <script src="Libraries/jQuery/jQuery.js" type="text/javascript"></script>
    <script src="Libraries/Materialize/materialize.js" type="text/javascript"></script>
    <!-- Scripts -->
    <script src="JavaScript/General.js"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="CSS/materialize.css" type="text/css">
    <linkr rel="stylesheet" href="CSS/materializeCustom.css" type="text/css">
      <link rel="stylesheet" href="CSS/General.css" type="text/css">
      <link rel='stylesheet' href='//fonts.googleapis.com/css?family=font1|font2|etc' type='text/css'>
  </head>

  <body>
    <form method="POST" action="PHPScripts/Login_New.php" class=" centerHoriVerti z-depth-1 hoverable centerText" style="background-color:white;width:300px;height:250px;">
      <h5 class="accentForecolor centerText">Login</h5>
      <div class="divider"></div>
      <br />
      <input class="centerText" name="textfield_username" type="text" style="width:230px;" placeholder="Username..." />
      <br />
      <input class="centerText" name="textfield_password" type="password" style="width:230px;" placeholder="Passwort..." />
      <br />
      <input type="submit" class="btn-flat waves-effect accentForecolor" value="Login" />
    </form>
  </body>

  </html>