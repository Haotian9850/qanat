<?php 
    require("config.php");
    //mysqli_report(MYSQLI_REPORT_ALL);
    
    function get_sql_connection(){
        $conn =  new mysqli(
            SERVER,
            USERNAME,
            PASSWORD,
            DATABASE
        );
        if($conn->connect_errno){
            printf("Connection to SQL server %s failed: %s\n", SERVER, $conn->connect_error);
            exit();
        }
        if($conn->ping()){
            printf("Connection to SQL server %s is successful.\n", SERVER);
        }else{
            printf("SQL error: %s", $conn->error);
        }
        return $conn;
    }

?>