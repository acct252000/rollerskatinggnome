/*This file was created by Christine Stoner Udacity Student. This file supports a
website that shows kating trails along with weather information pulled from
the national weather service through a separate js file, weatherapi.js.*/
//model section lists variables
var model = {

    "infoWindow": null,
    "mapCoordinates": {
        center: {
            lat: 32.947205,
            lng: -96.821501
        },
        zoom: 11
    },
};

var weatherAttribString;
var shouldShowLogo;

//viewModel section using knockoutjs
var ViewModel = function() {

    var self = this;
    //establish observable array for list of skates and observables for other variables  
    this.skateList = ko.observableArray([]);
    this.allSkateList = ko.observableArray([]);
    this.minMiles = ko.observable(0);
    this.maxMiles = ko.observable(1000);
    this.zipCode = ko.observable('');
    this.cityState = ko.observable('');
    this.lat = ko.observable(0.0);
    this.lng = ko.observable(0.0);
    this.showAForm = ko.observable(false);
    this.formAddress = ko.observable('123 Main Street, Denver, CO 12345');
    this.filter = ko.observable('');
    this.allFilter = ko.observable('');
    this.showNavBar = ko.observable(false);
    this.formValidation = ko.observable('');
    this.currentSkate = {
        name: ko.observable('not updated'),
        parking_location: ko.observable(),
        parking_cost: ko.observable(),
        length: ko.observable(0.0),
        skate_info: ko.observable(),
        group_skates: ko.observable(),
        temperature: ko.observable('Loading...'),
        windMph: ko.observable(),
        windDir: ko.observable(),
        relHumid: ko.observable(),
        primaryPicture: ko.observable()
    };
    //establish observables for new trail form
    self.newTrailForm = {
        name: ko.observable(),
        lat: ko.observable(0.0),
        lng: ko.observable(0.0),
        formAddress: ko.observable('123 Main Street, Denver, CO 12345'),
        parking_location: ko.observable(),
        parking_cost: ko.observable(),
        skate_length: ko.observable(),
        info: ko.observable(),
        group: ko.observable(),
        web: ko.observable(),
        email: ko.observable(),
        submit: ko.observable(false)
    };
    // establish observable for errorList
    this.errorList = ko.observableArray([]);
    // establish observable for form error message
    this.formMessage = ko.observable('');
    //establish observable for weather message and logo
    weatherAttribString = ko.observable("Weather information provided by the National Weather Service");
    shouldShowLogo = ko.observable(true);


    //add all skates to initial skatelists and set current skate.
    skate_data.forEach(function(skate) {
        self.skateList.push(skate);
        self.allSkateList.push(skate);
        if (skate_detail) {
            if (skate.id == current_skate_id) {
                self.currentSkate.name(skate.trailName);
                self.currentSkate.parking_location(skate.parkingSpot);
                self.currentSkate.parking_cost(skate.parkingCost);
                self.currentSkate.length(skate.length);
                self.currentSkate.skate_info(skate.skateInfo);
                self.currentSkate.group_skates(skate.groupSkates);
            }


        }

    });
    // if skate_detail page is displayed, assign primary picture pullled from database via php
    if (skate_detail) {
        self.currentSkate.primaryPicture(primary_picture);
    }
    // update weather information for all skates from weatherapi
    self.updateWeatherInfo = function() {
        skate_data.forEach(function(skate) {
            if (skate_detail) {
                if (skate.id == current_skate_id) {
                    self.currentSkate.temperature(skate.temperature);
                    self.currentSkate.windDir(skate.windDir);
                    self.currentSkate.windMph(skate.windMph);
                    self.currentSkate.relHumid(skate.relHumid);

                }


            }

        });
    };

    //reset map to user input zipcode or city, state
    self.resetMap = function() {
        var address;

        if (this.zipCode()) {
            address = this.zipCode();
        }
        geocoder.geocode({
            'address': address
        }, function(results, status) {
            if (status == 'OK') {
                map.setCenter(results[0].geometry.location);

            } else {
                alert('Geocode was not successful for the following reason: ' + status);
            }

        });

    };
    //callback to update latitude and longitude observables from form geocoding
    self.updateLtLg = function(currentLat, currentLng) {

        
        this.newTrailForm.lat(currentLat);
        this.newTrailForm.lng(currentLng);
        self.formMessage('');

    };
    //geoCode address input into form
    self.geoCodeInput = function() {
        self.formMessage('Processing . . .');
        var address;
        var currentLat;
        var currentLng;


        if (this.formAddress()) {
            address = this.formAddress();

        }
        form_geocoder.geocode({
            'address': address
        }, function(results, status) {
            if (status == 'OK') {
                
                currentLat = results[0].geometry.location.lat();
                currentLng = results[0].geometry.location.lng();
                self.updateLtLg(currentLat, currentLng);

            } else {
                alert('Geocode was not successful for the following reason: ' + status);
            }

        });

        this.showAForm(false);

    };
    //submit form data from new trail to php
    self.submitNewTrail = function() {
        self.newTrailForm.submit(false);
        //scroll to top of form where message is displayed
        document.body.scrollTop = document.documentElement.scrollTop = 0;
        //display processing message while waiting for results
        self.formMessage('Processing . . .');
        /*establish error list and count; errors increase error count and add to errorList
        error List is observable so automatically update for array*/
        self.errorList([]);
        error_count = 0;
        //validate name of trail is between 5 and 100 characters
        if (self.newTrailForm.name().length > 100 || self.newTrailForm.name().length < 6) {
            self.errorList.push({
                input_error: ' Length of name must be between 5 and 100 characters'
            });
            error_count += 1;
        }
        //validate latitude is a number between -90 and 90 inclusive
        if (isNaN(self.newTrailForm.lat())) {
            self.errorList.push({
                input_error: 'Latitude must be numeric'
            });
            error_count += 1;
        } else if (self.newTrailForm.lat() < -90 || self.newTrailForm.lat() > 90) {
            self.errorList.push({
                input_error: 'Lattitude must be between -90 and 90'
            });
            error_count += 1;
        }
        //validate longtitude is a number between 0 and 180 inclusive
        if (isNaN(self.newTrailForm.lng())) {
            self.errorList.push({
                input_error: 'Longitude must be numeric'
            });
            error_count += 1;
        } else if (self.newTrailForm.lng() < 0 || self.newTrailForm.lng() > 180) {
            self.errorList.push({
                input_error: 'Longitude must be between 0 and 180'
            });
            error_count += 1;
        }
        //validate trail length is numeric between 1 and 100 miles
        if (isNaN(self.newTrailForm.skate_length())) {
            self.errorList.push({
                input_error: 'Length must be numeric'
            });
            error_count += 1;
        } else if (self.newTrailForm.skate_length() < 0 || self.newTrailForm.skate_length() > 1000) {
            self.errorList.push({
                input_error: 'Length must be between 0 and 1000'
            });
            error_count += 1;
        }
        //fail submit process if validation error exists
        if (error_count > 0) {
            return;
        }
        //set submit to True for submittal
        self.newTrailForm.submit(true);
        //encode newTrailForm observables to JSON for passing to PHP
        var dataString = ko.toJS({
            dataString: self.newTrailForm
        });
        //send data to PHP via ajax
        $.ajax({
            url: "newtrailprocessing.php",
            type: "POST",
            dataType: "json",
            data: dataString,
            success: function(response) {

                jsonResponse = '';
                var current_error;
                self.formMessage(response.message);
                //reset form if submit successful
                if (response.error === null) {
                    //reset form values to zero
                    self.newTrailForm.name('');
                    self.newTrailForm.lat(0.0);
                    self.newTrailForm.lng(0.0);
                    self.newTrailForm.formAddress('123 Main Street, Denver, CO 12345');
                    self.newTrailForm.parking_location('');
                    self.newTrailForm.parking_cost('');
                    self.newTrailForm.skate_length(0.0);
                    self.newTrailForm.info('');
                    self.newTrailForm.group('');
                    self.newTrailForm.web('');
                    self.newTrailForm.email('');
                } else {
                    response.errors.forEach(function(item) {
                        //display errors if submit not successful
                        self.errorList.push({
                            input_error: item
                        });
                    });
                }
            }

        });
    };
    //call to get current user location
    self.getUserLocation = function() {
        self.formMessage('Processing . . .');
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(self.updatePosition);
        }



    };
    //callback to get user location from web service
    self.updatePosition = function(position) {
        webLat = position.coords.latitude;
        webLng = position.coords.longitude;
        self.positionCallback(webLat, webLng);

    };
    //callback to update ko observables for web service user location
    self.positionCallback = function(lat, lng) {
        this.newTrailForm.lat(lat);
        this.newTrailForm.lng(lng);
        self.formMessage('');
    };

    /*reset skateList to those visible on map*/
    self.filterSkateLocation = function() {

        self.skateList.removeAll();
        skate_data.forEach(function(skate) {
            if (skate.lat > sw.lat() && skate.lat < ne.lat() && skate.lng < ne.lng() && skate.lng > sw.lng()) {
                skate.marker.setMap(map);
                self.skateList.push(skate);
            } else {
                skate.marker.setMap(null);
            }
        });
    };
    //animate marker and show infoWindow when the list is clicked, passing in the skate clicked.
    self.clickSkate = function(skate) {

        view.animateMarker(skate.marker);
        view.showInfoWindow(skate.marker, model.infoWindow);
    };

    /*validate form input and filter skates by minimum and maximum miles input, passing in input from website
    for minimum and maximum miles*/
    self.filterResults = function() {
        var minNo = Number(this.minMiles());
        var maxNo = Number(this.maxMiles());
        if (isNaN(minNo) || isNaN(maxNo) || minNo < 0 || maxNo < 0) {
            this.formValidation('Please enter positive numbers in the input fields');
            return;

        }
        if (maxNo < minNo) {
            this.formValidation('Please enter a maximum number higher than a minimum');
            return;
        }
        this.formValidation('');
        self.skateList.removeAll();
        skate_data.forEach(function(skate) {
            if (skate.length >= minNo && skate.length <= maxNo) {
                skate.marker.setMap(map);
                self.skateList.push(skate);
            } else {
                skate.marker.setMap(null);
            }
        });
    };
    //remove filter and add all skates back to map, called form remove filter button
    self.unFilterResults = function() {
        this.formValidation('');
        self.skateList.removeAll();
        skate_data.forEach(function(skate) {
            skate.marker.setMap(map);
            self.skateList.push(skate);
        });
    };
    //filter map markers bound to text filter input box
    self.textFilterSkates = function(element) {

        var skateNames = [];
        self.filteredSkates().forEach(function(skate) {
            skateNames.push(skate.trailName);
            
        });
        skate_data.forEach(function(skate) {
            if (skateNames.indexOf(skate.trailName) > -1) {
                skate.marker.setMap(map);
            } else {
                skate.marker.setMap(null);
            }

        });

    };

    //filter displayed skates bound to text filter input box
    self.filteredSkates = ko.computed(function() {
        var filter = this.filter().toLowerCase();
        if (!filter) {


            return this.skateList();

        } else {
            return ko.utils.arrayFilter(this.skateList(), function(skate) {
                return skate.trailName.toLowerCase().indexOf(filter) !== -1;
            });

        }
    }, self);
    //filter all skates for all skates text search
    self.allFilteredSkates = ko.computed(function() {
        var allFilter = this.allFilter().toLowerCase();
        if (!allFilter) {


            return;

        } else {
            return ko.utils.arrayFilter(this.allSkateList(), function(skate) {
                return skate.trailName.toLowerCase().indexOf(allFilter) !== -1;
            });

        }
    }, self);
    //show navigation menu
    self.showMenu = function() {
        this.showNavBar(true);
    };
    //hide navigation menu
    self.hideMenu = function() {
        this.showNavBar(false);
    };
    //hide navigation menu
    self.showAddressForm = function() {
        this.showAForm(true);
    };


};

