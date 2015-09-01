<?php
    include 'models/database.php';
	include 'models/hotels.php';
	
    if ( isset( $_GET[ 'hotel_id' ] ) ) {
		
        $hotel_id = $_GET[ 'hotel_id' ];
		
        $exists = HotelExistsByID( $hotel_id );
		
        if ( $exists ) {
            $res = DeleteHotel( $hotel_id );
			
			if ( $res) {
				header( 'Location: hotels_view.php?success=true' );
			}
			else {
				header( 'Location: hotels_view.php?failed=true' );
			}
        }
        else {
            header( 'Location: hotels_view.php?missing=true' );
        }
    }
    else {
        header( 'Location: hotels_view.php' );
    }
?>