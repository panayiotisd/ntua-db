<?php
	function AddHotel( $name, $street, $number, $postalcode, $city, $rate, $constructiondate, $renovationdate) {
        // Returns hotel_id on success, false on failure
		
		if ( $renovationdate ) {
			$res = mysql_query(
				"INSERT INTO
					hotels
				SET
					name = '$name',
					street = '$street',
					number = '$number',
					postalcode = '$postalcode',
					city = '$city',
					rate = '$rate',
					construction_year = '$constructiondate',
					renovation_year = '$renovationdate';"
			);
		}
		else {
			// renovation_year <- NULL
			$res = mysql_query(
				"INSERT INTO
					hotels
				SET
					name = '$name',
					street = '$street',
					number = '$number',
					postalcode = '$postalcode',
					city = '$city',
					rate = '$rate',
					construction_year = '$constructiondate';"
			);
		}
		
		if ( !$res ) {
			// die for debug purposes
			die('AddHotel FAILED: ' . mysql_error());
			return false;
		}
		$id = mysql_insert_id();
		
		// Insert Phone Numbers
		if ( $phone_number_1 ) {
			$res = mysql_query(
				"INSERT INTO
					hotel_phone
				SET
					hotel_id = '$id',
					phone_number = '$phone_number_1';"
			);
		}
		if ( !$res ) {
			// die for debug purposes
			die('AddHotelPhone1 FAILED: ' . mysql_error());
			return false;
		}
		if ( $phone_number_2 ) {
			$res = mysql_query(
				"INSERT INTO
					hotel_phone
				SET
					hotel_id = '$id',
					phone_number = '$phone_number_2';"
			);
		}
		if ( !$res ) {
			// die for debug purposes
			die('AddHotelPhone2 FAILED: ' . mysql_error());
			return false;
		}
		
        return $id;
    }
	
	function AddHotelService ( $hotel_id, $service ) {
		// Returns true on success, false on failure

		$res = mysql_query(
			"INSERT INTO
				hotel_service
			SET
				hotel_id = '$hotel_id',
				service = '$service';"
		);
		
		if ( !$res ) {
			// die for debug purposes
			die('AddHotelService FAILED: ' . mysql_error());
			return false;
		}

		return $res;
	}
	
	function DeleteHotelService ( $hotel_id, $service ) {
		// Returns true on success, false on failure

		$res = mysql_query(
			"DELETE FROM
				hotel_service
			WHERE
				hotel_id = '$hotel_id' AND
				service = '$service';"
		);
		
		if ( !$res ) {
			// die for debug purposes
			die('DeleteHotelService FAILED: ' . mysql_error());
			return false;
		}

		return $res;
	}

	function HotelExists( $name, $street, $number, $city ) {
        // returns true if hotel exists, false if not
        $res = mysql_query(
            "SELECT
                hotel_id
            FROM
                hotels
            WHERE
                name = '$name'AND
				street = '$street'AND
                number = '$number'AND
				city = '$city'
            LIMIT 1;"
        );
        
		if ( !$res ) {
			// die for debug purposes
			die('HotelExists FAILED: ' . mysql_error());
			return false;
		}
		
        $exists = ( mysql_num_rows( $res ) == 1 );
        
        return $exists;
    }
	
	function HotelExistsByID( $hotel_id ) {
        // returns true if hotel exists, false if not
        $res = mysql_query(
            "SELECT
                *
            FROM
                hotels
            WHERE
                hotel_id = '$hotel_id'
            LIMIT 1;"
        );
        
		if ( !$res ) {
			// die for debug purposes
			die('HotelExistsByID FAILED: ' . mysql_error());
			return false;
		}
		
        $exists = ( mysql_num_rows( $res ) == 1 );
        
        return $exists;
    }
	
	function DeleteHotel($hotel_id) {
        // removes the hotel with the specified ID from the database
        $res = mysql_query(
            "DELETE FROM
                hotels
            WHERE
                hotel_id = '$hotel_id'"
        );
        
		if ( !$res ) {
			// die for debug purposes
			die('DeleteHotel FAILED: ' . mysql_error());
			return false;
		}
        
        return true;
    }
	
	function GetHotels() {
		//returns an array with all the hotels
        $res = mysql_query(
            "SELECT
                *
            FROM
                hotels LEFT JOIN hotel_phone
			ON
				hotels.hotel_id = hotel_phone.hotel_id"
        );
        
        $rows = array();
		
        while ( $row = mysql_fetch_array( $res ) ) {
            $rows[] = $row;
        }
        
        return $rows;
    }
	
	function GetLuxuryHotels() {
		//returns an array with the luxury hotels
        $res = mysql_query(
            "SELECT
                *
            FROM
                luxury_hotels"
        );
        
        $rows = array();
		
        while ( $row = mysql_fetch_array( $res ) ) {
            $rows[] = $row;
        }
        
        return $rows;
    }
	
	function GetHotelServices($hotel_id) {
		// returns hotel services
		$res = mysql_query(
            "SELECT
                service
            FROM
                hotel_service
			WHERE
				hotel_id = '$hotel_id'"
        );
        
        $rows = array();
		
        while ( $row = mysql_fetch_array( $res ) ) {
            $rows[] = $row;
        }
		
        return $rows;
	}
	
	function HotelInfo($hotel_id) {
		// returns hotel information
		$res = mysql_query(
            "SELECT
                *
            FROM
                hotels LEFT JOIN hotel_phone
			ON
				hotels.hotel_id = hotel_phone.hotel_id AND
				hotels.hotel_id = '$hotel_id'"
        );
        
        $rows = array();
		
        while ( $row = mysql_fetch_array( $res ) ) {
            $rows[] = $row;
        }
		
        return $rows;
	}
	
	function EditHotel( $hotel_id, $name, $street, $number, $postalcode, $city, $rate, $constructiondate, $renovationdate, $phone_number_1, $phone_number_2, $old_phone_number_1, $old_phone_number_2) {
        // Edits the tuple of the specified hotel. Returns true on success,
		// false on failure.
		
		if ( $renovationdate ) {
			$res = mysql_query(
				"UPDATE
					hotels
				SET
					name = '$name',
					street = '$street',
					number = '$number',
					postalcode = '$postalcode',
					city = '$city',
					rate = '$rate',
					construction_year = '$constructiondate',
					renovation_year = '$renovationdate'
				WHERE
					hotel_id = '$hotel_id';"
			);
		}
		else {
			// renovation_year <- NULL
			$res = mysql_query(
				"UPDATE
					hotels
				SET
					name = '$name',
					street = '$street',
					number = '$number',
					postalcode = '$postalcode',
					city = '$city',
					rate = '$rate',
					construction_year = '$constructiondate',
					renovation_year = NULL
				WHERE
					hotel_id = '$hotel_id';"
			);
		}
		
		if ( !$res ) {
			// die for debug purposes
			die('EditHotel FAILED: ' . mysql_error());
			return false;
		}
		
        // Change Phone Numbers
		if ( $old_phone_number_1 != $phone_number_1 ) {
			if ( !empty( $old_phone_number_1 ) ) {
				if ( !empty( $phone_number_1 ) ) {
					$res = mysql_query(
						"UPDATE
							hotel_phone
						SET
							phone_number = '$phone_number_1'
						WHERE
							hotel_id = '$hotel_id' AND
							phone_number = '$old_phone_number_1';"
					);
					if ( !$res ) {
						// die for debug purposes
						die('EdithotelPhone1-Update: ' . mysql_error());
						return false;
					}
				}
				else {
					$res = mysql_query(
						"DELETE FROM
							hotel_phone
						WHERE
							phone_number = '$old_phone_number_1'"
					);
					if ( !$res ) {
						// die for debug purposes
						die('EdithotelPhone1-Update: ' . mysql_error());
						return false;
					}
				}
			}
			else {
				$res = mysql_query(
					"INSERT INTO
						hotel_phone
					SET
						hotel_id = '$hotel_id',
						phone_number = '$phone_number_1';"
				);
				if ( !$res ) {
					// die for debug purposes
					die('EdithotelPhone1-Insert: ' . mysql_error());
					return false;
				}
			}
		}
		
		if ( $old_phone_number_2 != $phone_number_2 ) {
			if ( !empty( $old_phone_number_2 ) ) {
				if ( !empty( $phone_number_2 ) ) {
					$res = mysql_query(
						"UPDATE
							hotel_phone
						SET
							phone_number = '$phone_number_2'
						WHERE
							hotel_id = '$hotel_id' AND
							phone_number = '$old_phone_number_2';"
					);
					if ( !$res ) {
						// die for debug purposes
						die('EdithotelPhone2-Update: ' . mysql_error());
						return false;
					}
				}
				else {
					$res = mysql_query(
						"DELETE FROM
							hotel_phone
						WHERE
							phone_number = '$old_phone_number_2'"
					);
					if ( !$res ) {
						// die for debug purposes
						die('EdithotelPhone2-Update: ' . mysql_error());
						return false;
					}
				}
			}
			else {
				$res = mysql_query(
					"INSERT INTO
						hotel_phone
					SET
						hotel_id = '$hotel_id',
						phone_number = '$phone_number_2';"
				);
				if ( !$res ) {
					// die for debug purposes
					die('EdithotelPhone2-Insert: ' . mysql_error());
					return false;
				}
			}
		}
		
        return $res;
    }
	
	function DoQuery($query) {
	//returns an array with all the hotels that fulfil the requirements
        $res = mysql_query($query);
        
		if ( !$res ) {
			// die for debug purposes
			die('DoQuery: ' . mysql_error());
			return false;
		}
		
        $rows = array();
		
        while ( $row = mysql_fetch_array( $res ) ) {
            $rows[] = $row;
        }
        
        return $rows;
    }
	
	function GetAvgSalaryPerHotel() {
		//returns an array with the average salary for each hotel
        $res = mysql_query(
            "SELECT
                *
            FROM
                average_salary"
        );
        
        $rows = array();
		
        while ( $row = mysql_fetch_array( $res ) ) {
            $rows[] = $row;
        }
        
        return $rows;
    }
?>