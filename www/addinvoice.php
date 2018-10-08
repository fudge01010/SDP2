<html>
	<body>
		<?php
		function add($date, $paid, $customer) {
		if (!function_exists('get_base')) {
			include('functions.php');
			$base = get_base();
		}
		try {
			$sql="INSERT INTO invoices (date, paid, customer) VALUES ('$date','$paid','$customer')"; 
			echo "New record created successfully";
		}
		catch(PDOException $e)
		{
			echo $sql . "<br>" . $e->getMessage();
		}

		$base = null;
		}
		?>
	</body>
</html>