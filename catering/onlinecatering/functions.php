<?php
function generateReservationID(){
    $today = date("Ymd");
    $rand = strtoupper(substr(uniqid(sha1(time())),0,4));
    return $unique = $today . $rand;
}

function toDateTime($string, $format = "Y-m-d H:i:s") {
	//$string = str_replace("/", "-", $string);
	return date($format, strtotime($string));
}

function d($mixed = null, $die = true) {
	echo '<pre>';
	var_dump($mixed);
	echo '</pre>';
	if ($die)
		die();
	return null;
}
