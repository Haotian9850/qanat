<?php 

    function login_service($username, $password){
        $conn = get_sql_connection();
        $get_user = $conn->prepare("SELECT password FROM User WHERE username = ?");
        $get_user->bind_param(
            "s",
            $username
        );
        try{
            if(!$get_user->execute()){
              throw new Exception('get_user sql failed');
            }
        }catch(Exception $e){
            echo $e->getMessage();
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