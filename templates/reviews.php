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
            <h1 class="display-4">Ratings</h1>

	
	    <?php

		require_once('./library.php');

		$con= new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);

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