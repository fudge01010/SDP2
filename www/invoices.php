<html>
<head>
	<title>Inventory </title>
	<meta charset="utf-8">
	<meta name="description" content="Web development">
	<meta name="keywords" content="HTML, CSS">
	<meta name="author" content="group 4">
	<link rel="stylesheet" href="styles/style.css">
</head>
<body>
		<button onclick="location.href='editinvoices.html'" type="button">Edit Invoices</button>
		<button onclick="location.href='addinvoices.html'" type="button">Add Invoice</button>

<!-- SET UP THE TABLE -->
<table class=\"resultstable\">
<tr><th>Invoice ID</th><th>Date</th><th>Total</th><th>Paid</th><th>Customer</th></tr>

<?php
// QUERY THE TABLE, LET THE PHP SCRIPT FILL THE TR'S AND TD's
$html = file_get_contents('http://fudg3.xyz:1414/sdp2/www/queries.php?qid=');
echo($html);
?>

<!-- DATA ALL PRINTED, END THE TABLE NEATLY -->

</table>
</body>

</html>