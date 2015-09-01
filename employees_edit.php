<?php
    include 'models/database.php';
	include 'models/employees.php';
	include 'views/header.php';
	include 'views/activeTab_employees.php';
	
    if ( isset( $_GET[ 'employee_id' ] ) ) {
		
        $employee_id = $_GET[ 'employee_id' ];
		
        $exists = EmployeeExistsByID( $employee_id );
		
        if ( $exists ) {
            $employee = EmployeeInfo( $employee_id );
			include 'views/employees_edit_form.php';
        }
        else {
            header( 'Location: employees_view.php?missing=true' );
        }
    }
    else {
        header( 'Location: employees_view.php' );
    }
	include 'views/footer.php';
?>