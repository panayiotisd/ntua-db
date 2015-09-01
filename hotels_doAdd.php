<?php
    include 'models/database.php';
	include 'models/hotels.php';

    if (	isset( $_POST[ 'name' ] )
		&& 	isset( $_POST[ 'street' ] )
		&& 	isset( $_POST[ 'number' ] )
		&& 	isset( $_POST[ 'postalcode' ] )
		&& 	isset( $_POST[ 'city' ] )
		&& 	isset( $_POST[ 'rate' ] )
		&& 	isset( $_POST[ 'constructiondate' ] ) ) {
		
        $name = $_POST[ 'name' ];
        $street = $_POST[ 'street' ];
		$number = $_POST[ 'number' ];
        $postalcode = $_POST[ 'postalcode' ];
		$city = $_POST[ 'city' ];
        $rate = $_POST[ 'rate' ];
		$constructiondate = $_POST[ 'constructiondate' ];
        if ( isset( $_POST[ 'renovationdate' ] ) ) {
			$renovationdate = $_POST[ 'renovationdate' ];
		}
		else {
			$renovationdate = NULL;
		}
		// Phone Numbers
		if ( isset( $_POST[ 'phone_number_1' ] ) ) {
			$phone_number_1 = $_POST[ 'phone_number_1' ];
		}
		else {
			$phone_number_1 = NULL;
		}
		if ( isset( $_POST[ 'phone_number_2' ] ) ) {
			$phone_number_2 = $_POST[ 'phone_number_2' ];
		}
		else {
			$phone_number_2 = NULL;
		}
		
        $exists = HotelExists( $name, $street, $number, $city );
		
        if ( !$exists ) {
            $hotel_id = AddHotel( $name, $street, $number, $postalcode, $city, $rate, $constructiondate, $renovationdate, $phone_number_1, $phone_number_2);
			
			// Services
			if ( isset( $_POST[ 'Wifi' ] ) ) {
				$service = $_POST[ 'Wifi' ];
				$res = AddHotelService ( $hotel_id, $service );
			}
			if ( isset( $_POST[ 'Gym' ] ) ) {
				$service = $_POST[ 'Gym' ];
				$res = AddHotelService ( $hotel_id, $service );
			}
			if ( isset( $_POST[ 'Spa' ] ) ) {
				$service = $_POST[ 'Spa' ];
				$res = AddHotelService ( $hotel_id, $service );
			}
			if ( isset( $_POST[ 'Golf' ] ) ) {
				$service = $_POST[ 'Golf' ];
				$res = AddHotelService ( $hotel_id, $service );
			}
		
            header( 'Location: hotels_add.php?success=true' );
        }
        else {
            header( 'Location: hotels_add.php?exists=true' );
        }
    }
    else {
        header( 'Location: hotels_add.php?missing=true' );
    }
?>