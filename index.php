<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
    <meta charset="UTF-8">
    <title>Rollerskating Gnome</title>
    <meta name="viewport" content="width=device-width,height=device-height, initial-scale=1.0" />
    

</head>

<body>

        <header>
           
            <div> <img id="gnome" src="img/gnome.png" alt="rollerskating gnome">Rollerskating Gnome</div>
                <span id="weather_attribute" data-bind="text: weatherAttribString"></span></header>
            <div class="test"><a href="newtrail2.php">Link to new trail</a></div>
            <div id="bar">

	    	
            <form id="header_form"> <span id="hamburger" class="glyphicon glyphicon-menu-hamburger header_icon" aria-hidden="true" data-bind="click: showMenu"></span>
<label for="name-filter">Search on Map:</label><span class="glyphicon glyphicon-list-alt header_icon" aria-hidden="true"></span>
            <input type="text" placeholder="Local trail" id="name-filter" data-bind="value: filter, valueUpdate: 'afterkeydown'" />
 
            <label for="zip-code" id="map_label">Re-center:</label><span class="glyphicon glyphicon-globe header_icon" aria-hidden="true"></span>
            <input type="text"  placeholder="City, State or Zip" name="zipCode" id="zip-code" data-bind="textInput: zipCode" /><button id="map_button" class="btn btn-sm" data-bind="click: resetMap">Go!</button>
	    <span id="all_filter"><label for="all-filter">Search All Skates:</label><span class="glyphicon glyphicon-search header_icon" aria-hidden="true"></span>
	<input type="text"  placeholder="Any trail" data-bind="value: allFilter, valueUpdate: 'afterkeydown'" /></span>
        
</div>



     <div class="wrapper">

<nav class="corners" data-bind="css: { open: showNavBar()}">
       
        <ul data-bind="foreach: filteredSkates" class="allskatelinks corners" id="myskatelinks">
            <li class="skatelink" data-bind="text: trailName, click: $parent.clickSkate"></li>
        </ul>
       <hr>
       <div class="navform">	
       <form">
       Miles:<br>
  
                       <input class="miles_input" type="text" name="minimum miles" id="min-miles" data-bind="textInput: minMiles" />
	    <label for "min-miles"></label> to 
	    
            <input class="miles_input" type="text" name="maximum miles" id="max-miles" data-bind="textInput: maxMiles" />
            <label for="max-miles"></label>
           

	<div class="btn-group">
        <button class="btn btn-default btn-xs left-btn" data-bind="click: filterResults"><span class="glyphicon glyphicon-filter"></span></button>
        <button class="btn btn-default right-btn btn-xs" data-bind="click: unFilterResults"><span class="glyphicon glyphicon-remove" aria-hidden="true"></button>
	</div>
	   
	</form>
	</div>
        <div id="menu_arrow"><span class="glyphicon glyphicon-circle-arrow-left" aria-hidden="true" data-bind="click: hideMenu"></span></div>
    </nav>

<div class="all_skates_nav corners" data-bind="if: allFilteredSkates">

<ul data-bind="foreach: allFilteredSkates" class="allskatelinks" id="myallskatelinks">
            <li class="skatelink" data-bind="text: trailName, click: $parent.clickSkate"></li>
        </ul>
</div>
   
   <div id="main">
        

        <div id="map" ></div>
    </div>
   
</div>
    <script>
    </script>

   

    <script src="js/knockout.js"></script>
    <script src="js/main.js"></script>

    <script src="js/jquery.min.js"></script>
     <script defer async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCkzEV_2vZYplUr-ceO0gt7F0q5y_k5eX8&v=3&callback=initMap">
    </script>
 

</body>

</html>