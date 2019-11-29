console.log("map.js")

const currLocHtml = currLocation => (
    `
    <p>${currLocation[0]}, ${currLocation[1]}</p>
    `
)

function renderLocations(){
    navigator.geolocation.getCurrentPosition((position) => {
        document.getElementById("currLatitude").innerHTML += `${position.coords.latitude}`;
        document.getElementById("currLongitude").innerHTML += `${position.coords.longitude}`;
        //console.table(<?php echo json_encode($stations); ?>);
        closestStation = getClosestChargingStation(position.coords.latitude, position.coords.longitude, stations);
        document.getElementById("closestLatitude").innerHTML += closestStation[0];
        document.getElementById("closestLongitude").innerHTML += closestStation[1];
    });
}

/**
 * 
 * @param {float} latitude 
 * @param {float} longitude 
 * @param {dict} stationLocations
 */
function getClosestChargingStation(latitude, longitude, stations){
    minDist = Math.pow(2, 53);
    closestStation = new Array();
    stations.forEach(station => {
        if(minDist > Math.pow(station["location"].split(",")[0] - latitude, 2) + Math.pow(station["location"].split(",")[1] - longitude, 2)){
            closestStation[0] = station["location"].split(",")[0].trim();
            closestStation[1] = station["location"].split(",")[1].trim();
            minDist = Math.pow(station["location"].split(",")[0] - latitude, 2) + Math.pow(station["location"].split(",")[1] - longitude, 2);
        }
    });
    console.table(closestStation);
    return closestStation;
}

renderLocations();