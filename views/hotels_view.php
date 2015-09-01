<div id="sel_wrapper">
	<?php
		if ( isset( $_GET[ 'missing' ] ) ) {
			?><div class="error">Το ξενοδοχείο δεν υπάρχει στην βάση!</div><?php
		}
		else if ( isset( $_GET[ 'failed' ] ) ) {
			?><div class="error">Αποτυχία διαγραφής!</div><?php
		}
		else if ( isset( $_GET[ 'success' ] ) ) {
			?><div class="success">Η βάση ενημερώθηκε με επιτυχία!</div><?php
		}
	?>
	
	<table class="hotels_table">
		<tr>
			<td class="table_titles" >
				<strong>Κωδικός</strong>
			</td>
			<td class="table_titles" >
				<strong>Όνομα</strong>
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
				<strong>Υπηρεσίες</strong>
			</td>
			<td class="table_titles" >
				<strong>Βαθμολογία</strong>
			</td>
			<td class="table_titles" >
				<strong>Έτος Κατασκευής</strong>
			</td>
			<td class="table_titles" >
				<strong>Έτος Ανακαίνισης</strong>
			</td>
			<td class="table_titles" >
				<strong>Επεξεργασία</strong>
			</td>
			<td class="table_titles" >
				<strong>Διαγραφή</strong>
			</td>
		</tr>
		
		<?php
			$previousHotelId = -1;
			$i = 0;
			foreach( $hotels as $hotel ) {
				if ( $previousHotelId == $hotel[0] ) {
						echo "<tr><td></td><td></td><td></td><td></td><td></td><td></td><td>" . $hotel[10] . "</td></tr>";
				}
				else {
				?><tr><?php
						// Κωδικός
						$td = "<td>" . $hotel[0] . "</td>";
						echo $td;
						// Όνομα
						$td = "<td>" . $hotel[1] . "</td>";
						echo $td;
						// Οδός
						$td = "<td>" . $hotel[2] . "</td>";
						echo $td;
						// Αριθμός
						$td = "<td>" . $hotel[3] . "</td>";
						echo $td;
						// ΤΚ
						$td = "<td>" . $hotel[4] . "</td>";
						echo $td;
						// Πόλη
						$td = "<td>" . $hotel[5] . "</td>";
						echo $td;
						// Τηλέφωνο
						$td = "<td>" . $hotel[10] . "</td>";
						echo $td;
						// Υπηρεσίες
						$td = "<td>" . $services[$i] . "</td>";
						echo $td;
						// Βαθμολογία
						if ( $hotel[6] >= 1 && $hotel[6] <= 5 ) {
							$td = "<td><img src='images/" . $hotel[6] . "-stars.png' alt='-' height='16' width='75'> </td>";
							echo $td;
						}
						else {
							$td = "<td>-</td>";
							echo $td;
						}
						// Έτος Κατασκευής
						$td = "<td>" . $hotel[7] . "</td>";
						echo $td;
						// Έτος Ανακαίνισης
						$td = "<td>" . $hotel[8] . "</td>";
						echo $td;
						// Επεξεργασία
						$td = "<td><a href='hotels_edit.php?hotel_id=" . $hotel[0] . "'><img src='images/edit.png' alt='X' height='24' width='24'> </td>";
						echo $td;
						// Διαγραφή
						$td = "<td><a href='hotels_delete.php?hotel_id=" . $hotel[0] . "'><img src='images/delete.png' alt='X' height='24' width='24'> </td>";
						echo $td;
					?></tr><?php
				}
				$previousHotelId = $hotel[0];
				$i = $i + 1;
			}
		?>
	</table>
</div>