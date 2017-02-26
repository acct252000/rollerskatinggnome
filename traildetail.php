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
//connect to database
$dbopts = parse_url(getenv('DATABASE_URL'));
$connection_string = 'dbname='.ltrim($dbopts["path"],'/').' host='.$dbopts["host"].' port='.$dbopts["port"].' user='.$dbopts["user"].' password='.$dbopts["pass"];

$dbconn = pg_connect($connection_string);
// get skate information and picture references from database
$query_string = "select * from currentskates";
$picture_query_string = "select * from currentskatepictures WHERE skate_id =".$_GET["skate"];
$result = pg_exec($dbconn, $query_string);
$picture_result = pg_exec($dbconn, $picture_query_string);
$numrows = pg_numrows($result);
$numpicrows = pg_numrows($picture_result);
//put results into array
$skates = array();
$current_skate_id = $_GET["skate"];

for($ri = 0; $ri < $numrows; $ri++) {
    
    $row = pg_fetch_array($result, $ri);
    $current_skate = array("id"=>$row["id"], "trailName"=>$row["name"],"lat"=>(float)$row["lat"],"lng"=>(float)$row["lng"], "parkingSpot"=>$row["parking_location"], "parkingCost"=>$row["parking_cost"], "length"=>(float)$row["skate_length"], "marker"=>null, "pws"=>$row["pws"], "skateInfo"=>$row["skate_info"], "groupSkates"=>$row["group_skates"], "temperature"=>null, "windMph"=>null, "windDir"=>null, "relHumid"=>null);
    array_push($skates, $current_skate);
    
    }

$primary_picture_path = '';
$other_skate_pictures = array();

for ($rb = 0; $rb < $numpicrows; $rb++){
	$picrow = pg_fetch_array($picture_result, $rb);
	if ($picrow["key_picture"]=="t"){
		$primary_picture_path = $picrow["picture_path"];
	} else {
		$skate_picture  = array("picture_path"=>$picrow["picture_path"]);
		array_push($other_skate_pictures, $skate_picture);
	}

}
//close database connection
pg_close($dbconn);

?>

<script type="text/javascript">
  var skate_data = <?php echo json_encode($skates); ?>; 
  var current_skate_id = <?php echo $current_skate_id; ?>;
  var skate_detail = true;
  var primary_picture = "<?php echo $primary_picture_path; ?>";
  var other_pictures = <?php echo json_encode($other_skate_pictures); ?>; 
  console.log(other_pictures[0]);

</script>
<header>
<!-- header bar with search all skates filter -->
    <div>
        <a href="http://blooming-badlands-10202.herokuapp.com/index.php"><img id="gnome" src="img/gnome.png" alt="rollerskating gnome"></a>Rollerskating Gnome
    </div>
    <span id="weather_attribute" data-bind="text: weatherAttribString"></span>
</header>
<div id="bar_detail">

    <form> <span id="hamburger" class="glyphicon glyphicon-menu-hamburger header_icon" aria-hidden="true" data-bind="click: showMenu"></span>
        <span id="all_filter_detail"><label for="all-filter">Search All Skates:</label><span class="glyphicon glyphicon-search header_icon" aria-hidden="true"></span>
        <input type="text" placeholder="Any trail" data-bind="value: allFilter, valueUpdate: 'afterkeydown'" />
        </span>

</div>

<div class="wrapper">
<!-- flyover that comes up with Search All skates filter -->
    <div class="all_skates_nav_detail corners" data-bind="if: allFilteredSkates">

        <ul data-bind="foreach: allFilteredSkates" class="allskatelinks" id="myallskatelinks">
            <li class="skatelink" data-bind="text: trailName, click: $parent.clickSkate"></li>
        </ul>
    </div>

    <div id="main_detail">
        <div class="col-12">
            <h1 data-bind="text: currentSkate.name"></h1></div>
        <div class="col-12">

            <img class="skate-picture corners" data-bind="attr:{src: currentSkate.primaryPicture}" alt="picture of skate">

            <h3>Weather Information</h3>
            <table>
                <tr>
                    <td>Temperature:</td>
                    <td class="weatherinfo" data-bind="text: currentSkate.temperature"> Loading...</td>
                </tr>
                <tr>
                    <td>Wind Speed: </td>
                    <td class="weatherinfo" data-bind="text: currentSkate.windMph"></td>
                </tr>
                <tr>
                    <td>Wind Direction: </td>
                    <td class="weatherinfo" data-bind="text: currentSkate.windDir"> </td>
                </tr>
                <tr>
                    <td>Relative Humidity: </td>
                    <td class="weatherinfo" data-bind="text: currentSkate.relHumid"></td>
                </tr>
            </table>
            <!-- TODO enter ratings here -->
            <h3></h3>
        </div>
        <div id="detail_break" class="col-12">
            <hr class="corners">
        </div>
        <div class="col-12">
            <table>
                <tr>
                    <td>
                        <span class="detail-info">Parking Location: </span></td>
                    <td data-bind="text: currentSkate.parking_location"></td>
                </tr>
                <tr>
                    <td><span class="detail-info">Charge for Parking:</span></td>
                    <td data-bind="text: currentSkate.parking_cost"></td>
                </tr>
                <tr>
                    <td><span class="detail-info">Length in Miles:</span></td>
                    <td data-bind="text: currentSkate.length"></td>
                </tr>
            </table>
            <span class="detail-info">Need to Know Information:</span>
            <br>
            <span data-bind="text: currentSkate.skate_info"></span>
            <br>
            <span class="detail-info">Scheduled Group Skates:</span>
            <br>
            <span data-bind="text: currentSkate.group_skates"></span>
        </div>
        <div class="col-12">
            <hr class="corners">
        </div>
        <div class="col-12">
        	<!-- TODO install comments section here -->
            <span class="detail-info">
            </span>
            <br> 
            <br>
        </div>

    </div>

</div>
<script>
</script>

<script src="js/knockout.js"></script>
<script src="js/main.js"></script>

<script src="js/jquery.min.js"></script>
<script async defer src="js/weatherapi.js"></script>
 

</body>

</html>