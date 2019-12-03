<?php

    function export(){
        if (isset($_SESSION["username"])) {
            $user = $_SESSION["username"];

            $stations = get_all_stations($_SESSION["username"]);

            echo "station_ID,latitude,longitude,model,serial_no,charge_speed,compatible\n";

            foreach($stations as $station){
                
                foreach($station["plugs"] as $plug){
                    // $plug["compatible"]
                    echo 
                    htmlspecialchars($station["station_id"], ENT_QUOTES, 'UTF-8').",".
                    htmlspecialchars($station["location"], ENT_QUOTES, 'UTF-8').",".
                    htmlspecialchars($plug["model_no"], ENT_QUOTES, 'UTF-8').",".
                    htmlspecialchars($plug["serial_no"], ENT_QUOTES, 'UTF-8').",".
                    htmlspecialchars($plug["charge_speed"], ENT_QUOTES, 'UTF-8').",".
                    htmlspecialchars($plug["compatible"], ENT_QUOTES, 'UTF-8').

                    "\n";
                }
            }


            // get_all_my_plugs($user);
        }
    }
   

?>
