<?php
header('Content-type: application/json');

$time = (object)[];

if($_SERVER['QUERY_STRING']) {

	$string_to_check = trim($_SERVER['QUERY_STRING']);

	if(is_numeric($string_to_check)) {

		$time->unix = $string_to_check;
		$time->natural = date("F j, Y", (int) $string_to_check);

		$time = json_encode($time);

	} else if($date_time = strtotime($string_to_check)) {

		$time->unix = $date_time;
		$time->natural = date("F j, Y", $date_time);

		$time = json_encode($time);
		
	} else {

		$time->unix = NULL;
		$time->natural = NULL;

		$time = json_encode($time);
	}

	echo $time;
}