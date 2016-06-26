<?php
/*
* Performs 2 queries.  
* 1. fetches data for user selected artwork.
* 2. Performs modified euclidean difference on emotions of all rows in database.
* Return data for for 11 least distant rows in ascending order.
*/
include 'configdb.php';
$sql = new mysqli ( $servername, $username, $password, $database );
if ($sql->connect_error) {
	die ( "Connection failed: " . $sql->connect_error );
}
$img=$_POST['imgpath'];

$query1="SELECT count,joy,trust,fear,surprise,sadness,disgust,anger,anticipation FROM artisan WHERE imgpath='$img'";
$result = mysqli_query ( $sql, $query1 );

$row = mysqli_fetch_assoc($result);
$count = $row['count'];
$joy = $row ['joy'] / $count;
$trust = $row ['trust'] / $count;
$fear = $row ['fear'] / $count;
$surp = $row ['surprise']/ $count;
$sad = $row ['sadness']  / $count;
$dis = $row ['disgust'] / $count;
$anger = $row ['anger'] / $count;
$ant = $row ['anticipation']/ $count;
$return=array();

$query2 = "SELECT *,(ABS($joy - joy/count) + ABS($trust - trust/count) + ABS($fear - fear/count) 
+ ABS($surp - surprise/count) + ABS($sad - sadness/count) + ABS($dis - disgust/count) + ABS($anger - anger/count)
+ ABS($ant - anticipation/count)) as gencoord FROM artisan ORDER BY gencoord ASC LIMIT 11;";
if($result = $sql->query($query2)){
	while($row = $result->fetch_assoc()){
		$count = $row['count'];
		unset($row['count']);
		foreach($row as $k =>$v){
			if(is_numeric($v) && $k != "x" && $k != "y"){
				$row[$k] = round($v / $count, 2);
			};
		};
		array_push($return, $row);
	}

	echo json_encode($return);
}
mysqli_close ( $sql );
?>
