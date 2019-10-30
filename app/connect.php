<?php
  $SERVER = 'cs4750.cs.virginia.edu';
  $USERNAME = 'ns9wr';
  $PASSWORD = 'upsorn';
  $DATABASE = 'ns9wr_qanat';

  $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);

  if (mysqli_connect_errno()) {
    echo("Can't connect to MySQL Server. Error code: " .
    mysqli_connect_error());
    return null;
  }

  function run_sql($sql){
    global $con;
    $result = mysqli_query($con,$sql);

    return $result;
  }

  function get_json($sql){

    $result = run_sql($sql);

    if($result == null){
      return "Query <code>".$sql."</code> failed.";
    }

    $json_object = array();

    $cols = $result->fetch_fields();
    foreach ($cols as $col) {
      $json_object[$col->name] = array();
    }

    while($row = mysqli_fetch_array($result)) {
      foreach ($cols as $col) {
        array_push($json_object[$col->name],$row[$col->name]);
        // echo "<td>".$row[$col->name]."</td>";
      }
    }

    return json_encode($json_object);
  }

  function get_table($sql){

    $result = run_sql($sql);

    if($result == null){
      echo "Query <code>".$sql."</code> failed.";
      return null;
    }

    echo "<table>";

    $cols = $result->fetch_fields();
    foreach ($cols as $col) {
      echo "<th>".$col->name."</th>";
    }

    while($row = mysqli_fetch_array($result)) {
      echo "<tr>";
      foreach ($cols as $col) {
        echo "<td>".$row[$col->name]."</td>";
      }

      echo "</tr>";

    }

    echo "</table>";
  }
?>
