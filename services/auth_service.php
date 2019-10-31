<?php 

    require("../connect.php");

    function login_service($username, $password){
        $conn = get_sql_connection();
        $login = "SELECT * FROM User WHERE username = '$username' && password = '$password'";
        /*
        $login->bind_param(
            "ss",
            $username,
            $password
        );
        */
        $result = null;
        try{
            $result = mysqli_query($conn, $login);
        }catch(Exception $e){
            echo $e->getMessage();
        }
        return mysqli_num_rows($result) == 1;
    }

    function logout(){
        # do nothing
    }


?>