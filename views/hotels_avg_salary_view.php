<div id="sel_wrapper">	
	<h3>Μέσος Μισθός ανά Ξενοδοχείο:</h3>
	<br>
	<table class="hotels_table">
		<tr>
			<td class="table_titles" >
				<strong>Όνομα</strong>
			</td>
			<td class="table_titles" >
				<strong>Μέσος Μισθός</strong>
			</td>
		</tr>
		
		<?php
			foreach( $hotels as $hotel ) {?>
				<tr><?php
					// Όνομα
					$td = "<td>" . $hotel[0] . "</td>";
					echo $td;
					// Μέσος Μισθός
					$salary = explode( ".", $hotel[1] ); // Keep the integer part
					$td = "<td>" . $salary[0] . "</td>";
					echo $td;
			?></tr><?php
			}
		?>
	</table>
</div>