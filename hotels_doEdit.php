<?php
    include 'models/database.php';
	include 'models/hotels.php';
	
    if (	isset( $_POST[ 'hotel_id' ] )
		&&	isset( $_POST[ 'name' ] )
		&& 	isset( $_POST[ 'street' ] )
		&& 	isset( $_POST[ 'number' ] )
		&& 	isset( $_POST[ 'postalcode' ] )
		&& 	isset( $_POST[ 'city' ] )
		&& 	isset( $_POST[ 'rate' ] )
		&& 	isset( $_POST[ 'constructiondate' ] ) ) {
		
		$hotel_id = $_POST[ 'hotel_id' ];
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
		if ( isset( $_POST[ 'old_phone_number_1' ] ) ) {
			$old_phone_number_1 = $_POST[ 'old_phone_number_1' ];
		}
		else {
			$old_phone_number_1 = NULL;
		}
		if ( isset( $_POST[ 'old_phone_number_2' ] ) ) {
			$old_phone_number_2 = $_POST[ 'old_phone_number_2' ];
		}
		else {
			$old_phone_number_2 = NULL;
		}
		
        $exists = HotelExistsByID( $hotel_id );
		
        if ( $exists ) {
            $res = EditHotel( $hotel_id, $name, $street, $number, $postalcode, $city, $rate, $constructiondate, $renovationdate, $phone_number_1, $phone_number_2, $old_phone_number_1, $old_phone_number_2);
			
			// Services
			if ( isset( $_POST[ 'Wifi' ] ) ) {
				$service = $_POST[ 'Wifi' ];
				$res = DeleteHotelService ( $hotel_id, $service );
				$res = AddHotelService ( $hotel_id, $service );
			}
			else {
				$res = DeleteHotelService ( $hotel_id, $service );
			}
			if ( isset( $_POST[ 'Gym' ] ) ) {
				$service = $_POST[ 'Gym' ];
				$res = DeleteHotelService ( $hotel_id, $service );
				$res = AddHotelService ( $hotel_id, $service );
			}
			else {
				$res = DeleteHotelService ( $hotel_id, $service );
			}
			if ( isset( $_POST[ 'Spa' ] ) ) {
				$service = $_POST[ 'Spa' ];
				$res = DeleteHotelService ( $hotel_id, $service );
				$res = AddHotelService ( $hotel_id, $service );
			}
			else {
				$res = DeleteHotelService ( $hotel_id, $service );
			}
			if ( isset( $_POST[ 'Golf' ] ) ) {
				$service = $_POST[ 'Golf' ];
				$res = DeleteHotelService ( $hotel_id, $service );
				$res = AddHotelService ( $hotel_id, $service );
			}
			else {
				$res = DeleteHotelService ( $hotel_id, $service );
			}
			
			
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
        header( 'Location: hotels_edit.php?missing=true' );
    }
?>