<div id="sel_wrapper">   
	
	<?php
		if ( isset( $_GET[ 'missing' ] ) ) {
			?><div class="error">Ορισμένα από τα στοιχεία λείπουν.</div><?php
		}
	?>
		
	<h2>Επεξεργασία Στοιχείων Πελάτη</h2>
	<form action="customers_doEdit.php" method="post" onsubmit="return check();">
		<input type="number" name="customer_id" value="<?php echo $customer[0][0] ?>" hidden>
		<input type="number" name="old_phone_number_1" value="<?php if ( isset($customer[0][10]) ) { echo $customer[0][10]; } ?>" hidden>
		<input type="number" name="old_phone_number_2" value="<?php if ( isset($customer[1][10]) ) { echo $customer[1][10]; }?>" hidden>
		
		ΑΤ: <input type="text" name="at" value="<?php echo $customer[0][1] ?>" autofocus><br>
		Όνομα: <input type="text" name="name" value="<?php echo $customer[0][2] ?>"><br>
		Επώνυμο: <input type="text" name="surname" value="<?php echo $customer[0][3] ?>"><br>
		Οδός: <input type="text" name="street" value="<?php echo $customer[0][4] ?>"><br>
		Αριθμός: <input type="number" name="number" value="<?php echo $customer[0][5] ?>"><br>
		ΤΚ: <input type="number" name="postalcode" value="<?php echo $customer[0][6] ?>"><br>
		Πόλη: <input type="text" name="city" value="<?php echo $customer[0][7] ?>"><br>
		Τηλέφωνο 1: <input type="number" name="phone_number_1" value="<?php if ( isset($customer[0][10]) ) { echo $customer[0][10]; } ?>"><br>
		Τηλέφωνο 2: <input type="number" name="phone_number_2" value="<?php if ( isset($customer[1][10]) ) { echo $customer[1][10]; }?>"><br>
		Αρ. Πιστωτικής Κάρτ.: <input type="text" name="ccn" value="<?php echo $customer[0][8] ?>"><br>
   
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
					if( (inputs[i].name.toLowerCase() == 'phone_number_1') || (inputs[i].name.toLowerCase() == 'phone_number_2') || (inputs[i].name.toLowerCase() == 'old_phone_number_1') || (inputs[i].name.toLowerCase() == 'old_phone_number_2') ) {
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
