<?php
	function datetime(){
		date_default_timezone_set('Europe/Athens');
		$time = strftime("%Y-%m-%d %H:%M:%S");
		return $time;
	}
?>