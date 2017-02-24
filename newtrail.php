
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
<?php

$dbopts = parse_url(getenv('DATABASE_URL'));
$connection_string = 'dbname='.ltrim($dbopts["path"],'/').' host='.$dbopts["host"].' port='.$dbopts["port"].' user='.$dbopts["user"].' password='.$dbopts["pass"];

$dbconn = pg_connect($connection_string);

$result = pg_exec($dbconn, "select * from currentskates");
$numrows = pg_numrows($result);

$skates = array();

for($ri = 0; $ri < $numrows; $ri++) {
    
    $row = pg_fetch_array($result, $ri);
    $current_skate = array("id"=>$row["id"], "trailName"=>$row["name"],"lat"=>(float)$row["lat"],"lng"=>(float)$row["lng"], "parkingSpot"=>$row["parking_location"], "length"=>(float)$row["skate_length"], "marker"=>null, "pws"=>$row["pws"], "temperature"=>null, "windMph"=>null, "windDir"=>null, "relHumid"=>null, "weather_time"=> null);
    array_push($skates, $current_skate);
    }

pg_close($dbconn);

?>

<script type="text/javascript">
  var skate_data = <?php echo json_encode($skates); ?>; 
  var skate_detail = false;
</script>
        <header>
           
            <div> <a href="index.php"><img id="gnome" src="img/gnome.png" alt="rollerskating gnome"></a>Rollerskating Gnome</div>
                </header>
            <div id="bar_detail">

	    	
          
	    <span id="all_filter_detail"><label for="all-filter">Search All Skates:</label><span class="glyphicon glyphicon-search header_icon" aria-hidden="true"></span>
	<input type="text"  placeholder="Any trail" data-bind="value: allFilter, valueUpdate: 'afterkeydown'" /></span>
        
</div>
<div class="all_skates_nav corners" data-bind="if: allFilteredSkates">

<ul data-bind="foreach: allFilteredSkates" class="allskatelinks" id="myallskatelinks">
            <li class="skatelink" data-bind="text: trailName, click: $parent.clickSkate"></li>
        </ul>
</div>

<h1 class="form_title">Suggest a New Trail</h1>
<span data-bind="if: formMessage">
<h2 class="form_title" data-bind="text: formMessage"></h2>
</span>
<ul lass="form_title" data-bind="foreach: errorList">
           <li class="text-danger" data-bind="text: input_error"></li>
        </ul>
<div id="form_detail" class="corners">
	<form id="trail_form" action="newtrail.php"  data-bind="submit: submitNewTrail" method="POST">
	<label for="name">Trail Name:</label><br/>
	<input type="text" class="long_text" placeholder="Trail Name" data-bind="value: newTrailForm.name" id="name" autofocus><br/>
	<label for="lat">Latitude:</label><input type="text" class="input_location" data-bind="value: newTrailForm.lat" id="lat">
        <label for="lng">Longitude:</label><input type="text" class="input_location" data-bind="value: newTrailForm.lng" id="long"><br>
	<div id="googAddress" data-bind="if: showAForm()"><label for="formAddress">Address:</label><br>
        <input type="text" class="long_text" data-bind="value: newTrailForm.formAddress" id="formAddress">
        <button data-bind="click: geoCodeInput">Go!</button></div>
	<button data-bind="click: getUserLocation">Get Position from Current Location</button><br/>
	<button data-bind="click: showAddressForm">Get Position from Address</button><br/>
	<label for="parking_location">Parking Location:</label><br/>
	<input type="textarea" data-bind="value: newTrailForm.parking_location" class="form_area" id="parking_location"><br />
	<label for="parking_cost">Cost to Park:</label><br/>
	<input type="text" data-bind="value: newTrailForm.parking_cost" placeholder="$0.00" id="parking_cost"><br />
	<label for="skate_length">Trail Length (miles):</label><br />
	<input type="text" data-bind="value: newTrailForm.skate_length" placeholder="0" id="skate_length"><br />
	<label for="info">Need to Know Information:</label><br />
	<input type="textarea" data-bind="value: newTrailForm.info" rows="4" class="form_area" id="info"><br />
	<label for="group">Schedule Group Skates:</label><br />
	<input type="textarea" data-bind="value: newTrailForm.group" rows="4" class="form_area" id="group"><br />		
	<label for="web">Related Websites:</label><br />
	<input type="textarea" data-bind="value: newTrailForm.web" rows="4" class="form_area"  id="web"><br />
	<label for="email">Contact E-mail:</label><br />
	<input type="text" data-bind="value: newTrailForm.email" placeholder="myemail@email.com" id="email" autocomplete="email"><br /><br />
	<input type="submit" value="Submit" name="submit" data-bind="click: submitNewTrail"><br />
	

	</form>
</div>

   
   

    <script src="js/knockout.js"></script>
    <script src="js/main.js"></script>

    <script src="js/jquery.min.js"></script>

<script defer async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCkzEV_2vZYplUr-ceO0gt7F0q5y_k5eX8&v=3&callback=initMapForm">
    </script>
   
 

</body>

</html>