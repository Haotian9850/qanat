<?php 

/*
    require("../connect.php");
    require("../config.php");
    */

    function get_id_by_name($username){
        $conn = get_sql_connection();
        $get_id = $conn->prepare("SELECT user_id FROM User WHERE username=?");
        $get_id->bind_param("s", $username);
        try{
            $get_id->execute();
        }catch(Exception $e){
            echo $e->getMessage();
            return NULL;
        }
        return $get_id->get_result()->fetch_array()[0];
    }




?>