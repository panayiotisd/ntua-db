<?php
    include 'models/database.php';
	include 'models/employees.php';
	include 'views/header.php';
	include 'views/activeTab_employees.php';
	
	$query = "SELECT * FROM employees, employee_phone WHERE employees.employee_id = employee_phone.employee_id";
	
	if ( !empty( $_POST[ 'ssn' ] ) ) {
		$ssn = $_POST[ 'ssn' ];
		$query .= " AND employees.ssn = '$ssn'";
	}
	if ( !empty( $_POST[ 'name' ] ) ) {
		$name = $_POST[ 'name' ];
		$query .= " AND employees.name = '$name'";
	}
	if ( !empty( $_POST[ 'surname' ] ) ) {
		$surname = $_POST[ 'surname' ];
		$query .= " AND employees.surname = '$surname'";
	}
	if ( !empty( $_POST[ 'street' ] ) ) {
		$street = $_POST[ 'street' ];
		$query .= " AND employees.street = '$street'";
	}
	if ( !empty( $_POST[ 'number' ] ) ) {
		$number = $_POST[ 'number' ];
		$query .= " AND employees.number = '$number'";
	}
	if ( !empty( $_POST[ 'postalcode' ] ) ) {
		$postalcode = $_POST[ 'postalcode' ];
		$query .= " AND employees.postalcode = '$postalcode'";
	}
	if ( !empty( $_POST[ 'city' ] ) ) {
		$city = $_POST[ 'city' ];
		$query .= " AND employees.city = '$city'";
	}
	if ( !empty( $_POST[ 'hotel_id' ] ) ) {
		$hotel_id = $_POST[ 'hotel_id' ];
		$query .= " AND employees.hotel_id = '$hotel_id'";
	}
	if ( !empty( $_POST[ 'start_date' ] ) ) {
		$start_date = $_POST[ 'start_date' ];
		$query .= " AND employees.start_date = '$start_date'";
	}
	if ( !empty( $_POST[ 'end_date' ] ) ) {
		$end_date = $_POST[ 'end_date' ];
		$query .= " AND employees.end_date = '$end_date'";
	}
	if ( !empty( $_POST[ 'salary' ] ) ) {
		$salary = $_POST[ 'salary' ];
		$query .= " AND employees.salary = '$salary'";
	}
	if ( !empty( $_POST[ 'phone_number_1' ] ) ) {
		$phone_number_1 = $_POST[ 'phone_number_1' ];
		$query .= " AND employee_phone.phone_number = '$phone_number_1'";
	}
	else if ( !empty( $_POST[ 'phone_number_2' ] ) ) {
		$phone_number_2 = $_POST[ 'phone_number_2' ];
		$query .= " AND employee_phone.phone_number = '$phone_number_2'";
	}

	$query .= ";";
	
	$employees = DoQuery( $query );
	
	include 'views/employees_view.php';
	include 'views/footer.php';
?>