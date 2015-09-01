<?php
    include 'models/database.php';
	include 'models/hotels.php';
	include 'views/header.php';
	include 'views/activeTab_hotels.php';
	
    if ( isset( $_GET[ 'hotel_id' ] ) ) {
		
        $hotel_id = $_GET[ 'hotel_id' ];
		
        $exists = HotelExistsByID( $hotel_id );
		
        if ( $exists ) {
            $hotel = HotelInfo( $hotel_id );
			$hotel_services = GetHotelServices( $hotel_id );
			include 'views/hotels_edit_form.php';
        }
        else {
            header( 'Location: hotels_view.php?missing=true' );
        }
    }
    else {
        header( 'Location: hotels_view.php' );
    }
	include 'views/footer.php';
?>