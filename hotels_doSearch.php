<?php
    include 'models/database.php';
	include 'models/hotels.php';
	include 'views/header.php';
	include 'views/activeTab_hotels.php';
	
	$query = "SELECT * FROM hotels, hotel_phone WHERE hotels.hotel_id = hotel_phone.hotel_id";
	
    if ( !empty( $_POST[ 'name' ] ) ) {
		$name = $_POST[ 'name' ];
		$query .= " AND name = '$name'";
	}
	if ( !empty( $_POST[ 'street' ] ) ) {
		$street = $_POST[ 'street' ];
		$query .= " AND street = '$street'";
	}
	if ( !empty( $_POST[ 'number' ] ) ) {
		$number = $_POST[ 'number' ];
		$query .= " AND number = '$number'";
	}
	if ( !empty( $_POST[ 'postalcode' ] ) ) {
		$postalcode = $_POST[ 'postalcode' ];
		$query .= " AND postalcode = '$postalcode'";
	}
	if ( !empty( $_POST[ 'city' ] ) ) {
		$city = $_POST[ 'city' ];
		$query .= " AND city = '$city'";
	}
	if ( !empty( $_POST[ 'rate' ] ) ) {
		$rate = $_POST[ 'rate' ];
		$query .= " AND rate = '$rate'";
	}
	if ( !empty( $_POST[ 'constructiondate' ] ) ) {
		$constructiondate = $_POST[ 'constructiondate' ];
		$query .= " AND construction_year = '$constructiondate'";
	}
	if ( !empty( $_POST[ 'renovationdate' ] ) ) {
		$renovationdate = $_POST[ 'renovationdate' ];
		$query .= " AND renovation_year = '$renovationdate'";
	}
	if ( !empty( $_POST[ 'phone_number_1' ] ) ) {
		$phone_number_1 = $_POST[ 'phone_number_1' ];
		$query .= " AND hotel_phone.phone_number = '$phone_number_1'";
	}
	else if ( !empty( $_POST[ 'phone_number_2' ] ) ) {
		$phone_number_2 = $_POST[ 'phone_number_2' ];
		$query .= " AND hotel_phone.phone_number = '$phone_number_2'";
	}
	
	$query .= ";";
	
	$hotels = DoQuery( $query );
	
	include 'hotels_services.php';
	include 'views/hotels_view.php';
	include 'views/footer.php';
?>