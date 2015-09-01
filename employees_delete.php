<?php
    include 'models/database.php';
	include 'models/employees.php';
	
    if ( isset( $_GET[ 'employee_id' ] ) ) {
		
        $employee_id = $_GET[ 'employee_id' ];
		
        $exists = EmployeeExistsByID( $employee_id );
		
        if ( $exists ) {
            $res = DeleteEmployee( $employee_id );
			
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
        header( 'Location: employees_view.php' );
    }
?>