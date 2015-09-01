<?php
    include 'models/database.php';
	include 'models/reservations.php';
	
    if ( isset( $_GET[ 'reservation_id' ] ) ) {
		
        $reservation_id = $_GET[ 'reservation_id' ];
		
        $exists = ReservationExistsByID( $reservation_id );
		
        if ( $exists ) {
            $res = DeleteReservation( $reservation_id );
			
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
        header( 'Location: reservations_view.php' );
    }
?>