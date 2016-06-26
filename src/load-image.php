<?php
/*
 * Copies image to server directory. Inserts title, artist's first name,
 * artist's last name, emotion and color data from user input form into the database.
 */
include 'configdb.php';
include_once 'xy-coord.php';
if (isset ( $_FILES ["file"] ["type"] )) {
	$validextensions = array (
			"jpeg",
			"jpg",
			"png" 
	);
	$temporary = explode ( ".", $_FILES ["file"] ["name"] );
	$newfilename = round ( microtime ( true ) ) . '.' . end ( $temporary );
	$file_extension = end ( $temporary );
	if ((($_FILES ["file"] ["type"] == "image/png") || ($_FILES ["file"] ["type"] == "image/jpg") || // Validate image file type
($_FILES ["file"] ["type"] == "image/jpeg")) && ($_FILES ["file"] ["size"] < 2500000) &&			 // Only allow files under 2.5mb
in_array ( $file_extension, $validextensions )) {
		if ($_FILES ["file"] ["error"] > 0) {
			echo "Return Code: " . $_FILES ["file"] ["error"] . "<br/><br/>";
		} else {
			if (file_exists ( "img/" . $_FILES ["file"] ["name"] )) {
				echo $_FILES ["file"] ["name"] . " <span id='invalid'><b>already exists.</b></span> ";
			} else {
				$sourcePath = $_FILES ['file'] ['tmp_name']; 						// Storing source path of the file in a variable
				$targetPath = "img/" . $newfilename;
				move_uploaded_file ( $sourcePath, $targetPath ); 					// Storing image in server directory
				
				$sql = new mysqli ( $servername, $username, $password, $database );
				$fname = $sql->real_escape_string ( $_POST ['fname'] );
				$lname = $sql->real_escape_string ( $_POST ['lname'] );
				$title = $sql->real_escape_string ( $_POST ['title'] );
				$joy = $_POST ['joy'];
				$trust = $_POST ['trust'];
				$fear = $_POST ['fear'];
				$surp = $_POST ['surprise'];
				$sad = $_POST ['sadness'];
				$dis = $_POST ['disgust'];
				$anger = $_POST ['anger'];
				$ant = $_POST ['anticipation'];
				$rgb = $_POST ['rgb'];
				$avg = $_POST ['avg'];
				$rat = $_POST ['ratio'];
				$pal = $_POST ['palette'];
				$coords = (getCoords ( $_POST )); 					// Call to xycoord.php returns x and y coordinates
				$good = json_decode ( $coords, true );			    //(central emotion) of artwork
				$x = $good ['x'];
				$y = $good ['y'];
				
				if ($sql->connect_error) {
					die ( "Connection failed: " . $sql->connect_error );
				}
				
				$query = "INSERT INTO artisan (firstname, lastname, title,joy,trust,
				fear,surprise,sadness,disgust,anger,anticipation,rgb,x,y,ratio,palette,imgpath,rgbavg)
				VALUES ('$fname', '$lname', '$title','$joy','$trust','$fear','$surp',
				'$sad','$dis','$anger','$ant','$rgb','$x','$y','$rat','$pal','$targetPath','$avg')";
				
				mysqli_query ( $sql, $query );
				mysqli_close ( $sql );
				echo json_encode ( array (
						"rgb" => $rgb,
						"title" => $title,
						"imgpath" => $targetPath,
						"x" => $x,
						"y" => $y,
						"ratio" => $rat,
						"palette" => $pal,
						"avg"  => $avg
						
				) );
			}
		}
	} else {
		echo "<span id='invalid'>Invalid file Size or Type<span>";
	}
}
?>