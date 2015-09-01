<?php
    $con = mysql_connect( 'localhost', 'root', '' );
	if (!$con){
		die('Could not connect: ' . mysql_error());
	}
    mysql_select_db( 'astirDB' );
	header( 'Content-type: text/html; charset=utf8' );
?>