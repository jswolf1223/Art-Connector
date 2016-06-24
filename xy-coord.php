<?php

/*  Finds central emotion of an image. The x position is found by adding the Plutchik wheel's right emotions' averages and
 *  subtracting the left emotions' averages from x.The y position is found by adding the Plutchik wheel's top emotions'
 *  averages and subtracting the bottom emotions' averages from y. x andy Coordinates are used to with emotion wheel data
 *  visualisation
 */ 
function getCoords($coords) {
	$x = ($coords ['trust'] / 2) + $coords ['fear'] + ($coords ['surprise'] / 2) - $coords ['anger'] - 
		($coords ['disgust'] / 2) - ($coords ['anticipation'] / 2);
	$y = $coords ['joy'] + ($coords ['anticipation'] / 2) + ($coords ['trust'] / 2) - ($coords ['disgust'] / 2) - 
		$coords ['sadness'] - ($coords ['surprise'] / 2);
	return json_encode ( array (
			"x" => $x,
			"y" => $y 
	) );
}
;

?>
