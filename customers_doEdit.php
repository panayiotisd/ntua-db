<?php
    include 'models/database.php';
	include 'models/customers.php';
	
    if (	isset( $_POST[ 'customer_id' ] )
		&&	isset( $_POST[ 'at' ] )
		&&	isset( $_POST[ 'name' ] )
		&&	isset( $_POST[ 'surname' ] )
		&& 	isset( $_POST[ 'street' ] )
		&& 	isset( $_POST[ 'number' ] )
		&& 	isset( $_POST[ 'postalcode' ] )
		&& 	isset( $_POST[ 'city' ] ) ) {
		
		$customer_id = $_POST[ 'customer_id' ];
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
		
        $exists = CustomerExistsByID( $customer_id );
		
        if ( $exists ) {
            $res = EditCustomer( $customer_id, $at, $name, $surname, $street, $number, $postalcode, $city, $ccn, $phone_number_1, $phone_number_2, $old_phone_number_1, $old_phone_number_2);

            if ( $res) {
				header( 'Location: customers_view.php?success=true' );
			}
			else {
				header( 'Location: customers_view.php?failed=true' );
			}
        }
        else {
            header( 'Location: customers_view.php?missing=true' );
        }
    }
    else {
        header( 'Location: customers_edit.php?missing=true' );
    }
?>