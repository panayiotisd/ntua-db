<div id="sel_wrapper">

	<?php
		switch ($faq_query) {
		case 1:
			echo "<h3>Προβολή ξενοδοχείων σε αλφαβητική σειρά, τύπο και τιμή δωματίων σε αύξουσα σειρά:</h3>";
			echo "<br>";
			echo "<table class='faq_table'>";
				echo "<tr>";
					echo "<td><strong>Όνομα</strong></td>";
					echo "<td><strong>Τύπος</strong></td>";
					echo "<td><strong>Τίμή</strong></td>";
				echo "</tr>";
					foreach( $results as $result ) {
						echo "<tr>";
							$td = "<td>" . $result[0] . "</td>";
							echo $td;
							$td = "<td>" . $result[1] . "</td>";
							echo $td;
							$td = "<td>" . $result[2] . "</td>";
							echo $td;
					echo "</tr>";
					}
			echo "</table>";
			break;
		case 2:
			echo "<h3>Ξενοδοχεία σε αλφαβητική σειρά μαζί με τα τηλέφωνά τους:</h3>";
			echo "<br>";
			echo "<table class='faq_table'>";
				echo "<tr>";
					echo "<td><strong>Όνομα</strong></td>";
					echo "<td><strong>Τηλέφωνο</strong></td>";
				echo "</tr>";
					foreach( $results as $result ) {
						echo "<tr>";
							$td = "<td>" . $result[0] . "</td>";
							echo $td;
							$td = "<td>" . $result[1] . "</td>";
							echo $td;
					echo "</tr>";
					}
			echo "</table>";
			break;
			break;
		case 3:
			echo "<h3>Αριθμός κρατήσεων ανά ξενοδοχείο:</h3>";
			echo "<br>";
			echo "<table class='faq_table'>";
				echo "<tr>";
					echo "<td><strong>Όνομα</strong></td>";
					echo "<td><strong>Αρ. Κρατήσεων</strong></td>";
				echo "</tr>";
					foreach( $results as $result ) {
						echo "<tr>";
							$td = "<td>" . $result[0] . "</td>";
							echo $td;
							$td = "<td>" . $result[1] . "</td>";
							echo $td;
					echo "</tr>";
					}
			echo "</table>";
			break;
		case 4:
			echo "<h3>Όνομα και πόλη ξενοδοχείων με Spa:</h3>";
			echo "<br>";
			echo "<table class='faq_table'>";
				echo "<tr>";
					echo "<td><strong>Όνομα</strong></td>";
					echo "<td><strong>Πόλη</strong></td>";
				echo "</tr>";
					foreach( $results as $result ) {
						echo "<tr>";
							$td = "<td>" . $result[0] . "</td>";
							echo $td;
							$td = "<td>" . $result[1] . "</td>";
							echo $td;
					echo "</tr>";
					}
			echo "</table>";
			break;
		case 5:
			echo "<h3>Ξενοδοχεία με τουλάχιστον 3 υπαλλήλους:</h3>";
			echo "<br>";
			echo "<table class='faq_table'>";
				echo "<tr>";
					echo "<td><strong>Όνομα</strong></td>";
				echo "</tr>";
					foreach( $results as $result ) {
						echo "<tr>";
							$td = "<td>" . $result[0] . "</td>";
							echo $td;
					echo "</tr>";
					}
			echo "</table>";
			break;
		case 6:
			echo "<h3>Όνομα, πόλη και βαθμολογία ξενοδοχείων με Wifi και Gym:</h3>";
			echo "<br>";
			echo "<table class='faq_table'>";
				echo "<tr>";
					echo "<td><strong>Όνομα</strong></td>";
					echo "<td><strong>Πόλη</strong></td>";
					echo "<td><strong>Βαθμολογία</strong></td>";
				echo "</tr>";
					foreach( $results as $result ) {
						echo "<tr>";
							$td = "<td>" . $result[0] . "</td>";
							echo $td;
							$td = "<td>" . $result[1] . "</td>";
							echo $td;
							$td = "<td>" . $result[2] . "</td>";
							echo $td;
					echo "</tr>";
					}
			echo "</table>";
			break;
		case 7:
			echo "<h3>Μέσος, ελάχιστος και μέγιστος μισθός υπαλλήλων ανά ξενοδοχείο:</h3>";
			echo "<br>";
			echo "<table class='faq_table'>";
				echo "<tr>";
					echo "<td><strong>Όνομα</strong></td>";
					echo "<td><strong>Μέσος Μισθός</strong></td>";
					echo "<td><strong>Ελάχιστος Μισθός</strong></td>";
					echo "<td><strong>Μέγιστος Μισθός</strong></td>";
				echo "</tr>";
					foreach( $results as $result ) {
						echo "<tr>";
							$td = "<td>" . $result[0] . "</td>";
							echo $td;
							$avg = explode( ".", $result[1] );
							$td = "<td>" . $avg[0] . "</td>";
							echo $td;
							$td = "<td>" . $result[2] . "</td>";
							echo $td;
							$td = "<td>" . $result[3] . "</td>";
							echo $td;
					echo "</tr>";
					}
			echo "</table>";
			break;
		case 8:
			echo "<h3>Βαθμολογία ξενοδοχείου και μέση, ελάχιστη και μέγιστη τιμή των δωματίων του:</h3>";
			echo "<br>";
			echo "<table class='faq_table'>";
				echo "<tr>";
					echo "<td><strong>Όνομα</strong></td>";
					echo "<td><strong>Βαθμολογία</strong></td>";
					echo "<td><strong>Μέση Τιμή</strong></td>";
					echo "<td><strong>Ελάχιστη Τιμή</strong></td>";
					echo "<td><strong>Μέγιστη Τιμή</strong></td>";
				echo "</tr>";
					foreach( $results as $result ) {
						echo "<tr>";
							$td = "<td>" . $result[0] . "</td>";
							echo $td;
							$td = "<td>" . $result[1] . "</td>";
							echo $td;
							$avg = explode( ".", $result[2] );
							$td = "<td>" . $avg[0] . "</td>";
							$td = "<td>" . $avg[0] . "</td>";
							echo $td;
							$td = "<td>" . $result[3] . "</td>";
							echo $td;
							$td = "<td>" . $result[4] . "</td>";
							echo $td;
					echo "</tr>";
					}
			echo "</table>";
			break;
		case 9:
			echo "<h3>Όνομα και βαθμολογία (σε φθίνουσα σειρά) των ξενοδοχείων που χτίστηκαν μετά το 2000:</h3>";
			echo "<br>";
			echo "<table class='faq_table'>";
				echo "<tr>";
					echo "<td><strong>Όνομα</strong></td>";
					echo "<td><strong>Βαθμολογία</strong></td>";
				echo "</tr>";
					foreach( $results as $result ) {
						echo "<tr>";
							$td = "<td>" . $result[0] . "</td>";
							echo $td;
							$td = "<td>" . $result[1] . "</td>";
							echo $td;
					echo "</tr>";
					}
			echo "</table>";
			break;
		case 10:
			echo "<h3>Όνομα, το επίθετό του και τον αριθμό των κρατήσεων ανά πελάτη:</h3>";
			echo "<br>";
			echo "<table class='faq_table'>";
				echo "<tr>";
					echo "<td><strong>Όνομα</strong></td>";
					echo "<td><strong>Επώνυμο</strong></td>";
					echo "<td><strong>Αρ. Κρατήσεων</strong></td>";
				echo "</tr>";
					foreach( $results as $result ) {
						echo "<tr>";
							$td = "<td>" . $result[0] . "</td>";
							echo $td;
							$td = "<td>" . $result[1] . "</td>";
							echo $td;
							$td = "<td>" . $result[2] . "</td>";
							echo $td;
					echo "</tr>";
					}
			echo "</table>";
			break;
		}
	?>
</div>