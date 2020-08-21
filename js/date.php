<h1>Jitendra dariwal </h1>

<script>
	var today = new Date();
	
	// Setting up the listener that will check if a new day is there
    setInterval(function(){
		console.log("Today var : "+today);
		console.log("Today : "+ new Date());
    }, 1000);
	
	var d = new Date("February 29, 2012");
	console.log("Date ", d.toLocaleDateString());
	d.setMonth(d.getMonth() + 1);
	console.log("Next Month Date", d.toLocaleDateString());
	d.setYear(d.getFullYear() + 1);
	console.log("Next Year Date", d.toLocaleDateString());
</script>