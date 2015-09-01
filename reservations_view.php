<?php
	include 'views/header.php';
	include 'views/activeTab_reservations.php';
	
	include 'models/database.php';
    include 'models/reservations.php';
	$reservations = GetReservations();
	
	include 'views/reservations_view.php';
	include 'views/footer.php';
?>