<div id="sel_wrapper">   
		
	<h2>Αναζήτηση Κράτησης</h2>
	<form action="reservations_doSearch.php" method="post">
		Ημερομηνία Κράτησης: <input type="date" name="reservation_date" id="reservation_date" class="date"><br>
		Ημερομηνία Έναρξης: <input type="date" name="start_date" autofocus class="date"><br>
		Ημερομηνία Λήξης: <input type="date" name="end_date" class="date"><br>
		Τρόπος Πληρωμής:
			<select name="payment_method">
				<option value="" selected="selected" > </option>
				<option value="cash">cash</option>
				<option value="credit card">credit card</option>
				<option value="check">check</option>
			</select><br>
		Κωδικός Πελάτη: <input type="number" name="customer_id"><br>
		Κωδικός Ξενοδοχείου: <input type="number" name="hotel_id"><br>
		Αριθμός Δωματίου: <input type="number" name="room_number"><br>
   
		<input type="submit" value="Αναζήτηση!" class='submit' />
	</form>
</div> 
