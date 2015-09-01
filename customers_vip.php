<?php
	$vip = array();
	$previousCustomerId = -1;
	foreach( $customers as $customer ) {
		$vip[ $customer[0] ] = CheckVipStatus( $customer[0] );
	}
?>