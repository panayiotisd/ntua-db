<div id="sel_wrapper">   
	
	<?php
		if ( isset( $_GET[ 'missing' ] ) ) {
			?><div class="error">Ορισμένα από τα στοιχεία λείπουν.</div><?php
		}
	?>
		
	<h2>Επεξεργασία Στοιχείων Πελάτη</h2>
	<form action="employees_doEdit.php" method="post" onsubmit="return check();">
		<input type="number" name="employee_id" value="<?php echo $employee[0][0] ?>" hidden>
		<input type="number" name="old_phone_number_1" value="<?php if ( isset($employee[0][13]) ) { echo $employee[0][13]; } ?>" hidden>
		<input type="number" name="old_phone_number_2" value="<?php if ( isset($employee[1][13]) ) { echo $employee[1][13]; }?>" hidden>
		
		ΑΦΜ: <input type="text" name="ssn" value="<?php echo $employee[0][1] ?>" autofocus><br>
		Όνομα: <input type="text" name="name" value="<?php echo $employee[0][2] ?>"><br>
		Επώνυμο: <input type="text" name="surname" value="<?php echo $employee[0][3] ?>"><br>
		Οδός: <input type="text" name="street" value="<?php echo $employee[0][4] ?>"><br>
		Αριθμός: <input type="number" name="number" value="<?php echo $employee[0][5] ?>"><br>
		ΤΚ: <input type="number" name="postalcode" value="<?php echo $employee[0][6] ?>"><br>
		Πόλη: <input type="text" name="city" value="<?php echo $employee[0][7] ?>"><br>
		Τηλέφωνο 1: <input type="number" name="phone_number_1" value="<?php if ( isset($employee[0][13]) ) { echo $employee[0][13]; } ?>"><br>
		Τηλέφωνο 2: <input type="number" name="phone_number_2"  value="<?php if ( isset($employee[1][13]) ) { echo $employee[1][13]; }?>"><br>
		Κωδ. Ξενοδοχείου: <input type="number" name="hotel_id" value="<?php echo $employee[0][8] ?>"><br>
		Ημερομηνία Έναρξης: <input type="date" name="start_date" id="start_date" class="date" value="<?php echo $employee[0][9] ?>"><br>
		Ημερομηνία Λήξης: <input type="date" name="end_date" id="end_date" class="date" value="<?php echo $employee[0][10] ?>"><br>
		Μισθός: <input type="number" name="salary" value="<?php echo $employee[0][11] ?>"><br>
   
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
