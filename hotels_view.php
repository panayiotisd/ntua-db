<?php
	include 'views/header.php';
	include 'views/activeTab_hotels.php';
	
	include 'models/database.php';
    include 'models/hotels.php';
	
	if ( isset( $_GET[ 'luxury' ] ) ) {
		$hotels = GetLuxuryHotels();
		include 'views/hotels_luxury_view.php';
	}
	else if ( isset( $_GET[ 'avgsalary' ] ) ) {
		$hotels = GetAvgSalaryPerHotel();
		include 'views/hotels_avg_salary_view.php';
	}
	else {
		$hotels = GetHotels();
		include 'hotels_services.php';
		include 'views/hotels_view.php';
	}
	
	include 'views/footer.php';
?>