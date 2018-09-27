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
<?php

$html = file_get_contents('http://fudg3.xyz:1414/sdp2/www/queries.php?qid=1');
echo($html)
?>
	<!-- <table style="width:100%">
	  <tr>
	  	<th><input type="checkbox" name="name1" width=10px/></th>
	    <th>Name:</th>
	    <th>Product ID:</th> 
	    <th>Price:</th>
	  </tr>
	  <tr>
	  	<td><input type="checkbox" name="name2"/></td>
	    <td>FlexEze Heat Patches 1 Pack</td>
	    <td>84011</td> 
	    <td>2.49</td>
	  </tr>
	  <tr>
	  	<td><input type="checkbox" name="name3"/></td>
	    <td>YPL Slim Legging</td>
	    <td>88260</td> 
	    <td>35.00</td>
	  </tr>
	  <tr>
	  	<td><input type="checkbox" name="name4"/></td>
	    <td>Panamax 500mg 100 Tablets</td>
	    <td>41147</td> 
	    <td>1.99</td>
	  </tr>
	  <tr>
	  	<td><input type="checkbox" name="name5"/></td>
	    <td>Blackmores Bio C 1000mg 150 Tablets Vitamin C</td>
	    <td>42930</td> 
	    <td>19.99</td>
	  </tr>
	  <tr>
	  	<td><input type="checkbox" name="name6"/></td>
	    <td>Lucas Papaw Ointment 25g</td>
	    <td>41820</td> 
	    <td>5.99</td>
	  </tr>
	</table> -->
</body>

</html>