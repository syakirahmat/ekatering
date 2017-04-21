<?php
/**
 * Created by PhpStorm.
 * User: Mizan
 * Date: 21-Apr-17
 * Time: 8:20 PM
 */
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
