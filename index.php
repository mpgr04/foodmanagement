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
    <script src="http://foodmanagement.naxant.at/experimental/Libraries/jQuery/jQuery.js"></script>
    <script src="http://foodmanagement.naxant.at/experimenteal/Libraries/Materialize/materialize.js"></script>
    <!-- Scripts -->

    <!-- CSS -->
    <link rel="stylesheet" href="http://foodmanagement.naxant.at/experimental/materialize.css">
    <link rel="stylesheet" href="http://foodmanagement.naxant.at/experimental/materializeCustom.css">
    <link rel="stylesheet" href="http://foodmanagement.naxant.at/experimental/General.css">
    <link rel='stylesheet' href='//fonts.googleapis.com/css?family=font1|font2|etc' type='text/css'>
  </head>

<<<<<<< HEAD
  <bodystyle="background-image:url('http://foodmanagement.naxant.at/experimental/Resources/bg.png');" class=" fullscreenBackground ">
    <form method="POST " action="PHPScripts/Login_New.php " class=" centerHoriVerti z-depth-1 hoverable centerText " style="background-color:white;width:300px;height:250px; ">
=======
  <body style="background-image:url('http://foodmanagement.naxant.at/experimental/Resources/bg.png');" class=" fullscreenBackground ">
    <form method="POST " action="http://foodmanagement.naxant.at/experimental/PHPScripts/Login_New.php " class=" centerHoriVerti z-depth-1 hoverable centerText " style="background-color:white;width:300px;height:250px; ">
>>>>>>> c9d84a23978c303784e103693a771fbfe0c4592e
      <h5 class="accentForecolor centerText ">Login</h5>
      <div class="divider "></div>
      <br />
      <input class="centerText " name="textfield_username " type="text" style="width:230px; " placeholder="Username... " autofocus />
      <br />
      <input class="centerText " name="textfield_password " type="password" style="width:230px; " placeholder="Passwort... " />
      <br />
      <input type="submit" class="btn-flat waves-effect accentForecolor " value="Login" />
    </form>
  </body>

  </html>