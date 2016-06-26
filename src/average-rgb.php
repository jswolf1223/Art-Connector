<?php
include 'configdb.php';
$sql = new mysqli ( $servername, $username, $password, $database );
$avg = $_POST ['avg'];
$title = $_POST ['title'];
if ($sql->connect_error) {
	die ( "Connection failed: " . $sql->connect_error );
}

$query = "UPDATE artisan SET rgbavg = '$avg' WHERE title='$title'";
echo $avg.$query;
mysqli_query ( $sql, $query );
mysqli_close ( $sql );
?>