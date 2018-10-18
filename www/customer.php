<html>
<head>
	<title>Inventory </title>
	<meta charset="utf-8">
	<meta name="description" content="Web development">
	<meta name="keywords" content="HTML, CSS">
	<meta name="author" content="group 4">
	<link rel="stylesheet" href="styles/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="scripts/papaparse.min.js"></script>
	<script src="scripts/FileSaver.js"></script>

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
			    		$("#resultstable").find("tbody:last").append("<tr><td><a href=\"editcustomer.html?cid=" + field.cust_id + "\">" + field.cust_id + "</td><td>" + field.fullname + "</td><td>" + field.contactno + "</td><td>" + field.postcode + "</td></tr>");
			    		console.log(field);
			    	});
			    	toDL = Papa.unparse(result);
			    });
			$('#download').click( function() {
			csvData = new Blob([toDL], {type: 'text/csv;charset=utf-8;'});
			// var blob = new Blob(toDL, {type: "text/csv;charset=utf-8"});
			saveAs (csvData, "data.csv");
			});
		});
	</script>
</head>
<body>
	<button onclick="location.href='addcustomer.html'" type="button">Add Customer</button>
	<!-- <button onclick="location.href='editcustomer.html'" type="button">Edit Customer</button> -->
	<br />
	<a href="#" id="download">Download this page's data as CSV</a>

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