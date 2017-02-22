/*This file was created by Christine Stoner Udacity Student Septenber 19-20, 2016.  The purpose of this
file is to load weather underground data asynchrously for the map of Dallas inline skates.*/
//This function gets the information from weatherunderground including error handling.
function loadData() {

    //This function sets a timeout to handle if the api call below does not return timely and updates the weather variables on the page accordingly.
    var weatherRequestTimeout = setTimeout(function() {
        weatherAttribString("No weather information available");
        shouldShowLogo(false);
    }, 8000);

    skate_data.forEach(function(skate) {

        var weatherUrl = 'http://forecast.weather.gov/MapClick.php?lat=' + skate.lat +'&lon=' + skate.lng + '&FcstType=json';

        /*this function calls the api to forecast.weather.gov and parses the temperature, windMph, windDir, and relative Humidity from the response.  If the
        temperature string is not as expected, the data items remain null.  Lastly, the timeout called above is cleared if the response is successful.*/

        $.ajax({
            url: weatherUrl,
            dataType: "jsonp",
            success: function(response) {
                var apiResponse = response.currentobservation;
        
                //ensure response is in expected format
               if (apiResponse.Date.slice(-1) == 'T') {
                    skate.temperature = apiResponse.Temp;
                    skate.windMph = apiResponse.Winds;
            numberWindDir = Number(apiResponse.Windd);
            if (numberWindDir == 0){
            skate.windDir = "calm";
            } else if (numberWindDir >340 && numberWindDir < 24) {
            skate.windDir = "N";
            } else if (numberWindDir >23 && numberWindDir < 70) {
            skate.windDir = "NE";
            } else if (numberWindDir >69 && numberWindDir < 115) {
            skate.windDir = "E";
            } else if (numberWindDir >114 && numberWindDir < 160) {
            skate.windDir = "SE";
            } else if (numberWindDir >159 && numberWindDir < 205) {
            skate.windDir = "S";
            } else if (numberWindDir >204 && numberWindDir < 250) {
            skate.windDir = "SW";
            } else if (numberWindDir >249 && numberWindDir < 295) {
            skate.windDir = "W";    
            } else if (numberWindDir >294 && numberWindDir < 341) {
            skate.windDir = "NW";
            } else {
            skate.windDir = "";
            }
                    skate.relHumid = apiResponse.Relh;
                } else {
                    weatherAttribString("No weather information available");
                    shouldShowLogo(false);

                }


                //clear the timeout set above
                clearTimeout(weatherRequestTimeout);
                // update the weather information
                if(skate_detail){
                    currentViewModel.updateWeatherInfo();
                }

            }
        });



    });




    return false;
}

//start the script
loadData();