	<!DOCTYPE html>
<html>
<head>
	<title>Inventory </title>
	<meta charset="utf-8">
	<meta name="description" content="Web development">
	<meta name="keywords" content="HTML, CSS">
	<meta name="author" content="group 4">
</head>

<body>

	<button onclick="location.href='inventory.php'">Go Back</button>
	<form action="additem.php" method="post">
	<section id="additem">
	<h3>Details needed for item.</h3>
		<p>
			Enter details below to add new item into the database
		</p>
		<p>
			<label for="itemname">Name:</label>
			<input type="text" name="itemname" id="itemname"   placeholder="eg. Bandaids" maxlength="20" required="required"/>
		</p>
		
		<p>
			<label for="desc">Description:</label>
			<input type="text" name="desc" id="desc"   placeholder="eg. ...." maxlength="200" required="required"/>
		</p>
		<p>
			<label for="price">Price:</label>
			<input type="text" name="price" id="price" placeholder="eg. 20.00" maxlength="20" required="required"/>
		</p>
		<input type= "submit" value="Submit"/>
   		<input type= "reset" value="Reset Form"/>
  </form>
	<?php
		include("conn.php");
		
		if (isset ($_POST["itemname"]) && ($_POST["desc"]) && ($_POST["price"]) ){ 
			$itemname = $_POST["itemname"];
			$desc = $_POST["desc"];			
			$price = $_POST["price"];
				
			$conn = @mysqli_connect($servername, $username, $password)
			or die('Failed to connect to server');
				
			
			@mysqli_select_db($conn, $dbname)
			or die('Database not available');
			
			//$itemname = "test";
			//$desc = "test";
			//$price = "test";
					
			$sql =
			"INSERT INTO products (name, description, cost)
			VALUES ('$itemname', '$desc', '$price')";
			if(mysqli_query($conn, $sql)){
				echo "Records inserted successfully.";
			} else{
				echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
			}
			
			mysqli_close($conn);
			
		}
		
		
		
	?>
</body>

</html>
