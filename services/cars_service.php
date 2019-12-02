<?php

	function get_owned_cars($username){
        $conn = get_sql_connection();
        $result = Array();
        $all_cars = $conn->prepare("SELECT VIN, make, model, year, username FROM 
        	Vehicle NATURAL JOIN Owns NATURAL JOIN User WHERE username = ?");
        $all_cars->bind_param("s", $username);
        try{
            $all_cars->execute();
        }catch(Exception $e){
            echo $e->getMessage();
            return NULL;
        }
        $cars_result = $all_cars->get_result();
        while($row = $cars_result->fetch_assoc()){
            $result[] = Array(
                "VIN" => $row["VIN"],
                "make" => $row["make"],
                "model" => $row["model"],
                "year" => $row["year"]
            );
        }
        //var_dump($result);
        return $result;
    }



?>