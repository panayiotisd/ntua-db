<?php
    include 'models/database.php';
	include 'models/reservations.php';
	include 'views/header.php';
	include 'views/activeTab_reservations.php';
	
	$query = "SELECT * FROM `reservations` WHERE 1";
	
    if ( !empty( $_POST[ 'reservation_date' ] ) ) {
		$reservation_date = $_POST[ 'reservation_date' ];
		$query .= " AND reservation_date = '$reservation_date'";
	}
	if ( !empty( $_POST[ 'start_date' ] ) ) {
		$start_date = $_POST[ 'start_date' ];
		$query .= " AND start_date = '$start_date'";
	}
	if ( !empty( $_POST[ 'end_date' ] ) ) {
		$end_date = $_POST[ 'end_date' ];
		$query .= " AND end_date = '$end_date'";
	}
	if ( !empty( $_POST[ 'payment_method' ] ) ) {
		$payment_method = $_POST[ 'payment_method' ];
		$query .= " AND payment_method = '$payment_method'";
	}
	if ( !empty( $_POST[ 'customer_id' ] ) ) {
		$customer_id = $_POST[ 'customer_id' ];
		$query .= " AND customer_id = '$customer_id'";
	}
	if ( !empty( $_POST[ 'hotel_id' ] ) ) {
		$hotel_id = $_POST[ 'hotel_id' ];
		$query .= " AND hotel_id = '$hotel_id'";
	}
	if ( !empty( $_POST[ 'room_number' ] ) ) {
		$room_number = $_POST[ 'room_number' ];
		$query .= " AND room_number = '$room_number'";
	}
	$query .= ";";
	
	$reservations = DoQueryReservations( $query );
	
	include 'views/reservations_view.php';
	include 'views/footer.php';
?>