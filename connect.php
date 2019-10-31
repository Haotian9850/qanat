<?php 
    //mysqli_report(MYSQLI_REPORT_ALL);
    function get_sql_connection(){
        $conn =  new mysqli(
            SERVER,
            USERNAME,
            PASSWORD,
            DATABASE
        );
        if($conn->connect_errno){
            error_log("Connection to SQL service failed with error: ".$conn->getMessage());
            exit();
        }
        if($conn->ping()){
            //printf("Connection to SQL server %s is successful.\n", SERVER);
        }else{
            error_log("SQL error while pinging host: ".$conn->error);
        }
        return $conn;
    }

?>