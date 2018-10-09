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
	<button onclick="location.href='edititem.html'" type="button">Add/Edit Item(s)</button>

<!-- SET UP THE TABLE -->
<table class=\"resultstable\">
<tr><th>Product ID</th><th>Name</th><th>Description</th><th>Cost</th></tr>


<?php
// QUERY THE TABLE, LET THE PHP SCRIPT FILL THE TR'S AND TD's
include('functions.php');
$base = get_base();
$result = file_get_contents($base . '/queries.php?qid=1');
echo($result);
?>

<!-- DATA ALL PRINTED, END THE TABLE NEATLY -->

</table>
</body>

</html>

