/*This file was created by Christine Stoner Udacity Student Septenber 19-20, 2016. This file supports a
website that shows five skating trails in the Dallas area along with weather information pulled from
weater underground through a separate js file, weatherpi.js.*/
//model section lists variables and skate information
var model = {

    "infoWindow": null,
    "mapCoordinates": {
        center: {
            lat: 32.947205,
            lng: -96.821501
        },
        zoom: 11
    },

    "skates": [

        {
            "location": {
                "lat": 32.8806329,
                "lng": -96.9312469
            },
            "trailName": "Campion Trail",
            "parkingSpot": "Birds' Fort Trail Park",
            "length": 14,
            "marker": null,
            "pws": "KTXIRVIN7",
            "temperature": null,
            "windMph": null,
            "windDir": null,
            "relHumid": null

  },
 {
            "location": {
                "lat": 32.8806329,
                "lng": -96.9312469
            },
            "trailName": "Campion Trail1",
            "parkingSpot": "Birds' Fort Trail Park",
            "length": 14,
            "marker": null,
            "pws": "KTXIRVIN7",
            "temperature": null,
            "windMph": null,
            "windDir": null,
            "relHumid": null

  },
 {
            "location": {
                "lat": 32.8806329,
                "lng": -96.9312469
            },
            "trailName": "Campion Trail2",
            "parkingSpot": "Birds' Fort Trail Park",
            "length": 14,
            "marker": null,
            "pws": "KTXIRVIN7",
            "temperature": null,
            "windMph": null,
            "windDir": null,
            "relHumid": null

  },
 {
            "location": {
                "lat": 32.8806329,
                "lng": -96.9312469
            },
            "trailName": "Campion Trail3",
            "parkingSpot": "Birds' Fort Trail Park",
            "length": 14,
            "marker": null,
            "pws": "KTXIRVIN7",
            "temperature": null,
            "windMph": null,
            "windDir": null,
            "relHumid": null

  },
 {
            "location": {
                "lat": 32.8806329,
                "lng": -96.9312469
            },
            "trailName": "Campion Trail4",
            "parkingSpot": "Birds' Fort Trail Park",
            "length": 14,
            "marker": null,
            "pws": "KTXIRVIN7",
            "temperature": null,
            "windMph": null,
            "windDir": null,
            "relHumid": null

  },
 {
            "location": {
                "lat": 32.8806329,
                "lng": -96.9312469
            },
            "trailName": "Campion Trail5",
            "parkingSpot": "Birds' Fort Trail Park",
            "length": 14,
            "marker": null,
            "pws": "KTXIRVIN7",
            "temperature": null,
            "windMph": null,
            "windDir": null,
            "relHumid": null

  },
 {
            "location": {
                "lat": 32.8806329,
                "lng": -96.9312469
            },
            "trailName": "Campion Trail6",
            "parkingSpot": "Birds' Fort Trail Park",
            "length": 14,
            "marker": null,
            "pws": "KTXIRVIN7",
            "temperature": null,
            "windMph": null,
            "windDir": null,
            "relHumid": null

  },
 {
            "location": {
                "lat": 32.8806329,
                "lng": -96.9312469
            },
            "trailName": "Campion Trail7",
            "parkingSpot": "Birds' Fort Trail Park",
            "length": 14,
            "marker": null,
            "pws": "KTXIRVIN7",
            "temperature": null,
            "windMph": null,
            "windDir": null,
            "relHumid": null

  },
 {
            "location": {
                "lat": 32.8806329,
                "lng": -96.9312469
            },
            "trailName": "Campion Trail8",
            "parkingSpot": "Birds' Fort Trail Park",
            "length": 14,
            "marker": null,
            "pws": "KTXIRVIN7",
            "temperature": null,
            "windMph": null,
            "windDir": null,
            "relHumid": null

  },
 {
            "location": {
                "lat": 32.8806329,
                "lng": -96.9312469
            },
            "trailName": "Campion Trail9",
            "parkingSpot": "Birds' Fort Trail Park",
            "length": 14,
            "marker": null,
            "pws": "KTXIRVIN7",
            "temperature": null,
            "windMph": null,
            "windDir": null,
            "relHumid": null

  },
 {
            "location": {
                "lat": 32.8806329,
                "lng": -96.9312469
            },
            "trailName": "Campion Trail10",
            "parkingSpot": "Birds' Fort Trail Park",
            "length": 14,
            "marker": null,
            "pws": "KTXIRVIN7",
            "temperature": null,
            "windMph": null,
            "windDir": null,
            "relHumid": null

  },
 {
            "location": {
                "lat": 32.8806329,
                "lng": -96.9312469
            },
            "trailName": "Campion Trail11",
            "parkingSpot": "Birds' Fort Trail Park",
            "length": 14,
            "marker": null,
            "pws": "KTXIRVIN7",
            "temperature": null,
            "windMph": null,
            "windDir": null,
            "relHumid": null

  },
 {
            "location": {
                "lat": 32.8806329,
                "lng": -96.9312469
            },
            "trailName": "Campion Trail12",
            "parkingSpot": "Birds' Fort Trail Park",
            "length": 14,
            "marker": null,
            "pws": "KTXIRVIN7",
            "temperature": null,
            "windMph": null,
            "windDir": null,
            "relHumid": null

  },
        {
            "location": {
                "lat": 32.9574412,
                "lng": -96.6762328
            },
            "trailName": "Test Trail",
            "parkingSpot": "Oak Point Nature Center",
            "length": 9,
            "marker": null,
            "pws": "KTXPLANO203",
            "temperature": null,
            "windMph": null,
            "windDir": null,
            "relHumid": null

  },

        {
            "location": {
                "lat": 33.0574412,
                "lng": -96.8262328
            },
            "trailName": "Test 2Trail",
            "parkingSpot": "Oak Point Nature Center",
            "length": 9,
            "marker": null,
            "pws": "KTXPLANO203",
            "temperature": null,
            "windMph": null,
            "windDir": null,
            "relHumid": null

  },

        {
            "location": {
                "lat": 33.0574412,
                "lng": -96.6762328
            },
            "trailName": "Oak Point Trail",
            "parkingSpot": "Oak Point Nature Center",
            "length": 9,
            "marker": null,
            "pws": "KTXPLANO203",
            "temperature": null,
            "windMph": null,
            "windDir": null,
            "relHumid": null

  },
        {
            "location": {
                "lat": 33.0223932,
                "lng": -96.7139285
            },
            "trailName": "Chisholm Trail",
            "parkingSpot": "Plano Senior Center",
            "length": 6,
            "marker": null,
            "pws": "KTXRICHA43",
            "temperature": null,
            "windMph": null,
            "windDir": null,
            "relHumid": null
  },
        {
            "location": {
                "lat": 32.9256216,
                "lng": -96.786438
            },
            "trailName": "White Rock Trail",
            "parkingSpot": "Valley View Park",
            "length": 14,
            "marker": null,
            "pws": "KTXDALLA304",
            "temperature": null,
            "windMph": null,
            "windDir": null,
            "relHumid": null
  },
        {
            "location": {
                "lat": 32.9972092,
                "lng": -96.7344246
            },
            "trailName": "Renner Trail",
            "parkingSpot": "Custer Park",
            "length": 5,
            "marker": null,
            "pws": "KTXRICHA54",
            "temperature": null,
            "windMph": null,
            "windDir": null,
            "relHumid": null
  },
	 {
            "location": {
                "lat": 32.7775222,
                "lng": -97.1004047
            },
            "trailName": "River Legacy Trail",
            "parkingSpot": "River Legacy Park",
            "length": 7,
            "marker": null,
            "pws": "KTXRICHA54",
            "temperature": null,
            "windMph": null,
            "windDir": null,
            "relHumid": null
  },
	{
            "location": {
                "lat": 33.020482,
                "lng": -96.8713641
            },
            "trailName": "Nob Hill Greenbelt",
            "parkingSpot": "Branch Hollow Park",
            "length": 5,
            "marker": null,
            "pws": "KTXRICHA54",
            "temperature": null,
            "windMph": null,
            "windDir": null,
            "relHumid": null
  }
	

  ]
};

