<html>
<head>
	<title>Inventory </title>
	<meta charset="utf-8">
	<meta name="description" content="Web development">
	<meta name="keywords" content="HTML, CSS">
	<meta name="author" content="group 4">
	<link rel="stylesheet" href="styles/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- jquery script -->
	<script>
		$(document).ready(function(){
			// when the page has loaded and the doc is ready, this function is called
			$.post("queries.php", //create a new POST request to this page
			{
				//this is your data you are POSTING to the query script!
				qid: 11
				// id: 1010//
				//name: "Bob Smith"
			}, function(data, status){
			    var result = $.parseJSON(data);
			    	$.each(result, function(i, field){
			    		$("#resultstable").find("tbody:last").append("<tr><td><a href=\"edititem.html?pid=" + field.prod_id + "\">" + field.prod_id + "</a></td><td>" + field.name + "</td><td>" + field.description + "</td><td>" + field.cost + "</td></tr>");
      	});
			    	// console.log(result);
			    });
		});
	</script>
</head>
<body>
	<button onclick="location.href='additem.html'" type="button">Add Item(s)</button> <strong>Click a product ID to edit it's details.</strong>
	<!-- <button onclick="location.href='edititem.html'" type="button">Edit Item(s)</button> -->

<!-- SET UP THE TABLE -->
<table id="resultstable">
	<thead>
		<tr><th>Product ID</th><th>Name</th><th>Description</th><th>Cost</th></tr>
	</thead>
	<tbody>
	</tbody>
	<!-- DATA ALL PRINTED, END THE TABLE NEATLY -->
</table>
</body>

</html>

