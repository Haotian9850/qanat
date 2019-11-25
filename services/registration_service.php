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
    function register_service($username, $password, $cars){
        $conn = get_sql_connection();
        $user = register_user($conn, $username, $password);
        if(!$user){
          return NULL;
        }
        return register_cars($conn, $cars,$user);
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

        if(strlen($password) == 0){
          $_SESSION["errMsg"] = "Can't have an empty password";
          return NULL;
        }

        if(strlen($username) == 0){
          $_SESSION["errMsg"] = "Can't have an empty username";
          return NULL;
        }

        if(user_exists($conn,$username)){
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


    function register_cars($conn, $cars, $user_id){
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
            if(!$insert_car_type->execute()){
              // $_SESSION["errMsg"] = "Unable to add vehicle information";
              throw new Exception("SQL failed: ".$insert_car_type->error);
            }
        }catch(Exception $e){
            echo $e->getMessage();
            return NULL;
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



    /*
    $arr = Array();
    $arr[] = (object)array(
        "VIN"=>"123456ASDDF",
        "make"=>"Ford",
        "model"=>"Fiesta",
        "year"=>2019
    );
    register("haotian", "123456", $arr);
    */

?>
