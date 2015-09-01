<div id="sel_wrapper">   
	
	<?php
		if ( isset( $_GET[ 'missing' ] ) ) {
			?><div class="error">Ορισμένα από τα στοιχεία λείπουν.</div><?php
		}
		if ( isset( $_GET[ 'invalid' ] ) ) {
			?><div class="error">Το δωμάτιο δεν είναι διαθέσιμο για κράτηση αυτές τις ημερομηνίες.</div><?php
		}
	?>
		
	<h2>Επεξεργασία Κράτησης</h2>
	<form action="reservations_doEdit.php" method="post" onsubmit="return check();">
		<input type="number" name="reservation_id" value="<?php echo $reservation[0] ?>" hidden>
		
		Ημερομηνία Κράτησης: <input type="date" name="reservation_date" value="<?php echo $reservation[1] ?>" id="reservation_date" class="date"><br>
		Ημερομηνία Έναρξης: <input type="date" name="start_date" value="<?php echo $reservation[2] ?>" autofocus class="date"><br>
		Ημερομηνία Λήξης: <input type="date" name="end_date" value="<?php echo $reservation[3] ?>" class="date"><br>
		Τρόπος Πληρωμής:
			<select name="payment_method">
				<option value="cash" <?php if ( $reservation[4] == "cash" ) echo "selected='selected'" ?> >cash</option>
				<option value="credit card" <?php if ( $reservation[4] == "credit card" ) echo "selected='selected'" ?> >credit card</option>
				<option value="check" <?php if ( $reservation[4] == "check" ) echo "selected='selected'" ?> >check</option>
			</select><br>
		Κωδικός Πελάτη: <input type="text" name="customer_id" value="<?php echo $reservation[5] ?>"><br>
		Κωδικός Ξενοδοχείου: <input type="number" name="hotel_id" value="<?php echo $reservation[6] ?>"><br>
		Αριθμός Δωματίου: <input type="number" name="room_number" value="<?php echo $reservation[7] ?>"><br>
   
		<input type="submit" value="Καταχώρηση!" class='submit' />
	</form>
	
	<script type="text/javascript">
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
