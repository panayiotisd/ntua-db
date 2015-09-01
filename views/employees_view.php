<div id="sel_wrapper">
	<?php
		if ( isset( $_GET[ 'missing' ] ) ) {
			?><div class="error">Ο υπάλληλος δεν υπάρχει στην βάση!</div><?php
		}
		else if ( isset( $_GET[ 'failed' ] ) ) {
			?><div class="error">Αποτυχία διαγραφής!</div><?php
		}
		else if ( isset( $_GET[ 'success' ] ) ) {
			?><div class="success">Η βάση ενημερώθηκε με επιτυχία!</div><?php
		}
	?>
	
	<table class="employees_table">
		<tr>
			<td class="table_titles" >
				<strong>Κωδικός</strong>
			</td>
			<td class="table_titles" >
				<strong>ΑΦΜ</strong>
			</td>
			<td class="table_titles" >
				<strong>Όνομα</strong>
			</td>
			<td class="table_titles" >
				<strong>Επώνυμο</strong>
			</td>
			<td class="table_titles" >
				<strong>Οδός</strong>
			</td>
			<td class="table_titles" >
				<strong>Αριθμός</strong>
			</td>
			<td class="table_titles" >
				<strong>ΤΚ</strong>
			</td>
			<td class="table_titles" >
				<strong>Πόλη</strong>
			</td>
			<td class="table_titles" >
				<strong>Τηλέφωνο</strong>
			</td>
			<td class="table_titles" >
				<strong>Κωδ. Ξενοδοχείου</strong>
			</td>
			<td class="table_titles" >
				<strong>Ημ. Έναρξης</strong>
			</td>
			<td class="table_titles" >
				<strong>Ημ. Λήξης</strong>
			</td>
			<td class="table_titles" >
				<strong>Μισθός</strong>
			</td>
			<td class="table_titles" >
				<strong>Επεξεργασία</strong>
			</td>
			<td class="table_titles" >
				<strong>Διαγραφή</strong>
			</td>
		</tr>
		
		<?php
			$previousEmployeeAT = 0;
			foreach( $employees as $employee ) {
				if ( $previousEmployeeAT == $employee[0] ) {
					echo "<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>" . $employee[13] . "</td></tr>";
				}
				else {
				?><tr><?php
					// Κωδικός
					$td = "<td>" . $employee[0] . "</td>";
					echo $td;
					// ΑΦΜ
					$td = "<td>" . $employee[1] . "</td>";
					echo $td;
					// Όνομα
					$td = "<td>" . $employee[2] . "</td>";
					echo $td;
					// Επώνυμο
					$td = "<td>" . $employee[3] . "</td>";
					echo $td;
					// Οδός
					$td = "<td>" . $employee[4] . "</td>";
					echo $td;
					// Αριθμός
					$td = "<td>" . $employee[5] . "</td>";
					echo $td;
					// ΤΚ
					$td = "<td>" . $employee[6] . "</td>";
					echo $td;
					// Πόλη
					$td = "<td>" . $employee[7] . "</td>";
					echo $td;
					// Τηλέφωνο
					$td = "<td>" . $employee[13] . "</td>";
					echo $td;
					// Κωδ. Ξενοδοχείου
					$td = "<td>" . $employee[8] . "</td>";
					echo $td;
					// Ημ. Έναρξης
					$td = "<td>" . $employee[9] . "</td>";
					echo $td;
					// Ημ. Λήξης
					$td = "<td>" . $employee[10] . "</td>";
					echo $td;
					// Μισθός
					$td = "<td>" . $employee[11] . "</td>";
					echo $td;
					// Επεξεργασία
					$td = "<td><a href='employees_edit.php?employee_id=" . $employee[0] . "'><img src='images/edit.png' alt='X' height='24' width='24'> </td>";
					echo $td;
					// Διαγραφή
					$td = "<td><a href='employees_delete.php?employee_id=" . $employee[0] . "'><img src='images/delete.png' alt='X' height='24' width='24'> </td>";
					echo $td;
				?></tr><?php
					$previousEmployeeAT = $employee[0];
				}
			}
		?>
	</table>
</div>