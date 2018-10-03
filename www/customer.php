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
	<button onclick="location.href='editcustomer.html'" type="button">Edit Customers</button>

<!-- SET UP THE TABLE -->
<table class=\"resultstable\">
<tr><th>Customer ID</th><th>Name</th><th>Phone Number</th><th>Post Code</th></tr>


<?php
// QUERY THE TABLE, LET THE PHP SCRIPT FILL THE TR'S AND TD's
include('functions.php');
$base = get_base();
$result = file_get_contents($base . '/queries.php?qid=3');
echo($result);
?>

<!-- DATA ALL PRINTED, END THE TABLE NEATLY -->

</table>
</body>

</html>