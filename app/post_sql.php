<?php
  ini_set('display_errors', 'On');
  error_reporting(E_ALL);
  require_once('./connect.php');

  get_table($_POST["sql"]);

  mysqli_close($con);

  ?>
