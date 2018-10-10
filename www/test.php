<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- jquery script -->
<script>
$(document).ready(function(){
	// when the page has loaded and the doc is ready, this function is called

	$.post("queries.php", //create a new POST request to this page
	{
		//this is your data you are POSTING to the query script!
		qid: 12,
		id: 1010//,
		//name: "Bob Smith"
	}, function(data, status){
	    var result = $.parseJSON(data);
	    	$.each(result, function(i, field){
	    		$("div").append(field.prod_id + " " + field.name + " " + field.description + " " + field.cost + "<br />");
	    		$("div").append(field.prod_id + " " + field.name + " " + field.description + " " + field.cost + "\n");
	    		console.log(field);
	    	});
	    	// console.log(result);
	    });
});
</script>
</head>
<body>
<p> I am testing bags</p>

<!-- THIS IS A HTML TAG TO EMBED JAVASCRIPT -->

<div></div>


<p>wow</p>
</body>
</html>