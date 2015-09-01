<?php
    include 'models/database.php';
	include 'models/customers.php';
	
    if ( isset( $_GET[ 'customer_id' ] ) ) {
		
        $customer_id = $_GET[ 'customer_id' ];
		
        $exists = CustomerExistsByID( $customer_id );
		
        if ( $exists ) {
            $res = DeleteCustomer( $customer_id );
			
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
        header( 'Location: customers_view.php' );
    }
?>