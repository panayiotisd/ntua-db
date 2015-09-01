<?php
    include 'models/database.php';
	include 'models/customers.php';
	include 'views/header.php';
	include 'views/activeTab_customers.php';
	
    if ( isset( $_GET[ 'customer_id' ] ) ) {
		
        $customer_id = $_GET[ 'customer_id' ];
		
        $exists = CustomerExistsByID( $customer_id );
		
        if ( $exists ) {
            $customer = CustomerInfo( $customer_id );
			include 'views/customers_edit_form.php';
        }
        else {
            header( 'Location: customers_view.php?missing=true' );
        }
    }
    else {
        header( 'Location: customers_view.php' );
    }
	include 'views/footer.php';
?>