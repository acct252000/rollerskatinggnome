<html>

  <head>
   <title>Test</title>
  </head>

  <body bgcolor="white">

<?php

$dbopts = parse_url(getenv('DATABASE_URL'));
$connection_string = 'dbname='.ltrim($dbopts["path"],'/').' host='.$dbopts["host"].' port='.$dbopts["port"].' user='.$dbopts["user"].' password='.$dbopts["pass"];

$dbconn = pg_connect($connection_string);

$result = pg_exec($dbconn, "select * from newskates");
$numrows = pg_numrows($result);
?>


<table border="1">
  <tr>
   <th>Last name</th>
   <th>First name</th>
   <th>ID</th>
  </tr>
  <?php

   // Loop on rows in the result set.

   for($ri = 0; $ri < $numrows; $ri++) {
    echo "<tr>\n";
    $row = pg_fetch_array($result, $ri);
    echo " <td>", $row["name"], "</td>
   <td>", $row["lat"], "</td>
   <td>", $row["lng"], "</td>
  </tr>
  ";
   }
   pg_close($link);
  ?>
  </table>

  </body>

  </html>
