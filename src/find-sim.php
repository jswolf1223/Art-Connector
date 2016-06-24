<?php
include 'configdb.php';
$sql = new mysqli ( $servername, $username, $password, $database );
if ($sql->connect_error) {
	die ( "Connection failed: " . $sql->connect_error );
}
$x=$_POST['x'];
$y=$_POST['y'];
$return=array();
$query = "SELECT *,(ABS($x - x) + ABS($y - y))as gencoord FROM artisan ORDER BY gencoord ASC LIMIT 11;";
if($result = $sql->query($query)){
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
