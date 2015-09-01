<?php
    include 'models/database.php';
	include 'models/reservations.php';
	include 'models/customers.php';
	
    if (	isset( $_POST[ 'reservation_id' ] )
		&&	isset( $_POST[ 'reservation_date' ] )
		&& 	isset( $_POST[ 'start_date' ] )
		&& 	isset( $_POST[ 'end_date' ] )
		&& 	isset( $_POST[ 'payment_method' ] )
		&& 	isset( $_POST[ 'customer_id' ] )
		&& 	isset( $_POST[ 'hotel_id' ] )
		&& 	isset( $_POST[ 'room_number' ] ) ) {
		
		$reservation_id = $_POST[ 'reservation_id' ];
        $reservation_date = $_POST[ 'reservation_date' ];
        $start_date = $_POST[ 'start_date' ];
		$end_date = $_POST[ 'end_date' ];
        $payment_method = $_POST[ 'payment_method' ];
		$customer_id = $_POST[ 'customer_id' ];
        $hotel_id = $_POST[ 'hotel_id' ];
		$room_number = $_POST[ 'room_number' ];
        
		
        $exists = ReservationExistsByID( $reservation_id );
		
        if ( $exists ) {
			$valid = ReservationExists( $start_date, $end_date, $hotel_id, $room_number );
			if ( !$valid) {
				header( 'Location: reservations_view.php?invalid=true' );
			}
			
            $res = EditReservation( $reservation_id, $reservation_date, $start_date, $end_date, $payment_method, $customer_id, $hotel_id, $room_number );

            if ( $res) {
				header( 'Location: reservations_view.php?success=true' );
			}
			else {
				header( 'Location: reservations_view.php?failed=true' );
			}
        }
        else {
            header( 'Location: reservations_view.php?missing=true' );
        }
    }
    else {
        header( 'Location: reservations_edit.php?missing=true' );
    }
?>