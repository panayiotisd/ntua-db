<div id="sel_wrapper">   
	
	<?php
		if ( isset( $_GET[ 'missing' ] ) ) {
			?><div class="error">Ορισμένα από τα στοιχεία λείπουν.</div><?php
		}
		else if ( isset( $_GET[ 'exists' ] ) ) {
			?><div class="error">Ο υπάλληλος υπάρχει ήδη.</div><?php
		}
		else if ( isset( $_GET[ 'success' ] ) ) {
			?><div class="success">Ο υπάλληλος προστέθηκε στην βάση.</div><?php
		}
	?>
		
	<h2>Προσθήκη Υπαλλήλου</h2>
	<form action="employees_doAdd.php" method="post" onsubmit="return check();">
		ΑΦΜ: <input type="text" name="ssn" autofocus><br>
		Όνομα: <input type="text" name="name"><br>
		Επώνυμο: <input type="text" name="surname"><br>
		Οδός: <input type="text" name="street"><br>
		Αριθμός: <input type="number" name="number"><br>
		ΤΚ: <input type="number" name="postalcode"><br>
		Πόλη: <input type="text" name="city"><br>
		Τηλέφωνο 1: <input type="number" name="phone_number_1"><br>
		Τηλέφωνο 2: <input type="number" name="phone_number_2"><br>
		Κωδ. Ξενοδοχείου: <input type="number" name="hotel_id"><br>
		Ημερομηνία Έναρξης: <input type="date" name="start_date" id="start_date" class="date"><br>
		Ημερομηνία Λήξης: <input type="date" name="end_date" id="end_date" class="date"><br>
		Μισθός: <input type="number" name="salary"><br>
   
		<input type="submit" value="Καταχώρηση!" class='submit' />
	</form>
	
	
	<script type="text/javascript">
		function currentDate(date) {
			var d = date.getDate();
			if(d < 10) d = '0' + d;
			var m = date.getMonth() + 1;
			if(m < 10) m = '0' + m;
			return date.getFullYear() + '-' + m + '-' + d;
		}
		// Auto complete current date
		document.getElementById('start_date').value = currentDate(new Date());
		
		function check() {
			var inputs = document.getElementsByTagName('input');

			for(var i = 0; i < inputs.length; i++) {
				// Validate text inputs
				if( (inputs[i].type.toLowerCase() == 'text') && !(inputs[i].name.toLowerCase() == 'end_date') ) {
					if ( !validateText( inputs[i].value ) ) {
						alert( "Invalid Inputs: text!" );
						return false;
					}
				}
				// Validate number inputs
				if(inputs[i].type.toLowerCase() == 'number') {
					if( (inputs[i].name.toLowerCase() == 'phone_number_1') || (inputs[i].name.toLowerCase() == 'phone_number_2') ) {
						if ( !validatePhoneNumber( inputs[i].value ) ) {
							alert( "Invalid Inputs: phone_number!" );
							return false;
						}
					}
					else {
						if ( !validateNumber( inputs[i].value ) ) {
							alert( "Invalid Inputs: number!" );
							return false;
						}
					}
				}
			}
			
			// Firefox doesn't recognise date type!
			var inputs = document.getElementsByClassName('date');
			for(var i = 0; i < inputs.length; i++) {
				// Validate date inputs
				if( (inputs[i].name.toLowerCase() == 'end_date') ) {
					if ( !validateDate( inputs[i].value ) ) {
						if ( inputs[i].value != '' ) {
							alert( "Invalid Inputs: date!" );
							return false;
						}
					}
				}
				else {
					if ( !validateDate( inputs[i].value ) ) {
						alert( "Invalid Inputs: date!" );
						return false;
					}
				}
			}
			return true;
		}
		
		function validateText( text ) {
			if ( text == '' ) {
				return false;
			}
			return true;
		}
		function validateNumber( number ) {
			if ( number == '' ) {
				return false;
			}
			if ( isNaN(number) ) {
				return false;
			}
			return true;
		}
		function validatePhoneNumber( number ) {
			if ( number == '' ) {
				return true;
			}
			if ( isNaN(number) ) {
				return false;
			}
			return true;
		}
		//input in ISO format: yyyy-MM-dd
		function validateDate( date ) {
			var bits = date.split('-');
			var d = new Date(bits[0], bits[1] - 1, bits[2]);
			return d.getFullYear() == bits[0] && (d.getMonth() + 1) == bits[1] && d.getDate() == Number(bits[2]);
		}
	</script>
</div> 