var map;
var geocoder;
var form_geocoder;
var bounds;
var ne;
var sw;
var currentViewModel = new ViewModel();

//set Timeout function to return error message if google is not available
if (!skate_detail) {
    var mapsTimeout = setTimeout(function() {
        if (!window.google || !window.google.maps) {
            var element = document.getElementById('map');
            element.innerHTML = 'So sorry, the map did not load. Please refresh to try again.  Peace, skate, love my brother or sister.';
        }
    }, 5000);
}

/*initialize google map passing in map coordinates from model and set markers based on information
in skate_data*/
function initMap() {

    map = new google.maps.Map(document.getElementById('map'), model.mapCoordinates);
    geocoder = new google.maps.Geocoder();
    map.addListener('bounds_changed', function() {
        bounds = map.getBounds();
        ne = bounds.getNorthEast();
        sw = bounds.getSouthWest();
        currentViewModel.filterSkateLocation();
        
    });
    var markers = [];
    model.infoWindow = new google.maps.InfoWindow();
    var latlng = {
        lat: 0,
        lng: 0
    };
    skate_data.forEach(function(skate) {
        latlng.lat = skate.lat;
        latlng.lng = skate.lng;
        var marker = new google.maps.Marker({
            position: latlng,
            title: skate.trailName,
            map: map
        });

        marker.addListener('click', function() {
            view.animateMarker(this);
            view.showInfoWindow(this, model.infoWindow);


        });



        marker.setAnimation(null);

        markers.push(marker);
        skate.marker = marker;
    });
    clearTimeout(mapsTimeout);

}
//initialize map 
function initMapForm() {

    form_geocoder = new google.maps.Geocoder();
    



}


