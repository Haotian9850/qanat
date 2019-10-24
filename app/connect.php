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
    return mysqli_query($con,$sql);
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
