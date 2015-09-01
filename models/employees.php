<?php
	function AddEmployee( $ssn, $name, $surname, $street, $number, $postalcode, $city, $hotel_id, $start_date, $end_date, $salary, $phone_number_1, $phone_number_2 ) {
        // Returns employee_id on success, false on failure
		
		if ( $end_date ) {
			$res = mysql_query(
				"INSERT INTO
					employees
				SET
					ssn = '$ssn',
					name = '$name',
					surname = '$surname',
					street = '$street',
					number = '$number',
					postalcode = '$postalcode',
					city = '$city',
					hotel_id = '$hotel_id',
					salary = '$salary',
					start_date = '$start_date',
					end_date = '$end_date';"
			);
		}
		else {
			// end_date <- NULL
			$res = mysql_query(
				"INSERT INTO
					employees
				SET
					ssn = '$ssn',
					name = '$name',
					surname = '$surname',
					street = '$street',
					number = '$number',
					postalcode = '$postalcode',
					city = '$city',
					hotel_id = '$hotel_id',
					salary = '$salary',
					start_date = '$start_date';"
			);
		}
		
		if ( !$res ) {
			// die for debug purposes
			die('AddEmployee FAILED: ' . mysql_error());
			return false;
		}
		$id = mysql_insert_id();
		
		// Insert Phone Numbers
		if ( $phone_number_1 ) {
			$res = mysql_query(
				"INSERT INTO
					employee_phone
				SET
					employee_id = '$id',
					phone_number = '$phone_number_1';"
			);
		}
		if ( !$res ) {
			// die for debug purposes
			die('AddEmployeePhone1 FAILED: ' . mysql_error());
			return false;
		}
		if ( $phone_number_2 ) {
			$res = mysql_query(
				"INSERT INTO
					employee_phone
				SET
					employee_id = '$id',
					phone_number = '$phone_number_2';"
			);
		}
		if ( !$res ) {
			// die for debug purposes
			die('AddEmployeePhone2 FAILED: ' . mysql_error());
			return false;
		}
		
        return $id;
    }

	function EmployeeExists( $ssn ) {
        // returns true if employee exists, false if not
        $res = mysql_query(
            "SELECT
                employee_id
            FROM
                employees
            WHERE
                ssn = '$ssn'
            LIMIT 1;"
        );
        
		if ( !$res ) {
			// die for debug purposes
			die('EmployeeExists FAILED: ' . mysql_error());
			return false;
		}
		
        $exists = ( mysql_num_rows( $res ) == 1 );
        
        return $exists;
    }
	
	function EmployeeExistsByID( $employee_id ) {
        // returns true if employee exists, false if not
        $res = mysql_query(
            "SELECT
                *
            FROM
                employees
            WHERE
                employee_id = '$employee_id'
            LIMIT 1;"
        );
        
		if ( !$res ) {
			// die for debug purposes
			die('EmployeeExistsByID FAILED: ' . mysql_error());
			return false;
		}
		
        $exists = ( mysql_num_rows( $res ) == 1 );
        
        return $exists;
    }
	
	function DeleteEmployee($employee_id) {
        // removes the employee with the specified ID from the database
        $res = mysql_query(
            "DELETE FROM
                employees
            WHERE
                employee_id = '$employee_id'"
        );
        
		if ( !$res ) {
			// die for debug purposes
			die('DeleteEmployee FAILED: ' . mysql_error());
			return false;
		}
        
        return true;
    }
	
	function GetEmployees() {
	//returns an array with all the employees
        $res = mysql_query(
            "SELECT
                *
            FROM
                employees LEFT JOIN employee_phone
			ON
				employees.employee_id = employee_phone.employee_id"
        );
        
        $rows = array();
		
        while ( $row = mysql_fetch_array( $res ) ) {
            $rows[] = $row;
        }
		
        return $rows;
    }
	
	function GetHighSalaryEmployees() {
	//returns an array with the employees with salary > 1400
        $res = mysql_query(
            "SELECT
                *
            FROM
                high_salaries"
        );
        
        $rows = array();
		
        while ( $row = mysql_fetch_array( $res ) ) {
            $rows[] = $row;
        }
		
        return $rows;
    }
	
	function EmployeeInfo($employee_id) {
		// returns employee information
		$res = mysql_query(
            "SELECT
                *
            FROM
                employees LEFT JOIN employee_phone
			ON
				employees.employee_id = employee_phone.employee_id AND
				employees.employee_id = '$employee_id'"
        );
        
		$rows = array();
		
        while ( $row = mysql_fetch_array( $res ) ) {
            $rows[] = $row;
        }
		
        return $rows;
	}
	
	function EditEmployee( $employee_id, $ssn, $name, $surname, $street, $number, $postalcode, $city, $hotel_id, $start_date, $end_date, $salary, $phone_number_1, $phone_number_2, $old_phone_number_1, $old_phone_number_2 ) {
        // Edits the tuple of the specified employee. 
		// Returns true on success, false on failure.
		
		if ( $end_date ) {
			$res = mysql_query(
				"UPDATE
					employees
				SET
					ssn = '$ssn',
					name = '$name',
					surname = '$surname',
					street = '$street',
					number = '$number',
					postalcode = '$postalcode',
					city = '$city',
					hotel_id = '$hotel_id',
					salary = '$salary',
					start_date = '$start_date',
					end_date = '$end_date'
				WHERE
					employee_id = '$employee_id';"
			);
		}
		else {
			// end_date <- NULL
			$res = mysql_query(
				"UPDATE
					employees
				SET
					ssn = '$ssn',
					name = '$name',
					surname = '$surname',
					street = '$street',
					number = '$number',
					postalcode = '$postalcode',
					city = '$city',
					hotel_id = '$hotel_id',
					salary = '$salary',
					start_date = '$start_date',
					end_date = NULL
				WHERE
					employee_id = '$employee_id';"
			);
		}
		
		if ( !$res ) {
			// die for debug purposes
			die('EditEmployee FAILED: ' . mysql_error());
			return false;
		}
		
		// Change Phone Numbers
		if ( $old_phone_number_1 != $phone_number_1 ) {
			if ( !empty( $old_phone_number_1 ) ) {
				if ( !empty( $phone_number_1 ) ) {
					$res = mysql_query(
						"UPDATE
							employee_phone
						SET
							phone_number = '$phone_number_1'
						WHERE
							employee_id = '$employee_id' AND
							phone_number = '$old_phone_number_1';"
					);
					if ( !$res ) {
						// die for debug purposes
						die('EditEmployeePhone1-Update: ' . mysql_error());
						return false;
					}
				}
				else {
					$res = mysql_query(
						"DELETE FROM
							employee_phone
						WHERE
							phone_number = '$old_phone_number_1'"
					);
					if ( !$res ) {
						// die for debug purposes
						die('EditEmployeePhone1-Update: ' . mysql_error());
						return false;
					}
				}
			}
			else {
				$res = mysql_query(
					"INSERT INTO
						employee_phone
					SET
						employee_id = '$employee_id',
						phone_number = '$phone_number_1';"
				);
				if ( !$res ) {
					// die for debug purposes
					die('EditEmployeePhone1-Insert: ' . mysql_error());
					return false;
				}
			}
		}
		
		if ( $old_phone_number_2 != $phone_number_2 ) {
			if ( !empty( $old_phone_number_2 ) ) {
				if ( !empty( $phone_number_2 ) ) {
					$res = mysql_query(
						"UPDATE
							employee_phone
						SET
							phone_number = '$phone_number_2'
						WHERE
							employee_id = '$employee_id' AND
							phone_number = '$old_phone_number_2';"
					);
					if ( !$res ) {
						// die for debug purposes
						die('EditEmployeePhone2-Update: ' . mysql_error());
						return false;
					}
				}
				else {
					$res = mysql_query(
						"DELETE FROM
							employee_phone
						WHERE
							phone_number = '$old_phone_number_2'"
					);
					if ( !$res ) {
						// die for debug purposes
						die('EditEmployeePhone2-Update: ' . mysql_error());
						return false;
					}
				}
			}
			else {
				$res = mysql_query(
					"INSERT INTO
						employee_phone
					SET
						employee_id = '$employee_id',
						phone_number = '$phone_number_2';"
				);
				if ( !$res ) {
					// die for debug purposes
					die('EditEmployeePhone2-Insert: ' . mysql_error());
					return false;
				}
			}
		}
		
        return $res;
    }
	
	function DoQuery($query) {
	//returns an array with all the employees that fulfil the requirements
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
	
	function GetEmployeeID($ssn) {
		// returns employee_id
		$res = mysql_query(
            "SELECT
                employee_id
            FROM
                employees
			WHERE
				ssn = '$ssn'"
        );
        
		if ( !$res ) {
			// die for debug purposes
			die('GetEmployeeID FAILED: ' . mysql_error());
			return false;
		}
		
        $res = mysql_fetch_array( $res );
		
        return $res[0];
	}
?>