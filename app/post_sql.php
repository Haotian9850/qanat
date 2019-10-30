<?php
  ini_set('display_errors', 'On');
  error_reporting(E_ALL);
  require_once('./connect.php');

  echo get_json($_POST["sql"]);
  // echo get_json("Select * from Plug");

  mysqli_close($con);

  ?>
