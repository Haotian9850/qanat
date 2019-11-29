<?php
    
        	
		error_reporting(-1);
		ini_set('display_errors', 'On');
		include_once('./config.php');
		include_once('./connect.php');
		// To connect to the database
		//$con = new mysqli("cs4750.cs.virginia.edu", "ns9wr", "upsorn", "ns9wr_qanat");	
		$con = get_sql_connection();
		// Check connection
		if (mysqli_connect_errno())
		{echo "Failed to connect to MySQL: " . mysqli_connect_error();}
		


		// Form the SQL query (an INSERT query)
		
		//Citation: https://stackoverflow.com/questions/34080984/text-form-cant-accept-apostrophes
		
		
		$sql="INSERT INTO Review (text, rating) VALUES('$_POST[inputtext]','$_POST[inputrate]')";
		
		if (!mysqli_query($con,$sql))
		{
		echo 'Error inside connection';
		die('Error: ' . mysqli_error($con));}
		//Citation: consulted this Stack Overflow link to learn how to refresh page after a submission
		//https://stackoverflow.com/questions/42109893/how-to-go-back-to-page-after-submitting-form-using-php
		header("Location: homepage.php");
		echo "WooHoo";



		// Output to user
		mysqli_close($con);
