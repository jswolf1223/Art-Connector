<?php
/*
 * Returns data for 11 images with the closest rgb value to the input image.
 */
include 'configdb.php';
$sql = new mysqli ( $servername, $username, $password, $database );

if ($sql->connect_error) {
	die ( "Connection failed: " . $sql->connect_error );
}
$rgbArr = explode ( ',', $_POST ['rgb'] );
$rgbAvgArr = explode ( ',', $_POST ['avg'] );

$rgb0 = ( int ) $rgbArr [0];
$rgb1 = ( int ) $rgbArr [1];
$rgb2 = ( int ) $rgbArr [2];

$rgbAvg0 = ( int ) $rgbAvgArr [0];
$rgbAvg1 = ( int ) $rgbAvgArr [1];
$rgbAvg2 = ( int ) $rgbArr [2];
$return = array ();

$query = "SELECT *, ((ABS($rgb0 - SUBSTRING_INDEX(rgb,',',1))) 
	+ (ABS($rgb1 - SUBSTRING_INDEX(SUBSTRING_INDEX(rgb,',',2),',',-1)))
	+(ABS($rgb2 - (SUBSTRING_INDEX(rgb,',',-1)))) + (ABS($rgbAvg0 - SUBSTRING_INDEX(rgbavg,',',1))) 
	+ (ABS($rgbAvg1 - SUBSTRING_INDEX(SUBSTRING_INDEX(rgbavg,',',2),',',-1)))
	+(ABS($rgbAvg2 - (SUBSTRING_INDEX(rgbavg,',',-1)))))AS genemotion FROM artisan ORDER BY genemotion ASC LIMIT 11;";

if ($result = $sql->query ( $query )) {
	
	while ( $row = $result->fetch_assoc () ) {
		$count = $row ['count'];
		unset ( $row ['count'] );
		foreach ( $row as $k => $v ) {
			if (is_numeric ( $v ) && $k != "x" && $k != "y") {
				$row [$k] = round ( $v / $count, 2 );
			}
			;
		}
		
		array_push ( $return, $row );
	}
	;
	echo json_encode ( $return );
} else {
	echo ("Error description: " . mysqli_error ( $sql ));
}

$sql->close ();
?>
