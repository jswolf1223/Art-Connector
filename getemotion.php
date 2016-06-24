<?php
/*
 * Returns 11  data for images with the highest ranking of a user input
 * emotion in descending order. 
 */
include 'configdb.php';
$sql = new mysqli ( $servername, $username, $password, $database );

if ($sql->connect_error) {
	die ( "Connection failed: " . $sql->connect_error );
}
$emotion=$_POST['emotion'];
$return=array();
$query = "SELECT *,($emotion/count)as genemotion FROM artisan ORDER BY genemotion DESC LIMIT 11;";
if($result = $sql->query($query)){
	while($row = $result->fetch_assoc()){
		$count = $row['count'];
		unset($row['count']);
		foreach($row as $k =>$v){
			if(is_numeric($v) && $k != "x" && $k != "y"){
			$row[$k] = round($v/ $count, 2);
			};
			
		}
	
		array_push($return, $row);
	};
	echo json_encode($return);
}

$sql->close();
?>
