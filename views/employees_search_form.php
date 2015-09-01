<div id="sel_wrapper">   
		
	<h2>Αναζήτηση Υπαλλήλων</h2>
	<form action="employees_doSearch.php" method="post">
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
   
		<input type="submit" value="Αναζήτηση!" class='submit' />
	</form>
</div> 
