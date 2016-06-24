<?php
/*
 * Performs 3 queries. 
 * 1. Updates emotion's  values and count of the image voted on 
 * 2. Selects the updated emotion values, count and the rgb data.
 * 3. Updates the x and y values with the new emotion values.
 */
include_once 'xy-coord.php';
include 'configdb.php';

// Create connection
$sql = new mysqli ( $servername, $username, $password, $database );
$title =  $_POST ['title'] ;
$joy = $_POST ['joy'];
$trust = $_POST ['trust'];
$fear = $_POST ['fear'];
$surp = $_POST ['surprise'];
$sad = $_POST ['sadness'];
$dis = $_POST ['disgust'];
$anger = $_POST ['anger'];
$ant = $_POST ['anticipation'];

// Check connection
if ($sql->connect_error) {
	die ( "Connection failed: " . $sql->connect_error );
}

$query = "UPDATE artisan SET joy = joy + $joy,trust = trust + $trust,fear = fear 
+ $fear, surprise= surprise + $surp,sadness = sadness + $sad,disgust = disgust + $dis,anger = anger 
+ $anger,anticipation=anticipation + $ant, count = count + 1 WHERE title ='$title'";

mysqli_query ( $sql, $query );

$query2="SELECT count,joy,trust,fear,surprise,sadness,disgust,anger,anticipation,x,y,rgb FROM artisan WHERE title='$title'";
$result = mysqli_query ( $sql, $query2 );

$row = mysqli_fetch_assoc($result);
$count = $row['count'];
unset($row['count']);
foreach($row as $k =>$v){
	if(is_numeric($v) && $k != "x" && $k != "y" && $k != "rgb"){
	$row[$k] = round($v / $count, 2);
	}
}
$coords=(getCoords($row));
$good= json_decode($coords,true);

$x=$good['x'];
$y=$good['y'];

$query3 = "UPDATE artisan SET x =$x, y=$y WHERE title ='$title'";
mysqli_query ( $sql, $query3 );
$row['x']=$x;
$row['y']=$y;
echo json_encode($row);
mysqli_close ( $sql );
?>