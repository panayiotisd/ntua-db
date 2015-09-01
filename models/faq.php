<?php
	function DoQuery($query) {
	//returns an array with the results of the query.
        $res = mysql_query($query);
        
		if ( !$res ) {
			// die for debug purposes
			die('DoQuery-FAQ: ' . mysql_error());
			return false;
		}
		
        $rows = array();
		
        while ( $row = mysql_fetch_array( $res ) ) {
            $rows[] = $row;
        }
        
        return $rows;
    }
?>