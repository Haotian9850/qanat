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
     *      num_plugs: int,
     *      location: str,
     *      plugs: [{
     *                  model_no: str,
     *                  charge_speed: int
     *              },]
     *  },]  
     */
    function get_all_stations($conn){
        $conn = get_sql_connection();
        $result = Array();
        $all_stations = "SELECT * FROM Station";
        try{
            $stations = mysqli_query($conn, $all_stations);
        }catch(Exception $e){
            echo $e->getMessage();
        }
        while($row = $stations->fetch_assoc()){
            $result[] = get_plugs_for_station($row["station_ID"], $conn);
        }
        var_dump($result);
    }

    /**
     * @Returns
     *  result: list of plugs
     *  [{
     *      model_no: str,
     *      charge_speed: int
     *  },]
     */
    function get_plugs_for_station($station_id, $conn){
        $result = Array();
        $find_plugs = "SELECT DISTINCT p.model_no, q.serial_no, charge_speed FROM Hosts NATURAL JOIN Station NATURAL JOIN Plug_Model p NATURAL JOIN Plug q WHERE station_ID = '$station_id'";
        try{
            $plugs = mysqli_query($conn, $find_plugs);
        }catch(Exception $e){
            echo $e->getMessage();
        }
        while($row = $plugs->fetch_assoc()){
            $result[] = $row;
        }
        return $result;
    }

    get_all_stations(get_sql_connection());

?>
