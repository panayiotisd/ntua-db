<?php
	include 'views/header.php';
	include 'views/activeTab_employees.php';
	
	include 'models/database.php';
    include 'models/employees.php';
	
	if ( isset( $_GET[ 'highsalary' ] ) ) {
		$employees = GetHighSalaryEmployees();
		include 'views/employees_high_salary_view.php';
	}
	else {
		$employees = GetEmployees();
		include 'views/employees_view.php';
	}
	
	include 'views/footer.php';
?>