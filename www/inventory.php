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
	<button onclick="location.href='items.html'" type="button">Edit Item</button>

<!-- SET UP THE TABLE -->
<table class=\"resultstable\">
<tr><th>prod_id</th><th>name</th><th>description</th><th>cost</th></tr>


<?php
// QUERY THE TABLE, LET THE PHP SCRIPT FILL THE TR'S AND TD's
$html = file_get_contents('http://fudg3.xyz:1414/sdp2/staging/www/queries.php?qid=1');
echo($html);
?>

<!-- DATA ALL PRINTED, END THE TABLE NEATLY -->

</table>
</body>

</html>