<?php
    include 'models/database.php';
	include 'models/reservations.php';
	include 'models/customers.php';
	
    if (	isset( $_POST[ 'reservation_date' ] )
		&& 	isset( $_POST[ 'start_date' ] )
		&& 	isset( $_POST[ 'end_date' ] )
		&& 	isset( $_POST[ 'payment_method' ] )
		&& 	isset( $_POST[ 'at' ] )
		&& 	isset( $_POST[ 'hotel_id' ] )
		&& 	isset( $_POST[ 'room_number' ] ) ) {
		
        $reservation_date = $_POST[ 'reservation_date' ];
        $start_date = $_POST[ 'start_date' ];
		$end_date = $_POST[ 'end_date' ];
        $payment_method = $_POST[ 'payment_method' ];
		$at = $_POST[ 'at' ];
        $hotel_id = $_POST[ 'hotel_id' ];
		$room_number = $_POST[ 'room_number' ];
        
		$customer_id = GetCustomerID( $at );
		if( !$customer_id ) {
			// Μη καταχωρημένος πελάτης.
			header( 'Location: reservations_add.php?customer=false' );
		}
		
        $exists = ReservationExists( $start_date, $end_date, $hotel_id, $room_number );
		
        if ( !$exists ) {
            $reservation_id = AddReservation( $reservation_date, $start_date, $end_date, $payment_method, $customer_id, $hotel_id, $room_number );

            header( 'Location: reservations_add.php?success=true' );
        }
        else {
            header( 'Location: reservations_add.php?exists=true' );
        }
    }
    else {
        header( 'Location: reservations_add.php?missing=true' );
    }
?>