console.log("map.js")

function renderLocations(){
    navigator.geolocation.getCurrentPosition((position) => {
        document.getElementById("currLatitude").innerHTML += `${position.coords.latitude}`;
        document.getElementById("currLongitude").innerHTML += `${position.coords.longitude}`;
        //console.table(<?php echo json_encode($stations); ?>);
        closestStation = getClosestChargingStation(position.coords.latitude, position.coords.longitude, stations);
        document.getElementById("closestLatitude").innerHTML += closestStation[0];
        document.getElementById("closestLongitude").innerHTML += closestStation[1];
        document.getElementById("closestId").innerHTML += closestStation[2];
        document.getElementById("dist").innerHTML += distanceInKmBetweenEarthCoordinates(
            position.coords.latitude,
            position.coords.longitude,
            closestStation[0],
            closestStation[1]
        )
        document.getElementById("map").src = `https://www.bing.com/maps/embed?h=400&w=800&cp=${closestStation[0]}~${closestStation[1]}&lvl=11&typ=d&sty=r&src=SHELL&FORM=MBEDV8`;
        document.getElementById("dirMapLink").href = `https://www.bing.com/maps/directions?cp=${closestStation[0]}~${closestStation[1]}&amp;sty=r&amp;lvl=11&amp;rtp=~pos.38.0694_-78.494____&amp;FORM=MBEDLD`;
    });
}

/**
 * 
 * @param {float} latitude 
 * @param {float} longitude 
 * @param {dict} stationLocations
 */
function getClosestChargingStation(latitude, longitude, stations){
    console.table(stations)
    minDist = Math.pow(2, 53);
    closestStation = new Array();
    stations.forEach(station => {
        if(minDist > Math.pow(station["location"].split(",")[0] - latitude, 2) + Math.pow(station["location"].split(",")[1] - longitude, 2)){
            closestStation[0] = station["location"].split(",")[0].trim();
            closestStation[1] = station["location"].split(",")[1].trim();
            minDist = Math.pow(station["location"].split(",")[0] - latitude, 2) + Math.pow(station["location"].split(",")[1] - longitude, 2);
            closestStation[2] = station["station_id"];
        }
    });
    console.table(closestStation);
    return closestStation;
}


/**
 * 
 * @credit https://stackoverflow.com/questions/365826/calculate-distance-between-2-gps-coordinates
 */
function degreesToRadians(degrees) {
    return degrees * Math.PI / 180;
}

function distanceInKmBetweenEarthCoordinates(lat1, lon1, lat2, lon2) {
    const earthRadiusKm = 6371;
    var dLat = degreesToRadians(lat2-lat1);
    var dLon = degreesToRadians(lon2-lon1);
    lat1 = degreesToRadians(lat1);
    lat2 = degreesToRadians(lat2);
    var a = Math.sin(dLat/2) * Math.sin(dLat/2) +
            Math.sin(dLon/2) * Math.sin(dLon/2) * Math.cos(lat1) * Math.cos(lat2); 
    var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
    return earthRadiusKm * c;
}

renderLocations();