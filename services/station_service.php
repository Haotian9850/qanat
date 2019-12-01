<?php

    function get_all_my_plugs($username){
        if($username == "visitor"){
            return Array();
        }
        $conn = get_sql_connection();
        $all_my_plugs = $conn->prepare("SELECT model_no FROM User NATURAL JOIN Owns NATURAL JOIN Vehicle NATURAL JOIN Supports WHERE username=?");
        $all_my_plugs->bind_param(
            "s",
            $username
        );
        try{
            $all_my_plugs->execute();
            $all_my_plugs->bind_result($plug);
        }catch(Exception $e){
            echo $e->getMessage();
        }
        $out = Array();
        while($all_my_plugs->fetch()){
            array_push($out,$plug);
        }
        $conn->close();
        return $out;
    }
    


    function get_num_compatible($plugs){
        $out = 0;
        foreach($plugs as $plug){
            if($plug["compatible"] == "true"){
                $out++;
            }
        }
        return $out;
    }

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
    function get_all_stations($username){
        $conn = get_sql_connection();
        $result = Array();
        $all_stations = "SELECT * FROM Station";
        try{
            $stations = mysqli_query($conn, $all_stations);
        }catch(Exception $e){
            echo $e->getMessage();
        }
        if(!$stations){
          return $result;
        }
        while($row = $stations->fetch_assoc()){
            $plugs = get_plugs_for_station($username, $row["station_ID"], $conn);
            $result[] = Array(
                "station_id"=>$row["station_ID"],
                "num_plugs"=>$row["num_plugs"],
                "location"=>implode(explode("&", $row["location"]), ", "),
                "plugs"=>$plugs,
                "num_compatible"=>get_num_compatible($plugs)
            );
        }
        //var_dump($result);
        return $result;
    }


    /*

    /**
     * @Returns
     *  result: list of plugs
     *  [{
     *      model_no: str,
     *      charge_speed: int
     *  },]
     */
    function get_plugs_for_station($username, $station_id, $conn){
        $my_plugs = get_all_my_plugs($username);
        $result = Array();
        $find_plugs = "SELECT DISTINCT p.model_no, q.serial_no, charge_speed FROM Hosts NATURAL JOIN Station NATURAL JOIN Plug_Model p NATURAL JOIN Plug q WHERE station_ID = '$station_id'";
        try{
            $plugs = mysqli_query($conn, $find_plugs);
        }catch(Exception $e){
            echo $e->getMessage();
        }
        $i = 0;
        while($row = $plugs->fetch_assoc()){
            $result[] = $row;
            if(in_array($row["model_no"], $my_plugs)){
                $result[$i]["compatible"] = "true";
            }else{
                $result[$i]["compatible"] = "false";
            }
            $i++;
        }
        return $result;
    }
    

?>
