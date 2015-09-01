<?php
    include 'models/database.php';
	include 'models/employees.php';
	
    if (	isset( $_POST[ 'employee_id' ] )
		&&	isset( $_POST[ 'ssn' ] )
		&&	isset( $_POST[ 'name' ] )
		&&	isset( $_POST[ 'surname' ] )
		&& 	isset( $_POST[ 'street' ] )
		&& 	isset( $_POST[ 'number' ] )
		&& 	isset( $_POST[ 'postalcode' ] )
		&& 	isset( $_POST[ 'city' ] ) 
		&& 	isset( $_POST[ 'hotel_id' ] )
		&& 	isset( $_POST[ 'start_date' ] )
		&& 	isset( $_POST[ 'salary' ] ) ) {
		
		$employee_id = $_POST[ 'employee_id' ];
		$ssn = $_POST[ 'ssn' ];
        $name = $_POST[ 'name' ];
		$surname = $_POST[ 'surname' ];
        $street = $_POST[ 'street' ];
		$number = $_POST[ 'number' ];
        $postalcode = $_POST[ 'postalcode' ];
		$city = $_POST[ 'city' ];
		$hotel_id = $_POST[ 'hotel_id' ];
		$start_date = $_POST[ 'start_date' ];
		$salary = $_POST[ 'salary' ];
        if ( isset( $_POST[ 'end_date' ] ) ) {
			$end_date = $_POST[ 'end_date' ];
		}
		else {
			$end_date = NULL;
		}
		
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
		
        $exists = EmployeeExistsByID( $employee_id );
		
        if ( $exists ) {
            $res = EditEmployee( $employee_id, $ssn, $name, $surname, $street, $number, $postalcode, $city, $hotel_id, $start_date, $end_date, $salary, $phone_number_1, $phone_number_2, $old_phone_number_1, $old_phone_number_2 );

            if ( $res) {
				header( 'Location: employees_view.php?success=true' );
			}
			else {
				header( 'Location: employees_view.php?failed=true' );
			}
        }
        else {
            header( 'Location: employees_view.php?missing=true' );
        }
    }
    else {
        header( 'Location: employees_edit.php?missing=true' );
    }
?>