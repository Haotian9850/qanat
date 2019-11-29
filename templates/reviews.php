<?php
  include "header.php";
?>

<div class="main-content">
    <div class="main-block">
        <div class="row row-margined">
            <h1 class="display-4">Review Portal</h1>
        </div>
        <div class="row row-margined">
            <form action="review_service.php" method="POST">
           
                    <div class="form-group col-md-4">
                        <label>Comment Text</label>
                        <input type="text" size="150" maxlength="95" class="form-control" name="inputtext">
                    </div>
		    <div class="form-group col-md-4">
                        <label>Rating (out of 100) </label>
                        <input type="text" size="3" maxlength="3" class="form-control" name="inputrate">
                    </div>

             <button type="submit" class="btn btn-primary">Submit</button>
	     
 	     
            </form>

	<div class="form-group col-md-4">
            <h1 class="display-4">Statistics</h1>

		<?php 
		include_once('./config.php');
		include_once('./connect.php');
		$con = get_sql_connection();
		$q1 =  "CALL `statgen`(@p0, @p1);";
		$q1 .= "SELECT @p0 AS `num_users`, @p1 AS `avg_rating`;";
		//https://www.php.net/manual/en/mysqli.multi-query.php
		//Recieved syntax for multi-query, meant for stored procedures
		if (mysqli_multi_query($con, $q1)) {
        		/* store first result set */
        		if ($result = mysqli_store_result($con)) {
            			while ($row = mysqli_fetch_row($result)) {
                			echo "Number of Users Using Qanat: " . $row[0] ;
					echo ", Average Rating of Qanat: " . $row[1];
            		}
			mysqli_free_result($result);
			}
		}
        	mysqli_close($con);

		?>
            <h1 class="display-4">Ratings</h1>

	
	    <?php
		include_once('./config.php');
		include_once('./connect.php');
		// To connect to the database
		$con = get_sql_connection();
		// Check connection
		if (mysqli_connect_errno()) 
		{
			echo("Can't connect to MySQL Server Segmentation Fault. Error code: " . mysqli_connect_error());
			return null;
		}

		// Form the SQL query (a SELECT query)
		$sql="SELECT * FROM Review";
		$result = mysqli_query($con,$sql);
	 	while($row = mysqli_fetch_array($result)){
            		
                	echo $row['text'];
	                echo " " . $row['rating'];
			echo "<br>";
        	}
		
        	mysqli_close($con);
	?>
	</div>
        </div>
    </div>
</div>



<?php
  include "footer.php";
?>