var weatherAttribString;
var shouldShowLogo;

//viewModel section using knockoutjs
var ViewModel = function(skate_data) {

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
    //establish observables for new trail form
    self.newTrailForm = {
            name: ko.observable(),
            lat: ko.observable(0.0),
            lng: ko.observable(0.0),
            formAddress: ko.observable('123 Main Street, Denver, CO 12345'),
            parking_location: ko.observable(),
            parking_cost: ko.observable(),
            length: ko.observable(),
            info: ko.observable(),
            group: ko.observable(),
            web: ko.observable(),
            email: ko.observable()
    };

    weatherAttribString = ko.observable("Weather information provided by the National Weather Service");
    shouldShowLogo = ko.observable(true);
   
   
    //add all skates to initial skatelists.
    skate_data.forEach(function(skate) {
        self.skateList.push(skate);
	self.allSkateList.push(skate);

    });
    //reset map to user input zipcode or city, state
    self.resetMap = function(){
        var address;
         
	if (this.zipCode()){
		address = this.zipCode();
	} 
        geocoder.geocode({'address':address}, function(results, status){
        if (status == 'OK'){
		map.setCenter(results[0].geometry.location);
                	
	} else {
		alert('Geocode was not successful for the following reason: ' + status)
	}

	});

    }
    //callback to update latitude and longitude observables from form geocoding
    self.updateLtLg = function(currentLat, currentLng){

	console.log(currentLat);
	console.log(currentLng);
	this.lat(currentLat);
	this.lng(currentLng);
	
	}
    //geoCode address input into form
    self.geoCodeInput = function(){
        var address;
	var currentLat;
        var currentLng;
	
         
	if (this.formAddress()){
		address = this.formAddress();
		
	} 
        form_geocoder.geocode({'address':address}, function(results, status){
        if (status == 'OK'){
		console.log("status ok");
		currentLat = results[0].geometry.location.lat();
		currentLng = results[0].geometry.location.lng();
		self.updateLtLg(currentLat, currentLng);
		             	
	} else {
		alert('Geocode was not successful for the following reason: ' + status)
	}

	});
	
        this.showAForm(false);

    }
    //submit form data from new trail to php
    self.submitNewTrail = function(){
        console.log("submit new trail called");
        var data = ko.toJS({"data":self.newTrailForm});
        console.log(data);
        $.ajax({
            url: "newtrail.php",
            type: 'post',
            data: data

        });
    }
    //call to get current user location
    self.getUserLocation = function(){
	if (navigator.geolocation) {
        	navigator.geolocation.getCurrentPosition(self.updatePosition);
    	} 



    }
    //callback to get user location from web service
    self.updatePosition = function(position){
	webLat = position.coords.latitude;
	webLng = position.coords.longitude;
	self.positionCallback(webLat, webLng);

	}
    //callback to update ko observables for web service user location
    self.positionCallback = function(lat, lng){
	this.lat(lat);
	this.lng(lng);
	}

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
            console.log(skateNames);
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
var currentViewModel = new ViewModel(skate_data);

//set Timeout function to return error message if google is not available
var mapsTimeout = setTimeout(function() {
    if (!window.google || !window.google.maps) {
        var element = document.getElementById('map');
        element.innerHTML = 'So sorry, the map did not load. Please refresh to try again.  Peace, skate, love my brother or sister.';
    }
}, 5000);

/*initialize google map passing in map coordinates from model and set markers based on information
in skate_data*/
function initMap() {

    map = new google.maps.Map(document.getElementById('map'), model.mapCoordinates);
    geocoder = new google.maps.Geocoder()
    map.addListener('bounds_changed', function(){
        bounds = map.getBounds();
        ne = bounds.getNorthEast();
        sw = bounds.getSouthWest();
	currentViewModel.filterSkateLocation();
        console.log("bounds changed fired here!");
	});
    var markers = [];
    model.infoWindow = new google.maps.InfoWindow();
    var latlng = {lat: 0, lng: 0};
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

function initMapForm() {

    form_geocoder = new google.maps.Geocoder();
   console.log("initMapForm called");
    
  

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


            }

        });

        var htmlWindowString = view.generateHtmlString(currentTemp, currentWindMph, currentWindDir, currentRelativeHumidity);


        if (infoWindow.marker != marker) {
            infoWindow.marker = marker;
            //infoWindow.setContent('<h5>' + marker.title + '</h5>');
            infoWindow.setContent('<b><a href="https://blooming-badlands-10202.herokuapp.com/'+skate.id+ '">' + marker.title + '</b></a><br>Length: ' + skateLength + ' miles<br>' + htmlWindowString);
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
            currentTempString = currentTemp + '<br>';
        }
        if (currentWindMph) {
            currentWindMphString = 'Wind ' + currentWindMph + ' MPH ';
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