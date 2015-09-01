<div id="sel_wrapper">   
	
	<?php
		if ( isset( $_GET[ 'missing' ] ) ) {
			?><div class="error">Ορισμένα από τα στοιχεία λείπουν.</div><?php
		}
		else if ( isset( $_GET[ 'exists' ] ) ) {
			?><div class="error">Ο πελάτης υπάρχει ήδη.</div><?php
		}
		else if ( isset( $_GET[ 'success' ] ) ) {
			?><div class="success">Ο πελάτης καταχωρήθηκε στην βάση.</div><?php
		}
	?>
		
	<h2>Καταχώρηση Πελάτη</h2>
	<form action="customers_doAdd.php" method="post" onsubmit="return check();">
		ΑΤ: <input type="text" name="at" autofocus><br>
		Όνομα: <input type="text" name="name"><br>
		Επώνυμο: <input type="text" name="surname"><br>
		Οδός: <input type="text" name="street"><br>
		Αριθμός: <input type="number" name="number"><br>
		ΤΚ: <input type="number" name="postalcode"><br>
		Πόλη: <input type="text" name="city"><br>
		Τηλέφωνο 1: <input type="number" name="phone_number_1"><br>
		Τηλέφωνο 2: <input type="number" name="phone_number_2"><br>
		Αρ. Πιστωτικής Κάρτ.: <input type="text" name="ccn"><br>
   
		<input type="submit" value="Καταχώρηση!" class='submit' />
	</form>
	
	
	<script type="text/javascript">
		function check() {
			var inputs = document.getElementsByTagName('input');

			for(var i = 0; i < inputs.length; i++) {
				// Validate text inputs
				if(inputs[i].type.toLowerCase() == 'text') {
					if(!inputs[i].name.toLowerCase() == 'ccn') {
						if ( !validateText( inputs[i].value ) ) {
							alert( "Invalid Inputs: text!" );
							return false;
						}
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
	</script>
</div> 
