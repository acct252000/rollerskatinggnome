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
$query_string = "select * from currentskates";
$result = pg_exec($dbconn, $query_string);
$numrows = pg_numrows($result);

$skates = array();
$current_skate_id = $_GET["skate"];

for($ri = 0; $ri < $numrows; $ri++) {
    
    $row = pg_fetch_array($result, $ri);
    $current_skate = array("id"=>$row["id"], "trailName"=>$row["name"],"lat"=>(float)$row["lat"],"lng"=>(float)$row["lng"], "parkingSpot"=>$row["parking_location"], "parkingCost"=>$row["parking_cost"], "length"=>(float)$row["skate_length"], "marker"=>null, "pws"=>$row["pws"], "skateInfo"=>$row["skate_info"], "groupSkates"=>$row["group_skates"], "temperature"=>null, "windMph"=>null, "windDir"=>null, "relHumid"=>null);
    array_push($skates, $current_skate);
    
    }

pg_close($dbconn);

?>

<script type="text/javascript">
  var skate_data = <?php echo json_encode($skates); ?>; 
  var current_skate_id = <?php echo $current_skate_id; ?>;
  var skate_detail = true;
</script>

        <header>
           
            <div> <img id="gnome" src="img/gnome.png" alt="rollerskating gnome">Rollerskating Gnome</div>
                <span id="weather_attribute" data-bind="text: weatherAttribString"></span></header>
            <div id="bar_detail">

	    	
            <form> <span id="hamburger" class="glyphicon glyphicon-menu-hamburger header_icon" aria-hidden="true" data-bind="click: showMenu"></span>
	    <span id="all_filter_detail"><label for="all-filter">Search All Skates:</label><span class="glyphicon glyphicon-search header_icon" aria-hidden="true"></span>
	<input type="text"  placeholder="Any trail" data-bind="value: allFilter, valueUpdate: 'afterkeydown'" /></span>
        
</div>



     <div class="wrapper">



<div class="all_skates_nav_detail corners" data-bind="if: allFilteredSkates">

<ul data-bind="foreach: allFilteredSkates" class="allskatelinks" id="myallskatelinks">
            <li class="skatelink" data-bind="text: trailName, click: $parent.clickSkate"></li>
        </ul>
</div>
   
   <div id="main_detail">
		<div class="col-12"><h1 data-bind="text: currentSkate.name"></h1></div>
		<div class="col-12">



























                     <img class="skate-picture corners" src="img/app1.jpg" alt="picture of skate">
     		
			<h3>Weather Information</h3>
			<table>
			<tr><td>Temperature:</td><td class="weatherinfo" data-bind="text: currentSkate.temperature"> Loading...</td></tr>
                        <tr><td>Wind Speed: </td><td class="weatherinfo" data-bind="text: currentSkate.windMph"></td></tr>
			<tr><td>Wind Direction: </td><td class="weatherinfo" data-bind="text: currentSkate.windDir"> </td></tr>
			<tr><td>Relative Humidity: </td><td class="weatherinfo" data-bind="text: currentSkate.relHumid"></td></tr>
			</table>
		<h3>Ratings:</h3>
		</div>
		<div id="detail_break" class="col-12"><hr class="corners">
		</div>
		<div class="col-12">
		<table>
		<tr><td>
		<span class="detail-info">Parking Location: </span></td><td data-bind="text: currentSkate.parking_location"></td></tr>
		<tr><td><span class="detail-info">Charge for Parking:</span></td><td data-bind="text: currentSkate.parking_cost"></td></tr>
		<tr><td><span class="detail-info">Length:</span></td><td data-bind="text: currentSkate.length"></td></tr>
		</table>
		<span class="detail-info">Need to Know Information:</span><br>
		<span data-bind="text: currentSkate.skate_info"></span><br>
		<span class="detail-info">Scheduled Group Skates:</span><br>
		<span data-bind="text: currentSkate.group_skates"></span>
		</div>
		<div class="col-12"><hr class="corners">
		</div>
		<div class="col-12">
		<span class="detail-info">Comments:</span><br>
		Cascading Style Sheets (CSS) is a style sheet language used for describing the presentation of a document written in a markup language.[1] Although most often used to set the visual style of web pages and user interfaces written in HTML and XHTML, the language can be applied to any XML document, including plain XML, SVG and XUL, and is applicable to rendering in speech, or on other media. Along with HTML and JavaScript, CSS is a cornerstone technology used by most websites to create visually engaging webpages, user interfaces for web applications, and user interfaces for many mobile applications.[2]

CSS is designed primarily to enable the separation of document content from document presentation, including aspects such as the layout, colors, and fonts.[3] This separation can improve content accessibility, provide more flexibility and control in the specification of presentation characteristics, enable multiple HTML pages to share formatting by specifying the relevant CSS in a separate .css file, and reduce complexity and repetition in the structural content.

Separation of formatting and content makes it possible to present the same markup page in different styles for different rendering methods, such as on-screen, in print, by voice (via speech-based browser or screen reader), and on Braille-based tactile devices. It can also display the web page differently depending on the screen size or viewing device. Readers can also specify a different style sheet, such as a CSS file stored on their own computer, to override the one the author specified.

Changes to the graphic design of a document (or hundreds of documents) can be applied quickly and easily, by editing a few lines in the CSS file they use, rather than by changing markup in the documents.

The CSS specification describes a priority scheme to determine which style rules apply if more than one rule matches against a particular element. In this so-called cascade, priorities (or weights) are calculated and assigned to rules, so that the results are predictable.

The CSS specifications are maintained by the World Wide Web Consortium (W3C). Internet media tCascading Style Sheets (CSS) is a style sheet language used for describing the presentation of a document written in a markup language.[1] Although most often used to set the visual style of web pages and user interfaces written in HTML and XHTML, the language can be applied to any XML document, including plain XML, SVG and XUL, and is applicable to rendering in speech, or on other media. Along with HTML and JavaScript, CSS is a cornerstone technology used by most websites to create visually engaging webpages, user interfaces for web applications, and user interfaces for many mobile applications.[2]

CSS is designed primarily to enable the separation of document content from document presentation, including aspects such as the layout, colors, and fonts.[3] This separation can improve content accessibility, provide more flexibility and control in the specification of presentation characteristics, enable multiple HTML pages to share formatting by specifying the relevant CSS in a separate .css file, and reduce complexity and repetition in the structural content.

Separation of formatting and content makes it possible to present the same markup page in different styles for different rendering methods, such as on-screen, in print, by voice (via speech-based browser or screen reader), and on Braille-based tactile devices. It can also display the web page differently depending on the screen size or viewing device. Readers can also specify a different style sheet, such as a CSS file stored on their own computer, to override the one the author specified.

Changes to the graphic design of a document (or hundreds of documents) can be applied quickly and easily, by editing a few lines in the CSS file they use, rather than by changing markup in the documents.

The CSS specification describes a priority scheme to determine which style rules apply if more than one rule matches against a particular element. In this so-called cascade, priorities (or weights) are calculated and assigned to rules, so that the results are predictable.

The CSS specifications are maintained by the World Wide Web Consortium (W3C). Internet media <br>
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