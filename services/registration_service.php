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
     *      year: int
     *  }
     */
    function register($username, $password, $cars){
        register_user($username, $password);
        register_cars($cars);
    }

    /**
     * @RETURNS:
     *  user_id of last inserted user
     */
    function register_user($conn, $username, $password){
        $create_user = $conn->prepare("INSERT INTO User (username, password) VALUES (?, ?");
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
        return $mysqli->insert_id();
    }


    function register_cars($conn, $cars, $user_id){
        foreach($cars as $car){
            register_single_car($car);
        }
    }


    function register_single_car($conn, $car, $user_id){
        $insert_car = $conn->prepare(
            "INSERT INTO Vehicle (VIN, make, model, year) values (?, ?, ?, ?)"
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

?>