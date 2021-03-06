<div id="sel_wrapper">   
	
	<?php
		if ( isset( $_GET[ 'missing' ] ) ) {
			?><div class="error">Ορισμένα από τα στοιχεία λείπουν.</div><?php
		}
		if ( isset( $_GET[ 'customer' ] ) ) {
			?><div class="error">Ο πελάτης δεν είναι καταχωρημένος στην βάση. Παρακαλώ καταχωρήστε τον πελάτη και ξαναπροσπαθήστε!</div><?php
		}
		else if ( isset( $_GET[ 'exists' ] ) ) {
			?><div class="error">Το δωμάτιο δεν είναι διαθέσιμο για κράτηση.</div><?php
		}
		else if ( isset( $_GET[ 'success' ] ) ) {
			?><div class="success">Η κράτηση καταχωρήθηκε στην βάση.</div><?php
		}
	?>
		
	<h2>Καταχώρηση Κράτησης</h2>
	<form action="reservations_doAdd.php" method="post" onsubmit="return check();">
		Ημερομηνία Κράτησης: <input type="date" name="reservation_date" id="reservation_date" class="date"><br>
		Ημερομηνία Έναρξης: <input type="date" name="start_date" autofocus class="date"><br>
		Ημερομηνία Λήξης: <input type="date" name="end_date" class="date"><br>
		Τρόπος Πληρωμής:
			<select name="payment_method">
				<option value="cash">cash</option>
				<option value="credit card">credit card</option>
				<option value="check">check</option>
			</select><br>
		ΑΤ Πελάτη: <input type="text" name="at"><br>
		Κωδικός Ξενοδοχείου: <input type="number" name="hotel_id"><br>
		Αριθμός Δωματίου: <input type="number" name="room_number"><br>
   
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
		document.getElementById('reservation_date').value = currentDate(new Date());
	
		// Validation check
		function check() {
			var inputs = document.getElementsByTagName('input');

			for(var i = 0; i < inputs.length; i++) {
				// Validate text inputs
				if(inputs[i].type.toLowerCase() == 'text') {
					if ( !validateText( inputs[i].value ) ) {
						alert( "Invalid Inputs: text!" );
						return false;
					}
				}
				// Validate number inputs
				if(inputs[i].type.toLowerCase() == 'number') {
					if ( !validateNumber( inputs[i].value ) ) {
						alert( "Invalid Inputs: number!" );
						return false;
					}
				}
			}
			
			// Firefox doesn't recognise date type!
			var inputs = document.getElementsByClassName('date');
			for(var i = 0; i < inputs.length; i++) {
				// Validate date inputs
				if ( !validateDate( inputs[i].value ) ) {
					alert( "Invalid Inputs: date!" );
					return false;
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
		//input in ISO format: yyyy-MM-dd
		function validateDate( date ) {
			var bits = date.split('-');
			var d = new Date(bits[0], bits[1] - 1, bits[2]);
			return d.getFullYear() == bits[0] && (d.getMonth() + 1) == bits[1] && d.getDate() == Number(bits[2]);
		}
	</script>
</div> 
