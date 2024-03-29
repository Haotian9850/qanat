<?php

    /**
     * @PARAMS:
     *  username: str
     *  password: str
     *  cars: dict of car object
     *  {
     *      VIN: str
     *      make: str
     *      model: str
     *      year: int
     *  }
     */
    function register_user_service($username, $password){
        $conn = get_sql_connection();
        $user = register_user($conn, $username, $password);
        if(!$user){
          return NULL;
        }
        return 1;
    }
    function register_cars_service($cars, $username){
        $conn = get_sql_connection();
        $cars_ret = register_cars($conn, $cars, $username);
        if(!$cars_ret){
          return NULL;
        }
        return 1;
    }
    function unregister_car_service($vin, $username){
        $conn = get_sql_connection();
        $car_ret = unregister_single_car($conn, $vin, $username);
        if(!$car_ret){
          return NULL;
        }
        return 1;
    }

    function user_exists($conn, $username){
      $create_user = $conn->prepare("SELECT * FROM User where username=?");
      $create_user->bind_param("s",$username);
      if(!$create_user->execute() || !$create_user->store_result()){
        throw new Exception('user_exists failed');
      }

      $rows = $create_user->num_rows;
      return $rows > 0;
    }

    
    /**
     * @RETURNS:
     *  user_id of last inserted user
     */
    function register_user($conn, $username, $password){
        if(user_exists($conn, $username)){
          $_SESSION["errMsg"] = "Cannot create user ".$username." (username taken)";
          return NULL;
        }

        // $conn->prepare("SELECT * FROM User WHERE username=\"?\"");
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $create_user = $conn->prepare("INSERT INTO User (username, password) VALUES (?, ?)");
        $create_user->bind_param(
            "ss",
            $username,
            $hash
        );
        try{
            if(!$create_user->execute()){
              throw new Exception('create_user sql failed');
            }
        }catch(Exception $e){
            echo $e->getMessage();
            return NULL;
        }
        return mysqli_insert_id($conn);
    }


    function register_cars($conn, $cars, $username){
        $get_id = $conn->prepare("SELECT user_id FROM User WHERE username = ?");
        $get_id->bind_param("s",$username);
        $get_id->execute();
        $result = $get_id->get_result();
        while($row = $result->fetch_assoc()){
            $user_id = $row["user_id"];
        }
        foreach($cars as $car){
            if(!register_single_car($conn, $car, $user_id)){
              return NULL;
            }
        }
        return 1;
    }


    function register_single_car($conn, $car, $user_id){

        // TODO: Don't insert the car type every time (duplicates)
        $insert_car_type = $conn->prepare(
            "INSERT INTO Car_Type (make, model, year) VALUES (?, ?, ?)"
        );
        $insert_car_type->bind_param(
            "ssi",
            $car->make,
            $car->model,
            $car->year
        );

        try{
            $insert_car_type->execute();
        }catch(Exception $e){
            $_SESSION["errMsg"] = "Cannot add vehicle: ".$insert_car_type->error;
        }

        $insert_car = $conn->prepare(
            "INSERT INTO Vehicle (VIN, make, model, year) VALUES (?, ?, ?, ?)"
        );
        $insert_car->bind_param(
            "sssi",
            $car->VIN,
            $car->make,
            $car->model,
            $car->year
        );
        try{
            if(!$insert_car->execute()){
              $_SESSION["errMsg"] = "Unable to add vehicle information";
              throw new Exception("SQL failed: ".$insert_car->error);
            }
        }catch(Exception $e){
            echo $e->getMessage();
            return NULL;
        }

        $insert_ownership = $conn->prepare(
            "INSERT INTO Owns (VIN, user_id) VALUES (?, ?)"
        );
        $insert_ownership->bind_param(
            "ss",
            $car->VIN,
            $user_id
        );
        try{
            $insert_ownership->execute();
        }catch(Exception $e){
            echo $e->getMessage();
            return NULL;
        }
        return 1;
    }

    function unregister_single_car($conn, $vin, $username) {
        $get_id = $conn->prepare("SELECT user_id FROM User WHERE username = ?");
        $get_id->bind_param("s",$username);
        $get_id->execute();
        $result = $get_id->get_result();
        while($row = $result->fetch_assoc()){
            $user_id = $row["user_id"];
        }

        $remove_ownership = $conn->prepare(
            "DELETE FROM Owns WHERE VIN=? and user_id=?"
        );
        $remove_ownership->bind_param("ss", $vin, $user_id);
        try{
            $remove_ownership->execute();
        }catch(Exception $e){
            echo $e->getMessage();
            return NULL;
        }

        $remove_car = $conn->prepare("DELETE FROM Vehicle WHERE VIN=?");
        $remove_car->bind_param("s",$vin);
        try{
            if(!$remove_car->execute()){
              $_SESSION["errMsg"] = "Unable to remove vehicle";
              throw new Exception("SQL failed: ".$remove_car->error);
            }
        }catch(Exception $e){
            echo $e->getMessage();
            return NULL;
        }
        return 1;
    }

?>
