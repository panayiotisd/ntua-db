<!-- Make index tab active -->
<script type="text/javascript">
	document.getElementById("tab0").className = document.getElementById("tab1").className.replace( /(?:^|\s)MyClass(?!\S)/g , '' )
	document.getElementById("tab1").className = document.getElementById("tab1").className.replace( /(?:^|\s)MyClass(?!\S)/g , '' )
	document.getElementById("tab2").className = document.getElementById("tab1").className.replace( /(?:^|\s)MyClass(?!\S)/g , '' )
	document.getElementById("tab3").className = document.getElementById("tab1").className.replace( /(?:^|\s)MyClass(?!\S)/g , '' )
	document.getElementById("tab4").className = document.getElementById("tab1").className.replace( /(?:^|\s)MyClass(?!\S)/g , '' )
	
	document.getElementById("tab5").className = "active";
</script>