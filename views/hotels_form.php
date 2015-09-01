<div id="sel_wrapper">   
	
	<?php
		if ( isset( $_GET[ 'missing' ] ) ) {
			?><div class="error">Ορισμένα από τα στοιχεία λείπουν.</div><?php
		}
		else if ( isset( $_GET[ 'exists' ] ) ) {
			?><div class="error">Το ξενοδοχείο υπάρχει ήδη.</div><?php
		}
		else if ( isset( $_GET[ 'success' ] ) ) {
			?><div class="success">Το ξενοδοχείο αποθηκεύτηκε στην βάση.</div><?php
		}
	?>
		
	<h2>Προσθήκη Ξενοδοχείου</h2>
	<form action="hotels_doAdd.php" method="post" onsubmit="return check();">
		Όνομα: <input type="text" name="name" autofocus><br>
		Οδός: <input type="text" name="street"><br>
		Αριθμός: <input type="number" name="number"><br>
		ΤΚ: <input type="number" name="postalcode"><br>
		Πόλη: <input type="text" name="city"><br>
		Τηλέφωνο 1: <input type="number" name="phone_number_1"><br>
		Τηλέφωνο 2: <input type="number" name="phone_number_2"><br>
		Υπηρεσίες: 
		Wifi <input type="checkbox" name="Wifi" value="Wifi"> 
		Gym <input type="checkbox" name="Gym" value="Gym"> 
		Spa <input type="checkbox" name="Spa" value="Spa"> 
		Golf <input type="checkbox" name="Golf" value="Golf"> <br>
		Βαθμολογία:	<input type="radio" name="rate" value="1">1
					<input type="radio" name="rate" value="2">2
					<input type="radio" name="rate" value="3">3
					<input type="radio" name="rate" value="4">4
					<input type="radio" name="rate" value="5" checked>5<br>
		Έτος Κατασκευής: <input type="number" name="constructiondate"><br>
		Έτος Ανακαίνησης: <input type="number" name="renovationdate"><br>
   
		<input type="submit" value="Καταχώρηση!" class='submit' />
	</form>
</div>	

<script type="text/javascript">
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
				if(inputs[i].name.toLowerCase() == 'renovationdate') {
					if ( !validateRenovNumber( inputs[i].value ) ) {
						alert( "Invalid Inputs: renovationdate!" );
						return false;
					}
				}
				else {
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
	function validateRenovNumber( number ) {
		if ( number == '' ) {
			return true;
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