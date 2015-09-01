<div id="sel_wrapper">
	<?php
		if ( isset( $_GET[ 'missing' ] ) ) {
			?><div class="error">Η κράτηση δεν υπάρχει στην βάση!</div><?php
		}
		else if ( isset( $_GET[ 'failed' ] ) ) {
			?><div class="error">Αποτυχία διαγραφής!</div><?php
		}
		else if ( isset( $_GET[ 'success' ] ) ) {
			?><div class="success">Η βάση ενημερώθηκε με επιτυχία!</div><?php
		}
	?>
	
	<table class="reservations_table">
		<tr>
			<td class="table_titles" >
				<strong>Κωδικός</strong>
			</td>
			<td class="table_titles" >
				<strong>Ημ. Κράτησης</strong>
			</td>
			<td class="table_titles" >
				<strong>Ημ. Έναρξης</strong>
			</td>
			<td class="table_titles" >
				<strong>Ημ. Λήξης</strong>
			</td>
			<td class="table_titles" >
				<strong>Τρόπος Πληρωμής</strong>
			</td>
			<td class="table_titles" >
				<strong>Κωδ. Πελάτη</strong>
			</td>
			<td class="table_titles" >
				<strong>Κωδ. Ξενοδοχείου</strong>
			</td>
			<td class="table_titles" >
				<strong>Αρ. Δωματίου</strong>
			</td>
			<td class="table_titles" >
				<strong>Επεξεργασία</strong>
			</td>
			<td class="table_titles" >
				<strong>Διαγραφή</strong>
			</td>
		</tr>
		
		<?php
			foreach( $reservations as $reservation ) {
				?><tr><?php
					// Κωδικός
					$td = "<td>" . $reservation[0] . "</td>";
					echo $td;
					// Ημ. Κράτησης
					$td = "<td>" . $reservation[1] . "</td>";
					echo $td;
					// Ημ. Έναρξης
					$td = "<td>" . $reservation[2] . "</td>";
					echo $td;
					// Ημ. Λήξης
					$td = "<td>" . $reservation[3] . "</td>";
					echo $td;
					// Τρόπος Πληρωμής
					$td = "<td>" . $reservation[4] . "</td>";
					echo $td;
					// Κωδ. Πελάτη
					$td = "<td>" . $reservation[5] . "</td>";
					echo $td;
					// Κωδ. Ξενοδοχείου
					$td = "<td>" . $reservation[6] . "</td>";
					echo $td;
					// Αρ. Δωματίου
					$td = "<td>" . $reservation[7] . "</td>";
					echo $td;
					// Επεξεργασία
					$td = "<td><a href='reservations_edit.php?reservation_id=" . $reservation[0] . "'><img src='images/edit.png' alt='X' height='24' width='24'> </td>";
					echo $td;
					// Διαγραφή
					$td = "<td><a href='reservations_delete.php?reservation_id=" . $reservation[0] . "'><img src='images/delete.png' alt='X' height='24' width='24'> </td>";
					echo $td;
				?></tr><?php
			}
		?>
	</table>
</div>