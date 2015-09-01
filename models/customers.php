<?php
	function AddCustomer( $at, $name, $surname, $street, $number, $postalcode, $city, $ccn, $phone_number_1, $phone_number_2) {
        // Returns customer_id on success, false on failure
		
		if ( $ccn ) {
			$res = mysql_query(
				"INSERT INTO
					customers
				SET
					at = '$at',
					name = '$name',
					surname = '$surname',
					street = '$street',
					number = '$number',
					postalcode = '$postalcode',
					city = '$city',
					ccn = '$ccn';"
			);
		}
		else {
			// ccn <- NULL
			$res = mysql_query(
				"INSERT INTO
					customers
				SET
					at = '$at',
					name = '$name',
					surname = '$surname',
					street = '$street',
					number = '$number',
					postalcode = '$postalcode',
					city = '$city';"
			);
		}
		
		if ( !$res ) {
			// die for debug purposes
			die('AddCustomer FAILED: ' . mysql_error());
			return false;
		}
		$id = mysql_insert_id();
		
		// Insert Phone Numbers
		if ( $phone_number_1 ) {
			$res = mysql_query(
				"INSERT INTO
					customer_phone
				SET
					customer_id = '$id',
					phone_number = '$phone_number_1';"
			);
		}
		if ( !$res ) {
			// die for debug purposes
			die('AddCustomerPhone1 FAILED: ' . mysql_error());
			return false;
		}
		if ( $phone_number_2 ) {
			$res = mysql_query(
				"INSERT INTO
					customer_phone
				SET
					customer_id = '$id',
					phone_number = '$phone_number_2';"
			);
		}
		if ( !$res ) {
			// die for debug purposes
			die('AddCustomerPhone2 FAILED: ' . mysql_error());
			return false;
		}
		
        return $id;
    }

	function CustomerExists( $at ) {
        // returns true if customer exists, false if not
        $res = mysql_query(
            "SELECT
                customer_id
            FROM
                customers
            WHERE
                at = '$at'
            LIMIT 1;"
        );
        
		if ( !$res ) {
			// die for debug purposes
			die('CustomerExists FAILED: ' . mysql_error());
			return false;
		}
		
        $exists = ( mysql_num_rows( $res ) == 1 );
        
        return $exists;
    }
	
	function CustomerExistsByID( $customer_id ) {
        // returns true if customer exists, false if not
        $res = mysql_query(
            "SELECT
                *
            FROM
                customers
            WHERE
                customer_id = '$customer_id'
            LIMIT 1;"
        );
        
		if ( !$res ) {
			// die for debug purposes
			die('CustomerExistsByID FAILED: ' . mysql_error());
			return false;
		}
		
        $exists = ( mysql_num_rows( $res ) == 1 );
        
        return $exists;
    }
	
	function DeleteCustomer($customer_id) {
        // removes the customer with the specified ID from the database
        $res = mysql_query(
            "DELETE FROM
                customers
            WHERE
                customer_id = '$customer_id'"
        );
        
		if ( !$res ) {
			// die for debug purposes
			die('DeleteCustomer FAILED: ' . mysql_error());
			return false;
		}
        
        return true;
    }
	
	function GetCustomers() {
	//returns an array with all the customers
        $res = mysql_query(
            "SELECT
                *
            FROM
                customers LEFT JOIN customer_phone
			ON
				customers.customer_id = customer_phone.customer_id"
        );
        
        $rows = array();
		
        while ( $row = mysql_fetch_array( $res ) ) {
            $rows[] = $row;
        }
		
        return $rows;
    }
	
	function CustomerInfo($customer_id) {
		// returns customer information
		$res = mysql_query(
            "SELECT
                *
            FROM
                customers LEFT JOIN customer_phone
			ON
				customers.customer_id = customer_phone.customer_id AND
				customers.customer_id = '$customer_id'"
        );
        
		$rows = array();
		
        while ( $row = mysql_fetch_array( $res ) ) {
            $rows[] = $row;
        }
		
        return $rows;
	}
	
	function EditCustomer( $customer_id, $at, $name, $surname, $street, $number, $postalcode, $city, $ccn, $phone_number_1, $phone_number_2, $old_phone_number_1, $old_phone_number_2) {
        // Edits the tuple of the specified customer. Returns true on 
		// success, false on failure.
		
		if ( $ccn ) {
			$res = mysql_query(
				"UPDATE
					customers
				SET
					at = '$at',
					name = '$name',
					surname = '$surname',
					street = '$street',
					number = '$number',
					postalcode = '$postalcode',
					city = '$city',
					ccn = '$ccn'
				WHERE
					customer_id = '$customer_id';"
			);
		}
		else {
			// ccn <- NULL
			$res = mysql_query(
				"UPDATE
					customers
				SET
					at = '$at',
					name = '$name',
					surname = '$surname',
					street = '$street',
					number = '$number',
					postalcode = '$postalcode',
					city = '$city',
					ccn = NULL
				WHERE
					customer_id = '$customer_id';"
			);
		}
		
		if ( !$res ) {
			// die for debug purposes
			die('EditCustomer FAILED: ' . mysql_error());
			return false;
		}
		
		// Change Phone Numbers
		if ( $old_phone_number_1 != $phone_number_1 ) {
			if ( !empty( $old_phone_number_1 ) ) {
				if ( !empty( $phone_number_1 ) ) {
					$res = mysql_query(
						"UPDATE
							customer_phone
						SET
							phone_number = '$phone_number_1'
						WHERE
							customer_id = '$customer_id' AND
							phone_number = '$old_phone_number_1';"
					);
					if ( !$res ) {
						// die for debug purposes
						die('EditCustomerPhone1-Update: ' . mysql_error());
						return false;
					}
				}
				else {
					$res = mysql_query(
						"DELETE FROM
							customer_phone
						WHERE
							phone_number = '$old_phone_number_1'"
					);
					if ( !$res ) {
						// die for debug purposes
						die('EditCustomerPhone1-Update: ' . mysql_error());
						return false;
					}
				}
			}
			else {
				$res = mysql_query(
					"INSERT INTO
						customer_phone
					SET
						customer_id = '$customer_id',
						phone_number = '$phone_number_1';"
				);
				if ( !$res ) {
					// die for debug purposes
					die('EditCustomerPhone1-Insert: ' . mysql_error());
					return false;
				}
			}
		}
		
		if ( $old_phone_number_2 != $phone_number_2 ) {
			if ( !empty( $old_phone_number_2 ) ) {
				if ( !empty( $phone_number_2 ) ) {
					$res = mysql_query(
						"UPDATE
							customer_phone
						SET
							phone_number = '$phone_number_2'
						WHERE
							customer_id = '$customer_id' AND
							phone_number = '$old_phone_number_2';"
					);
					if ( !$res ) {
						// die for debug purposes
						die('EditCustomerPhone2-Update: ' . mysql_error());
						return false;
					}
				}
				else {
					$res = mysql_query(
						"DELETE FROM
							customer_phone
						WHERE
							phone_number = '$old_phone_number_2'"
					);
					if ( !$res ) {
						// die for debug purposes
						die('EditCustomerPhone2-Update: ' . mysql_error());
						return false;
					}
				}
			}
			else {
				$res = mysql_query(
					"INSERT INTO
						customer_phone
					SET
						customer_id = '$customer_id',
						phone_number = '$phone_number_2';"
				);
				if ( !$res ) {
					// die for debug purposes
					die('EditCustomerPhone2-Insert: ' . mysql_error());
					return false;
				}
			}
		}
		
        return $res;
    }
	
	function DoQuery($query) {
	//returns an array with all the customers that fulfil the requirements
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
	
	function GetCustomerID($at) {
		// returns customer_id
		$res = mysql_query(
            "SELECT
                customer_id
            FROM
                customers
			WHERE
				at = '$at'"
        );
        
		if ( !$res ) {
			// die for debug purposes
			die('GetCustomerID FAILED: ' . mysql_error());
			return false;
		}
		
        $res = mysql_fetch_array( $res );
		
        return $res[0];
	}
	
	function CheckVipStatus($customer_id) {
		// returns true if customer is a VIP, false otherwise
		$res = mysql_query(
            "SELECT
                *
            FROM
                vip
			WHERE
				customer_id = '$customer_id'"
        );
        
		if ( !$res ) {
			// die for debug purposes
			die('CheckVipStatus FAILED: ' . mysql_error());
			return false;
		}
		
        $vip = ( mysql_num_rows( $res ) == 1 );
        
        return $vip;
	}
?>