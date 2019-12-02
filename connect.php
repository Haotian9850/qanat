<?php 
    
    function get_sql_connection(){
        if (isset($_SESSION["username"])) {
            $conn = new mysqli(
                SERVER,
                USERNAME_AUTHED,
                PASSWORD_AUTHED,
                DATABASE
            );
        } else {
            $conn = new mysqli(
                SERVER,
                USERNAME_UNAUTHED,
                PASSWORD_UNAUTHED,
                DATABASE
            );
        }
        if($conn->connect_errno){
            error_log("Connection to SQL service failed with error: ".$conn->getMessage());
            exit();
        }
        if($conn->ping()){
            //printf("Connection to SQL server %s is successful.\n", SERVER);  //DEBUG ONLY
        }else{
            error_log("SQL error while pinging host: ".$conn->error);
        }
        return $conn;
    }

?>