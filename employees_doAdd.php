<?php
    include 'models/database.php';
	include 'models/employees.php';
	
    if (	isset( $_POST[ 'ssn' ] )
		&&	isset( $_POST[ 'name' ] )
		&&	isset( $_POST[ 'surname' ] )
		&& 	isset( $_POST[ 'street' ] )
		&& 	isset( $_POST[ 'number' ] )
		&& 	isset( $_POST[ 'postalcode' ] )
		&& 	isset( $_POST[ 'city' ] ) 
		&& 	isset( $_POST[ 'hotel_id' ] )
		&& 	isset( $_POST[ 'start_date' ] )
		&& 	isset( $_POST[ 'salary' ] ) ) {
		
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
		
        $exists = EmployeeExists( $ssn );
		
        if ( !$exists ) {
            $employee_id = AddEmployee( $ssn, $name, $surname, $street, $number, $postalcode, $city, $hotel_id, $start_date, $end_date, $salary, $phone_number_1, $phone_number_2 );

            header( 'Location: employees_add.php?success=true' );
        }
        else {
            header( 'Location: employees_add.php?exists=true' );
        }
    }
    else {
        header( 'Location: employees_add.php?missing=true' );
    }
?>