<html>

  <head>
   <title>Test</title>
  </head>

  <body bgcolor="white">

<?php

$dbopts = parse_url(getenv('DATABASE_URL'));
$connection_string = 'dbname='.ltrim($dbopts["path"],'/').' host='.$dbopts["host"].' port='.$dbopts["port"].' user='.$dbopts["user"].' password='.$dbopts["pass"];

$dbconn = pg_connect($connection_string);

$result = pg_exec($dbconn, "select * from currentskates");
$numrows = pg_numrows($result);

$skates = array();

for($ri = 0; $ri < $numrows; $ri++) {
    
    $row = pg_fetch_array($result, $ri);
    $current_skate = array("trailName"=>$row["name"],"lat"=>$row["lat"],"lng"=>$row["lng"], "parkingSpot"=>$row["parking_location"], "length"=>$row["skate_length"], "marker"=>null, "pws"=>$row["pws"], "temperature"=>null, "windMph"=>null, "windDir"=>null, "relHumid"=>null);
    array_push($skates, $current_skate);
	}

pg_close($dbconn);

?>

<script type="text/javascript">
  var skate_data = <?php echo json_encode($skates); ?>; 
  console.log(skate_data[0]);
</script>


  </body>

  </html>
