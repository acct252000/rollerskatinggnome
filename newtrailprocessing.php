
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
$validated = true;

if($validated == true){
	$reponse = array(
		'error'=> null,
		'message'=> 'upload successful');
} else {
	$response = array(
		'error'=>"lots of errors",
		'message'=> 'fail');
}

echo json_encode($response);

?>
   
   

    <script src="js/knockout.js"></script>
    <script src="js/main.js"></script>

    <script src="js/jquery.min.js"></script>

    </script>
   
 

</body>

</html>