<?php

$dbopts = parse_url(getenv('DATABASE_URL'));
$connection_string = 'dbname='.ltrim($dbopts["path"],'/').' host='.$dbopts["host"].' port='.$dbopts["port"].' user='.$dbopts["user"].' password='.$dbopts["pass"];
echo $connection_string;
$dbconn = pg_connect($connection_string);
echo '<br/>';
echo $dbconn;
pg_close($dbconn);
?>