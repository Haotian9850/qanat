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
		include_once('./library.php');
		// To connect to the database
		$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
		$q1 =  "CALL `statgen`(@p0, @p1);";
		$q1 .= "SELECT @p0 AS `num_users`, @p1 AS `avg_rating`;";
		//https://www.php.net/manual/en/mysqli.multi-query.php
		//Recieved syntax for multi-query, meant for stored procedures
		if (mysqli_multi_query($con, $q1)) {
   		
		    do {
        		/* store first result set */
        		if ($result = mysqli_store_result($con)) {
            			while ($row = mysqli_fetch_row($result)) {
                			echo "Number of Users Using Qanat: " . $row[0] ;
					echo ", Average Rating of Qanat: " . $row[1];
            		}
			mysqli_free_result($result);
			if (mysqli_more_results($con)) {
           			 printf("-----------------\n");
        		}
			
            		
        		}
        		
        
    			} while (mysqli_next_result($con));
		}
        	mysqli_close($con);

		?>
            <h1 class="display-4">Ratings</h1>

	
	    <?php
		include_once('./library.php');
		// To connect to the database
		$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
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