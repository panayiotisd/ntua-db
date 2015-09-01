<?php
	ini_set('max_execution_time', 300);
	// MySQL host
	$mysql_host = 'localhost';
	// MySQL username
	$mysql_username = 'root';
	// MySQL password
	$mysql_password = '';
	
    $con = mysql_connect($mysql_host, $mysql_username, $mysql_password);
	// Check connection
	if (!$con){
		die('Could not connect: ' . mysql_error() . '</br>');
	}
	
	header( 'Content-type: text/html; charset=utf8' );
	
    // Create database
	$sql="CREATE DATABASE astirDB
			DEFAULT CHARACTER SET utf8
			DEFAULT COLLATE utf8_unicode_ci";
	if (mysql_query($sql, $con)) {
	  echo "Database astirDB created successfully </br>";
	}
	else {
	  echo "Error creating database: " . mysql_error($con) . '</br>';
	}

	// Connect to database
	mysql_select_db( 'astirDB' ) or die('Error selecting MySQL database: ' . mysql_error() . '</br>');
	
	header( 'Content-type: text/html; charset=utf8' );
	
	// Load tables
	// Name of the SQL file
	$filename = 'astir_database.sql';
	// Database name
	$mysql_database = 'astirDB';

	// Flag for reading triggers
	$trigger = false;
	// Temporary variable, used to store current query
	$templine = '';
	// Read in entire file
	$lines = file($filename);
	// Loop through each line
	foreach ($lines as $line) {
		// Skip it if it's a comment or trigger's delimiter
		if (substr($line, 0, 2) == '--' || $line == '' || substr($line, 0, 2) == '//')
			continue;

		if (substr($line, 0, 12) == 'DELIMITER //') {
			// start of trigger query
			$trigger = !$trigger;
			continue;
		}
		
		if (!(substr($line, 0, 11) == 'DELIMITER ;')) {
			// Add this line to the current segment
			$templine .= $line;
		}
		
		if (!$trigger) {
			// If it has a semicolon at the end, it's the end of the query
			if (substr(trim($line), -1, 1) == ';') {
				// Perform the query
				mysql_query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '</br>');
				// Reset temp variable to empty
				$templine = '';
			}
		}
		else if (substr($line, 0, 11) == 'DELIMITER ;') {
			// End of trigger query
			$trigger = !$trigger;
			// Perform the query
			mysql_query($templine) or print('Error performing trigger query \'<strong>' . $templine . '\': ' . mysql_error() . '</br>');
			// Reset temp variable to empty
			$templine = '';
		}
	}
	echo "Tables imported successfully";
?>