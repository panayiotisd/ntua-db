<?php
	include 'views/header.php';
	include 'views/activeTab_customers.php';
	
	include 'models/database.php';
    include 'models/customers.php';
	$customers = GetCustomers();
	
	include 'customers_vip.php';
	include 'views/customers_view.php';
	include 'views/footer.php';
?>