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
           
            <div> <a href="index.php"><img id="gnome" src="img/gnome.png" alt="rollerskating gnome"></a>Rollerskating Gnome</div>
                </header>
            <div id="bar_detail">

	    	
            <form> </span>
	    <span id="all_filter_detail"><label for="all-filter">Search All Skates:</label><span class="glyphicon glyphicon-search header_icon" aria-hidden="true"></span>
	<input type="text"  placeholder="Any trail" data-bind="value: allFilter, valueUpdate: 'afterkeydown'" /></span>
        
</div>

<h1 id="form_title">Suggest a New Trail</h1>
<?php
echo "this is php";

?>
<div id="form_detail" class="corners">
	<form id="trail_form" action="process_new_trail.php" method="post">
	<label for="name">Trail Name:</label><br/>
	<input type="text" class="long_text" placeholder="Trail Name" id="name" autofocus><br/>
	<label for="lat">Latitude:</label><input type="text" class="input_location" data-bind="value: lat" id="lat">
        <label for="lat">Longitude:</label><input type="text" class="input_location" data-bind="value: lng" id="long"><br>
	<div id="googAddress" data-bind="if: showAForm()"><label for="formAddress">Address:</label><br>
        <input type="text" class="long_text" data-bind="value: formAddress" id="formAddress">
        <button data-bind="click: geoCodeInput">Go!</button></div>
	<button data-bind="click: getUserLocation">Get Position from Current Location</button><br/>
	<button data-bind="click: showAddressForm">Get Position from Address</button><br/>
	<label for="parking_location">Parking Location:</label><br/>
	<input type="textarea" class="form_area" id="parking_location"><br />
	<label for="parking_cost">Cost to Park:</label><br/>
	<input type="text" placeholder="$0.00" id="parking_cost"><br />
	<label for="length">Trail Length (miles):</label><br />
	<input type="text" placeholder="0" id="length"><br />
	<label for="info">Need to Know Information:</label><br />
	<input type="textarea" rows="4" class="form_area" id="info"><br />
	<label for="group">Schedule Group Skates:</label><br />
	<input type="textarea" rows="4" class="form_area" id="group"><br />		
	<label for="web">Related Websites:</label><br />
	<input type="textarea" rows="4" class="form_area"  id="web"><br />
	<label for="email">Contact E-mail:</label><br />
	<input type="text" placeholder="myemail@email.com" id="email" autocomplete="email"><br />
	<input type="submit" name="submit" value="Submit"><br/>
	

	</form>
</div>

   
   

    <script src="js/knockout.js"></script>
    <script src="js/main.js"></script>

    <script src="js/jquery.min.js"></script>

<script defer async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCkzEV_2vZYplUr-ceO0gt7F0q5y_k5eX8&v=3&callback=initMapForm">
    </script>
   
 

</body>

</html>