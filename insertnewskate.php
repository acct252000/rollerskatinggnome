<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
    <meta charset="UTF-8">
    <title>Rollerskating Gnome Admin</title>
    <meta name="viewport" content="width=device-width,height=device-height, initial-scale=1.0" />
    

</head>

<body>
<?php

if(isset($_POST['submit'])){
echo "post is submitted";
$name = isset($_POST['name']) ? $_POST['name'] : "";
$lat = isset($_POST['lat']) ? $_POST['lat'] : "";
$long = isset($_POST['long']) ? $_POST['long'] : "";
$parking_location = isset($_POST['parking_location']) ? $_POST['parking_location'] : "";
$parking_cost = isset($_POST['parking_cost']) ? $_POST['parking_cost'] : "";
$length = isset($_POST['length']) ? $_POST['length'] : "";
$info = isset($_POST['info']) ? $_POST['info'] : "";
$group = isset($_POST['group']) ? $_POST['group'] : "";
$web = isset($_POST['web']) ? $_POST['web'] : "";
$email = isset($_POST['email']) ? $_POST['email'] : "";
} else {

$name = '';
$lat = '';
$long = '';
$parking_location = '';
$parking_cost = '';
$length = '';
$info = '';
$group = '';
$web = '';
$email = '';
}

$insert_string = "INSERT INTO newskates (name, lat, lng, parking_location, parking_cost, skate_length, skate_info, group_skates, web_resources, email) VALUES ('".$name."',".$lat.",".$long.",'".$parking_location."',".$parking_cost.",".$length.",'".$info."','".$group."','".$web."','".$email."');";


$dbopts = parse_url(getenv('DATABASE_URL'));
$connection_string = 'dbname='.ltrim($dbopts["path"],'/').' host='.$dbopts["host"].' port='.$dbopts["port"].' user='.$dbopts["user"].' password='.$dbopts["pass"];

$dbconn = pg_connect($connection_string);

$result = pg_exec($dbconn, $insert_string);

?>
        
</body>

</html>