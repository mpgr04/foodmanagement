<!DOCTYPE html>
<?php
#region Login check
session_start();

if ($_SESSION["loggedin"]==0) {
    header("Location:../index.php");
    exit;
}
#endregion
?>
  <html>

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Test</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/vnd.microsoft.icon">
    <link rel='stylesheet' href='//fonts.googleapis.com/css?family=font1|font2|etc' type='text/css'>
  </head>

  <body>
    <a class="btn" href="../PHPScripts/Logout.php">Logout</a>
  </body>

  </html>