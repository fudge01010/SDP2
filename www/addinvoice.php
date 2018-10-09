<html>
	<body>
		<?php
		if (!function_exists('get_base')) {
			include('functions.php');
			$base = get_base();
		}
		try {
			$sql="INSERT INTO invoices (date, paid, customer) VALUES ('2017-01-01','1','2')"; 
			$base->exec($sql);
			echo "New record created successfully";
		}
		catch(PDOException $e)
		{
			echo $sql . "<br>" . $e->getMessage();
		}

		$base = null;
		?>
		<script>
			console.log("SUCCESS");
		</script>
	</body>
</html>