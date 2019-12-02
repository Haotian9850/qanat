<?php 

    function login_service($username, $password){
        $conn = get_sql_connection();
        $get_user = $conn->prepare("SELECT password FROM User WHERE username = ?");
        $get_user->bind_param(
            "s",
            $username
        );
        $hash = "";
        try{
            $get_user->execute();
        }catch(Exception $e){
            error_log($e->getMessage());
            return NULL;
        }
        $users = $get_user->get_result();
        while($row = $users->fetch_assoc()){
            $hash = $row["password"];
        }
        return password_verify($password, $hash);
    }

    function logout_service(){
        # do nothing
    }


?>