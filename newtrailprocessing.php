<?php


$errors = array();

$dbopts = parse_url(getenv('DATABASE_URL'));
$connection_string = 'dbname='.ltrim($dbopts["path"],'/').' host='.$dbopts["host"].' port='.$dbopts["port"].' user='.$dbopts["user"].' password='.$dbopts["pass"];

$dbconn = pg_connect($connection_string) or die("Error while connecting to database.");

if (!$dbconn){
  array_push($errors, "Error connecting to database");
}

$validated = false;

$dataString = $_POST['dataString'];
//$data = $dataString['data'];
$submit = $dataString['submit'];

function is_number_in_range_inclusive($value,$min,$max){

    return (is_numeric($value) && (float)$value <= $max && (float)$value >= $min);
}

function is_str_length_in_range_inclusive($value,$min,$max){

    return (strlen($value) <= $max && strlen($value) >= $min);

}


if($submit){
  $validated = true;
  $name = $dataString['name'];
  $lat = $dataString['lat'];
  $lng = $dataString['lng'];
  $parking_location = $dataString['parking_location'];
  $parking_cost = $dataString['parking_cost'];
  $skate_length = $dataString['skate_length'];
  $info = $dataString['info'];
  $group = $dataString['group'];
  $web = $dataString['web'];
  $email = $dataString['email'];
} else {

$validated = false;
  $name = '';
  $lat = 0.0;
  $lng = 0.0;
  $parking_location = '';
  $parking_cost = '';
  $skate_length = 0;
  $info = '';
  $group = '';
  $web = '';
  $email = '';
}

$errors = array();
$query_array = array();

if (!is_str_length_in_range_inclusive($name,5,100)){
  array_push($errors, "Length of name must be between 5 and 100 characters.");
}
if (!is_number_in_range_inclusive($lat,-90,90)){
   array_push($errors, "Latitude must be numeric in the range of -90 to 90.");
}
if (!is_number_in_range_inclusive($lng,0,180)){
  array_push($errors, "Longitude must be numeric in the range of 0 to 180.");
}

if(!is_number_in_range_inclusive($skate_length,0,1000)){
 array_push($errors, "Trail length must be numeric from 0 to 1000.");
}



if($validated && empty($errors)){
    //escaping is unnecessary in prepared queries per documentation, however as not high volume escaping as extra precaution.
    array_push($query_array,pg_escape_string($name));
    array_push($query_array,pg_escape_string($lat));
    array_push($query_array,pg_escape_string($lng));
    array_push($query_array,pg_escape_string($parking_location));
    array_push($query_array,pg_escape_string($parking_cost));
    array_push($query_array,pg_escape_string($skate_length));
    array_push($query_array,pg_escape_string($skate_info));
    array_push($query_array,pg_escape_string($group_skates));
    array_push($query_array,pg_escape_string($web_resources));
    array_push($query_array,pg_escape_string($email));
    

    //insert suggested skate into new skates database.
    $sql = "INSERT INTO submittedskate (name, lat, lng, parking_location, parking_cost, skate_length, skate_info, group_skates, web_resources, email) VALUES ($1, $2, $3, $4, $5, $6, $7, $8, $9, $10)";
    $result = pg_prepare($dbconn, 'my_insert', $sql);

    if(!$result){
      array_push($errors, "Error completing save of new trail.  Please try again later");
      $reponse = array(
        'error'=>"Error existed",
        'errors'=>$errors,
        'message'=>'Please note the following error:'
        );
        break 2;

    }



    $result = pg_execute($dbconn, 'my_insert', $query_array);

    if(!$result){
      array_push($errors, "Error saving new trail.  Please try again later");
      $reponse = array(
        'error'=>"Error existed",
        'errors'=>$errors,
        'message'=>'Please note the following error:'
        );
        break 2;

    }
  
    pg_close($dbconn);
    $response = array(
        'error'=>null,
        'message'=> 'Trail submitted successfully.  The gnome will be reviewing shortly.');
} else {
    $response = array(
        'error'=>"Error existed",
        'errors'=>$errors,
        'message'=> 'Please note the following errors:');
}



echo json_encode($response);


?>
