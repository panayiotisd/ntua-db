<div id="sel_wrapper">   
		
	<h2>Αναζήτηση Ξενοδοχείου</h2>
	<form action="hotels_doSearch.php" method="post">
		Όνομα: <input type="text" name="name" autofocus><br>
		Οδός: <input type="text" name="street"><br>
		Αριθμός: <input type="number" name="number"><br>
		ΤΚ: <input type="number" name="postalcode"><br>
		Πόλη: <input type="text" name="city"><br>
		Τηλέφωνο 1: <input type="number" name="phone_number_1"><br>
		Τηλέφωνο 2: <input type="number" name="phone_number_2"><br>
		Βαθμολογία:	<input type="radio" name="rate" value="1">1
					<input type="radio" name="rate" value="2">2
					<input type="radio" name="rate" value="3">3
					<input type="radio" name="rate" value="4">4
					<input type="radio" name="rate" value="5">5<br>
		Έτος Κατασκευής: <input type="number" name="constructiondate"><br>
		Έτος Ανακαίνησης: <input type="number" name="renovationdate"><br>
   
		<input type="submit" value="Αναζήτηση!" class='submit' />
	</form>
</div> 
