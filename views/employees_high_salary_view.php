<div id="sel_wrapper">
	<h3>Υψηλόμισθοι Υπαλλήλοι</h3>
	<br>
	
	<table class="employees_table">
		<tr>
			<td class="table_titles" >
				<strong>Όνομα</strong>
			</td>
			<td class="table_titles" >
				<strong>Επώνυμο</strong>
			</td>
			<td class="table_titles" >
				<strong>Μισθός</strong>
			</td>
		</tr>
		
		<?php
			foreach( $employees as $employee ) {
				?><tr><?php
					// Όνομα
					$td = "<td>" . $employee[0] . "</td>";
					echo $td;
					// Επώνυμο
					$td = "<td>" . $employee[1] . "</td>";
					echo $td;
					// Μισθός
					$td = "<td>" . $employee[2] . "</td>";
					echo $td;
				?></tr><?php
			}
		?>
	</table>
</div>