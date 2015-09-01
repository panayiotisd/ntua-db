<?php
    include 'models/database.php';
	include 'models/customers.php';
	
    if (	isset( $_POST[ 'at' ] )
		&&	isset( $_POST[ 'name' ] )
		&&	isset( $_POST[ 'surname' ] )
		&& 	isset( $_POST[ 'street' ] )
		&& 	isset( $_POST[ 'number' ] )
		&& 	isset( $_POST[ 'postalcode' ] )
		&& 	isset( $_POST[ 'city' ] ) ) {
		
		$at = $_POST[ 'at' ];
        $name = $_POST[ 'name' ];
		$surname = $_POST[ 'surname' ];
        $street = $_POST[ 'street' ];
		$number = $_POST[ 'number' ];
        $postalcode = $_POST[ 'postalcode' ];
		$city = $_POST[ 'city' ];
        if ( isset( $_POST[ 'ccn' ] ) ) {
			$ccn = $_POST[ 'ccn' ];
		}
		else {
			$ccn = NULL;
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
		
        $exists = CustomerExists( $at );
		
        if ( !$exists ) {
            $customer_id = AddCustomer( $at, $name, $surname, $street, $number, $postalcode, $city, $ccn, $phone_number_1, $phone_number_2);

            header( 'Location: customers_add.php?success=true' );
        }
        else {
            header( 'Location: customers_add.php?exists=true' );
        }
    }
    else {
        header( 'Location: customers_add.php?missing=true' );
    }
?>