<?php
    include 'models/database.php';
	include 'models/customers.php';
	include 'views/header.php';
	include 'views/activeTab_customers.php';
	
	$query = "SELECT * FROM customers, customer_phone WHERE customers.customer_id = customer_phone.customer_id";
	
	if ( !empty( $_POST[ 'at' ] ) ) {
		$at = $_POST[ 'at' ];
		$query .= " AND customers.at = '$at'";
	}
	if ( !empty( $_POST[ 'name' ] ) ) {
		$name = $_POST[ 'name' ];
		$query .= " AND customers.name = '$name'";
	}
	if ( !empty( $_POST[ 'surname' ] ) ) {
		$surname = $_POST[ 'surname' ];
		$query .= " AND customers.surname = '$surname'";
	}
	if ( !empty( $_POST[ 'street' ] ) ) {
		$street = $_POST[ 'street' ];
		$query .= " AND customers.street = '$street'";
	}
	if ( !empty( $_POST[ 'number' ] ) ) {
		$number = $_POST[ 'number' ];
		$query .= " AND customers.number = '$number'";
	}
	if ( !empty( $_POST[ 'postalcode' ] ) ) {
		$postalcode = $_POST[ 'postalcode' ];
		$query .= " AND customers.postalcode = '$postalcode'";
	}
	if ( !empty( $_POST[ 'city' ] ) ) {
		$city = $_POST[ 'city' ];
		$query .= " AND customers.city = '$city'";
	}
	if ( !empty( $_POST[ 'ccn' ] ) ) {
		$ccn = $_POST[ 'ccn' ];
		$query .= " AND customers.ccn = '$ccn'";
	}
	if ( !empty( $_POST[ 'phone_number_1' ] ) ) {
		$phone_number_1 = $_POST[ 'phone_number_1' ];
		$query .= " AND customer_phone.phone_number = '$phone_number_1'";
	}
	else if ( !empty( $_POST[ 'phone_number_2' ] ) ) {
		$phone_number_2 = $_POST[ 'phone_number_2' ];
		$query .= " AND customer_phone.phone_number = '$phone_number_2'";
	}

	$query .= ";";
	
	$customers = DoQuery( $query );
	
	include 'customers_vip.php';
	include 'views/customers_view.php';
	include 'views/footer.php';
?>