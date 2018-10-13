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
				qid: 13
				// id: 1010//
				//name: "Bob Smith"
			}, function(data, status){
			    var result = $.parseJSON(data);
			    	$.each(result, function(i, field){
			    		$("#resultstable").find("tbody:last").append("<tr><td>" + field.cust_id + "</td><td>" + field.fullname + "</td><td>" + field.contactno + "</td><td>" + field.postcode + "</td></tr>");
			    		console.log(field);
			    	});
			    	// console.log(result);
			    });
		});
	</script>
</head>
<body>
	<button onclick="location.href='addcustomer.html'" type="button">Add Customer</button>
	<button onclick="location.href='editcustomer.html'" type="button">Edit Customer</button>

<!-- SET UP THE TABLE -->
<table id="resultstable">
	<thead>
		<tr><th>Customer ID</th><th>Name</th><th>Phone Number</th><th>Post Code</th></tr>
	</thead>
	<tbody>

	</tbody>
	<!-- DATA ALL PRINTED, END THE TABLE NEATLY -->

</table>
</body>

</html>