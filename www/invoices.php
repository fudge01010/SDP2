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
			qid: 6,
			id: 1001
		}, function(data, status){
		    var result = $.parseJSON(data);
		    	$.each(result, function(i, field){
		    		$("#resultstable").find("tbody:last").append("<tr><td>" + field.inv_id + "</td><td>" + field.date + "</td><td>" + field.total + "</td><td>" + field.paid + "</td><td>" + field.cust_id + "</td></tr>");
		    		console.log(field);
		    	});
		    	// console.log(result);
		    });
	});
	</script>
</head>
<body>
		<button onclick="location.href='addinvoices.html'" type="button">Add Invoice</button>
		<button onclick="location.href='invoiceform.html'" type="button">Edit Invoice</button>

<!-- SET UP THE TABLE -->
<table id="resultstable">
	<thead>
		<tr><th>Invoice ID</th><th>Date</th><th>Total</th><th>Paid</th><th>Customer</th></tr>
	</thead>
	<tbody>

	</tbody>
	<!-- DATA ALL PRINTED, END THE TABLE NEATLY -->

</table>
</body>

</html>