<?php

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
