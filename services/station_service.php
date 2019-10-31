<?php 


    /**
     * Testing only
     */
    require("../config.php");
    require("../connect.php");

    /**
     * @Returns
     *  result: a nested list of station objects
     *  [{
     *      station_id: int,
     *      location: str,
     *      plugs: [{
     *                  model_no: str,
     *                  charge_speed: int
     *              },]
     *  },]  
     */
    function get_all_stations(){
        $conn = get_sql_connection();
        $result = Array();
        $all_stations = "SELECT * FROM Station";
        try{
            $stations = mysqli_query($conn, $all_stations);
        }catch(Exception $e){
            echo $e->getMessage();
        }
        while($row = $stations->fetch_assoc()){
            var_dump($row);
        }
    }

    get_all_stations();

?>