//intialize with knockout

ko.applyBindings(currentViewModel);


//view section 
var view = {
    //animateMarker with marker input to toggle between bouncing and null   
    animateMarker: function(marker) {

        if (marker.getAnimation() !== null) {
            marker.setAnimation(null);
        } else {
            marker.setAnimation(google.maps.Animation.BOUNCE);
        }


    },
    /*shows the infoWindow based on the passed in marker and infoWindow; called upoon click
    allows for closing the infoWindo when close button is clicked*/
    showInfoWindow: function(marker, infoWindow) {


        var currentTemp;
        var currentWindMph;
        var currentWindDir;
        var currentRelativeHumidity;
        var skateLength;


        skate_data.forEach(function(skate) {

            if (marker == skate.marker) {
                currentTemp = skate.temperature;
                currentWindMph = skate.windMph;
                currentWindDir = skate.windDir;
                currentRelativeHumidity = skate.relHumid;
                skateLength = skate.length;
                skate_number = skate.id;



            }

        });

        var htmlWindowString = view.generateHtmlString(currentTemp, currentWindMph, currentWindDir, currentRelativeHumidity);


        if (infoWindow.marker != marker) {
            infoWindow.marker = marker;
            //infoWindow.setContent('<h5>' + marker.title + '</h5>');
            infoWindow.setContent('<b><a href="traildetail.php?skate=' + skate_number + '">' + marker.title + '</b></a><br>Length: ' + skateLength + ' miles<br>' + htmlWindowString);
            infoWindow.open(map, marker);

            infoWindow.addListener('closeclick', function() {
                infoWindow.marker = null;

            });
        }




    },

    /*This function takes the current weather information for the marker or list item clicked, which will be null if not populated by apiscripts,
    and generates an html string for those that are not none to be displayed in the infoWindow*/

    generateHtmlString: function(currentTemp, currentWindMph, currentWindDir, currentRelativeHumidity) {

        var currentTempString = '';
        var currentWindMphString = '';
        var currentWindDirString = '';
        var currentRelativeHumidityString = '';
        var htmlString = '';

        if (currentTemp) {
            currentTempString = 'Temperature: ' + currentTemp + '<br>';
        }
        if (currentWindMph) {
            currentWindMphString = 'Wind: ' + currentWindMph + ' MPH ';
        }
        if (currentWindDir) {
            currentWindDirString = currentWindDir + '<br>';
        }
        if (currentRelativeHumidity) {
            currentRelativeHumidityString = 'Humidity: ' + currentRelativeHumidity + '<br>';
        }

        return htmlString.concat(currentTempString, currentWindMphString, currentWindDirString, currentRelativeHumidityString);


    }



};