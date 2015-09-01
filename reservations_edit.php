<?php
    include 'models/database.php';
	include 'models/reservations.php';
	include 'views/header.php';
	include 'views/activeTab_reservations.php';
	
    if ( isset( $_GET[ 'reservation_id' ] ) ) {
		
        $reservation_id = $_GET[ 'reservation_id' ];
		
        $exists = ReservationExistsByID( $reservation_id );
		
        if ( $exists ) {
            $reservation = ReservationInfo( $reservation_id );
			include 'views/reservations_edit_form.php';
        }
        else {
            header( 'Location: reservations_view.php?missing=true' );
        }
    }
    else {
        header( 'Location: reservations_view.php' );
    }
	include 'views/footer.php';
?>