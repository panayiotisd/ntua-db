<div id="sel_wrapper">
	<?php
		if ( isset( $_GET[ 'missing' ] ) ) {
			?><div class="error">Ο πελάτης δεν υπάρχει στην βάση!</div><?php
		}
		else if ( isset( $_GET[ 'failed' ] ) ) {
			?><div class="error">Αποτυχία διαγραφής!</div><?php
		}
		else if ( isset( $_GET[ 'success' ] ) ) {
			?><div class="success">Η βάση ενημερώθηκε με επιτυχία!</div><?php
		}
	?>
	
	<table class="customers_table">
		<tr>
			<td class="table_titles" >
				<strong>Κωδικός</strong>
			</td>
			<td class="table_titles" >
				<strong>ΑΤ</strong>
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
				<strong>ΑΠΚ</strong>
			</td>
			<td class="table_titles" >
				<strong>Τηλέφωνο</strong>
			</td>
			<td class="table_titles" >
				<strong>VIP</strong>
			</td>
			<td class="table_titles" >
				<strong>Επεξεργασία</strong>
			</td>
			<td class="table_titles" >
				<strong>Διαγραφή</strong>
			</td>
		</tr>
		
		<?php
			$previousCustomerAT = 0;
			foreach( $customers as $customer ) {
				if ( $previousCustomerAT == $customer[0] ) {
					echo "<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>" . $customer[10] . "</td></tr>";
				}
				else {
				?><tr><?php
					// Κωδικός
					$td = "<td>" . $customer[0] . "</td>";
					echo $td;
					// ΑΤ
					$td = "<td>" . $customer[1] . "</td>";
					echo $td;
					// Όνομα
					$td = "<td>" . $customer[2] . "</td>";
					echo $td;
					// Επώνυμο
					$td = "<td>" . $customer[3] . "</td>";
					echo $td;
					// Οδός
					$td = "<td>" . $customer[4] . "</td>";
					echo $td;
					// Αριθμός
					$td = "<td>" . $customer[5] . "</td>";
					echo $td;
					// ΤΚ
					$td = "<td>" . $customer[6] . "</td>";
					echo $td;
					// Πόλη
					$td = "<td>" . $customer[7] . "</td>";
					echo $td;
					// Αρ. Πιστωτικής Κάρτ.
					$td = "<td>" . $customer[8] . "</td>";
					echo $td;
					// Τηλέφωνο
					$td = "<td>" . $customer[10] . "</td>";
					echo $td;
					// VIP
					$td = "<td>";
					if ( $vip[ $customer[0] ] ) {
						$td .= "<img src='images/vip.png' alt='VIP' height='24' width='24'>";
					}
					$td .= "</td>";
					echo $td;
					// Επεξεργασία
					$td = "<td><a href='customers_edit.php?customer_id=" . $customer[0] . "'><img src='images/edit.png' alt='X' height='24' width='24'> </td>";
					echo $td;
					// Διαγραφή
					$td = "<td><a href='customers_delete.php?customer_id=" . $customer[0] . "'><img src='images/delete.png' alt='X' height='24' width='24'> </td>";
					echo $td;
				?></tr><?php
					$previousCustomerAT = $customer[0];
				}
			}
		?>
	</table>
</div>