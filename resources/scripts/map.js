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
        document.getElementById("map").src = `https://www.google.com/maps/embed/v1/place?key=AIzaSyDUm4F4uF7GDdNQ_kE7m6x61ePJuobh_fI&q=${closestStation[0]},${closestStation[1]}&zoom=12`;
        document.getElementById("dirMapLink").href = `https://www.google.com/maps/dir/'${position.coords.latitude},${position.coords.longitude}'/${closestStation[0]},${closestStation[1]}/@${position.coords.latitude},${position.coords.longitude}z/`;
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
        if(minDist > distanceInKmBetweenEarthCoordinates(latitude, longitude, station["location"].split(",")[0], station["location"].split(",")[1])){
            closestStation[0] = station["location"].split(",")[0];
            closestStation[1] = station["location"].split(",")[1];
            closestStation[2] = station["station_id"];
            minDist = distanceInKmBetweenEarthCoordinates(latitude, longitude, station["location"].split(",")[0], station["location"].split(",")[1]);
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