<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Select</title>
    <link rel="stylesheet" href="styles/table.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  </head>
  <body>



<?php
  ini_set('display_errors', 'On');
  error_reporting(E_ALL);
  require_once('./connect.php');


  get_table("Show tables");


  mysqli_close($con);

  ?>


</body>
</html>
