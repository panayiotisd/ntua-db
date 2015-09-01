<?php
	function AddReservation( $reservation_date, $start_date, $end_date, $payment_method, $customer_id, $hotel_id, $room_number ) {
        // Returns reservation_id on success, false on failure
		
		$res = mysql_query(
			"INSERT INTO
				reservations
			SET
				reservation_date = '$reservation_date',
				start_date = '$start_date',
				end_date = '$end_date',
				payment_method = '$payment_method',
				customer_id = '$customer_id',
				hotel_id = '$hotel_id',
				room_number = '$room_number';"
		);
		
		if ( !$res ) {
			// die for debug purposes
			die('AddReservation FAILED: ' . mysql_error());
			return false;
		}
		$id = mysql_insert_id();
        return $id;
    }

	function ReservationExists( $start_date, $end_date, $hotel_id, $room_number ) {
        // returns true if reservation exists, false if not
        $res = mysql_query(
            "SELECT
				reservation_id
			FROM
				reservations
			WHERE
				hotel_id = '$hotel_id' AND
				room_number = '$room_number' AND
				(
					(start_date < '$start_date' AND end_date > '$start_date' ) OR
					(start_date < '$end_date' AND end_date > '$end_date' )
				)
            LIMIT 1;"
        );
        
		if ( !$res ) {
			// die for debug purposes
			die('ReservationExists FAILED: ' . mysql_error());
			return false;
		}
		
        $exists = ( mysql_num_rows( $res ) == 1 );
        
        return $exists;
    }
	
	function ReservationExistsByID( $reservation_id ) {
        // returns true if reservation exists, false if not
        $res = mysql_query(
            "SELECT
                *
            FROM
                reservations
            WHERE
                reservation_id = '$reservation_id'
            LIMIT 1;"
        );
        
		if ( !$res ) {
			// die for debug purposes
			die('ReservationExistsByID FAILED: ' . mysql_error());
			return false;
		}
		
        $exists = ( mysql_num_rows( $res ) == 1 );
        
        return $exists;
    }
	
	function DeleteReservation($reservation_id) {
        // removes the reservation with the specified ID from the database
        $res = mysql_query(
            "DELETE FROM
                reservations
            WHERE
                reservation_id = '$reservation_id'"
        );
        
		if ( !$res ) {
			// die for debug purposes
			die('DeleteReservation FAILED: ' . mysql_error());
			return false;
		}
        
        return true;
    }
	
	function GetReservations() {
	//returns an array with all the reservations
        $res = mysql_query(
            "SELECT
                *
            FROM
                reservations"
        );
        
        $rows = array();
		
        while ( $row = mysql_fetch_array( $res ) ) {
            $rows[] = $row;
        }
        
        return $rows;
    }
	
	function ReservationInfo($reservation_id) {
		// returns reservation information
		$res = mysql_query(
            "SELECT
                *
            FROM
                reservations
			WHERE
				reservation_id = '$reservation_id'"
        );
        
        $res = mysql_fetch_array( $res );
        
        return $res;
	}
	
	function EditReservation( $reservation_id, $reservation_date, $start_date, $end_date, $payment_method, $customer_id, $hotel_id, $room_number ) {
        // Edits the tuple of the specified reservation. Returns true on 
		// success, false on failure.
		
		$res = mysql_query(
			"UPDATE
				reservations
			SET
				reservation_date = '$reservation_date',
				start_date = '$start_date',
				end_date = '$end_date',
				payment_method = '$payment_method',
				customer_id = '$customer_id',
				hotel_id = '$hotel_id',
				room_number = '$room_number'
			WHERE
				reservation_id = '$reservation_id';"
		);
		
		if ( !$res ) {
			// die for debug purposes
			die('EditReservation FAILED: ' . mysql_error());
			return false;
		}
		
        return $res;
    }
	
	function DoQueryReservations($query) {
	//returns an array with all the reservations that fulfil the requirements
        $res = mysql_query($query);
        
		if ( !$res ) {
			// die for debug purposes
			die('DoQueryReservations: ' . mysql_error());
			return false;
		}
		
        $rows = array();
		
        while ( $row = mysql_fetch_array( $res ) ) {
            $rows[] = $row;
        }
        
        return $rows;
    }
?>