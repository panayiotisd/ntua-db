<?php
	$services = array();
	$service = "";
	$previousHotelId = -1;
	$count = 0;
	foreach( $hotels as $hotel ) {
		$hotel_services = GetHotelServices( $hotel[0] );
		foreach( $hotel_services as $hotel_service ) {
			$service .= $hotel_service[0] . ", ";
		}
		$service = implode(" ", explode(",",$service) );
		$services[$count] = $service;
		$count = $count + 1;
		$service = "";
	}
	//print_r($services);
?>