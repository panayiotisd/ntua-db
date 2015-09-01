<div id="sel_wrapper">   
	
	<?php
		if ( isset( $_GET[ 'missing' ] ) ) {
			?><div class="error">Ορισμένα από τα στοιχεία λείπουν.</div><?php
		}
	?>
		
	<h2>Επεξεργασία Ξενοδοχείου</h2>
	<form action="hotels_doEdit.php" method="post" onsubmit="return check();">
		<input type="number" name="hotel_id" value="<?php echo $hotel[0][0] ?>" hidden>
		<input type="number" name="old_phone_number_1" value="<?php if ( isset($hotel[0][10]) ) { echo $hotel[0][10]; } ?>" hidden>
		<input type="number" name="old_phone_number_2" value="<?php if ( isset($hotel[1][10]) ) { echo $hotel[1][10]; }?>" hidden>
		
		Όνομα: <input type="text" name="name" value="<?php echo $hotel[0][1] ?>" autofocus><br>
		Οδός: <input type="text" name="street" value="<?php echo $hotel[0][2] ?>"><br>
		Αριθμός: <input type="number" name="number" value="<?php echo $hotel[0][3] ?>"><br>
		ΤΚ: <input type="number" name="postalcode" value="<?php echo $hotel[0][4] ?>"><br>
		Πόλη: <input type="text" name="city" value="<?php echo $hotel[0][5] ?>"><br>
		Τηλέφωνο 1: <input type="number" name="phone_number_1" value="<?php if ( isset($hotel[0][10]) ) { echo $hotel[0][10]; } ?>"><br>
		Τηλέφωνο 2: <input type="number" name="phone_number_2" value="<?php if ( isset($hotel[1][10]) ) { echo $hotel[1][10]; }?>"><br>
		Υπηρεσίες: 
		Wifi <input type="checkbox" name="Wifi" value="Wifi" <?php
			if ( (isset($hotel_services[0][0])) && ($hotel_services[0][0] == "Wifi") ) {echo "checked";}
			if ( (isset($hotel_services[1][0])) && ($hotel_services[1][0] == "Wifi") ) {echo "checked";}
			if ( (isset($hotel_services[2][0])) && ($hotel_services[2][0] == "Wifi") ) {echo "checked";}
			if ( (isset($hotel_services[3][0])) && ($hotel_services[3][0] == "Wifi") ) {echo "checked";}
		?>> 
		Gym <input type="checkbox" name="Gym" value="Gym" <?php
			if ( (isset($hotel_services[0][0])) && ($hotel_services[0][0] == "Gym") ) {echo "checked";}
			if ( (isset($hotel_services[1][0])) && ($hotel_services[1][0] == "Gym") ) {echo "checked";}
			if ( (isset($hotel_services[2][0])) && ($hotel_services[2][0] == "Gym") ) {echo "checked";}
			if ( (isset($hotel_services[3][0])) && ($hotel_services[3][0] == "Gym") ) {echo "checked";}
		?>> 
		Spa <input type="checkbox" name="Spa" value="Spa" <?php
			if ( (isset($hotel_services[0][0])) && ($hotel_services[0][0] == "Spa") ) {echo "checked";}
			if ( (isset($hotel_services[1][0])) && ($hotel_services[1][0] == "Spa") ) {echo "checked";}
			if ( (isset($hotel_services[2][0])) && ($hotel_services[2][0] == "Spa") ) {echo "checked";}
			if ( (isset($hotel_services[3][0])) && ($hotel_services[3][0] == "Spa") ) {echo "checked";}
		?>> 
		Golf <input type="checkbox" name="Golf" value="Golf" <?php
			if ( (isset($hotel_services[0][0])) && ($hotel_services[0][0] == "Golf") ) {echo "checked";}
			if ( (isset($hotel_services[1][0])) && ($hotel_services[1][0] == "Golf") ) {echo "checked";}
			if ( (isset($hotel_services[2][0])) && ($hotel_services[2][0] == "Golf") ) {echo "checked";}
			if ( (isset($hotel_services[3][0])) && ($hotel_services[3][0] == "Golf") ) {echo "checked";}
		?>> <br>
		Βαθμολογία:	<input type="radio" name="rate" value="1" <?php if ( $hotel[0][6] == 1) echo "checked" ?> >1
					<input type="radio" name="rate" value="2" <?php if ( $hotel[0][6] == 2) echo "checked" ?> >2
					<input type="radio" name="rate" value="3" <?php if ( $hotel[0][6] == 3) echo "checked" ?> >3
					<input type="radio" name="rate" value="4" <?php if ( $hotel[0][6] == 4) echo "checked" ?> >4
					<input type="radio" name="rate" value="5" <?php if ( $hotel[0][6] == 5) echo "checked" ?> >5<br>
		Έτος Κατασκευής: <input type="number" name="constructiondate" value="<?php echo $hotel[0][7] ?>"><br>
		Έτος Ανακαίνησης: <input type="number" name="renovationdate" value="<?php echo $hotel[0][8] ?>"><br>
   
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