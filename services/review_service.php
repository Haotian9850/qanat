<?php
    
        	include_once("./config.php");
		// To connect to the database
		$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
		// Check connection
		if (mysqli_connect_errno())
		{echo "Failed to connect to MySQL: " . mysqli_connect_error();}
		


		// Form the SQL query (an INSERT query)
		
		$sql="INSERT INTO Review (text, rating) VALUES('$_POST[inputtext]','$_POST[inputrate]')";
		
		if (!mysqli_query($con,$sql))
		{die('Error: ' . mysqli_error($con));}
		//Citation: consulted this Stack Overflow link to learn how to refresh page after a submission
		//https://stackoverflow.com/questions/42109893/how-to-go-back-to-page-after-submitting-form-using-php
		header("Location: reviews.php");
		echo "WooHoo";



		// Output to user
		mysqli_close($con);
?>