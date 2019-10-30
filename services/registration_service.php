<?php 

    require("../connect.php");

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
    function register($username, $password, $cars){
        $conn = get_sql_connection();
        register_cars($conn, $cars, register_user($conn, $username, $password));
    }

    /**
     * @RETURNS:
     *  user_id of last inserted user
     */
    function register_user($conn, $username, $password){
        $create_user = $conn->prepare("INSERT INTO User (username, password) VALUES (?, ?)");
        $create_user->bind_param(
            "ss",
            $username,
            $password
        );
        try{
            $create_user->execute();
        }catch(Exception $e){
            echo $e->getMessage();
        }
        return mysqli_insert_id($conn);
    }


    function register_cars($conn, $cars, $user_id){
        foreach($cars as $car){
            register_single_car($conn, $car, $user_id);
        }
    }


    function register_single_car($conn, $car, $user_id){
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
            echo $e->getMessage();
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
            $insert_car->execute();
        }catch(Exception $e){
            echo $e->getMessage();
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
        }
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