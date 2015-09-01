<div id="sel_wrapper">	
	<h3>Πολυτελή Ξενοδοχεία:</h3>
	<br>
	<table class="hotels_table">
		<tr>
			<td class="table_titles" >
				<strong>Όνομα</strong>
			</td>
			<td class="table_titles" >
				<strong>Βαθμολογία</strong>
			</td>
		</tr>
		
		<?php
			foreach( $hotels as $hotel ) {?>
				<tr><?php
					// Όνομα
					$td = "<td>" . $hotel[0] . "</td>";
					echo $td;
					// Βαθμολογία
					if ( $hotel[1] >= 1 && $hotel[1] <= 5 ) {
						$td = "<td><img src='images/" . $hotel[1] . "-stars.png' alt='-' height='16' width='75'> </td>";
						echo $td;
					}
					else {
						$td = "<td>-</td>";
						echo $td;
					}
			?></tr><?php
			}
		?>
	</table>
</div>