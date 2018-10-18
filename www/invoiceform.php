<html>
<head>
	<title>Add New Invoice </title>
	<meta charset="utf-8">
	<meta name="description" content="Web development">
	<meta name="keywords" content="HTML, CSS">
	<meta name="author" content="group 4">
	<link rel="stylesheet" href="styles/style.css">
</head>

<body>
	<script type="text/javascript">
			// This is javascript embedding a php function
			var ar =
			<?php
			//this is inside the php function
			include('functions.php');
			$base = get_base();
			$result = file_get_contents($base . '/queries.php?qid=13'); //calls all customer data for JSON
			echo($result);
			?>
			//the php function has now echoed the query as a JSON string,
			//and the JS has parsed it into a variable ar.

			//console.log(ar);

		</script>
		
		
		<form action="invoiceform.php" method="post">
			<button onclick="location.href='invoices.php'">Go Back</button>
			<h3>Invoice Details</h3>

			<p>
				Please enter the details needed for the invoices.
			</p>
			
			<p>
				<label for "customer">Select Customer:</label>
				<select name = "customer" id = "customer" required = "required">
					<option value="" selected disabled hidden>Choose here</option>

					<script type="text/javascript">
						var select = document.getElementById("customer"); 

						for(var i = 0; i < ar.length; i++){
							var element = document.createElement("option");
							
							element.name = ar[i].fullname;
							element.id = ar[i].cust_id;
							element.textContent = element.id + ". " + element.name;
							select.appendChild(element);
						}
					</script>
				</select>
			</p>

			<p>
				<label for="date">Date:</label>
				<input type="date" name="date" id="date" pattern="\d+" placeholder="eg. 20/10/2010" maxlength="20" required="required"/>
			</p>
			
			<p>
				<label for="paid">Paid:</label>
				<input type="checkbox" name= "paid" id="paid" value = "1">	
			</p>
			
			<!-- Generate Product Table -->
			
			
			<script type="text/javascript">
			//create array of items for use later
			var items =
			<?php
				// QUERY THE TABLE
			$result = file_get_contents($base . '/queries.php?qid=11');
			echo($result);
			?>;
			//console.log(items);
		</script>

		<table>
			<thead>
				<tr>
					<th data-field="id">Product ID</th>
					<th data-field="name">Product Name</th>
					<th data-field="qty">Quantity</th>
				</tr>
			</thead>
			<tbody>
				<tbody id="productsTable">

					<script type="text/javascript">

						var row, cell, text, r, c,
						prop = ['prod_id', 'name'],
						table = document.getElementById("productsTable");
						for (r = 0; r < items.length; r++) {
							row = document.createElement('tr');
							for (c = 0; c < 2; c++) {
								cell = document.createElement('td');
								text = document.createTextNode(items[r][prop[c]]);
								cell.appendChild(text);
								row.appendChild(cell);
							}
							qtyCell = document.createElement('input')
							qtyCell.type = "number";
							qtyCell.defaultValue = "0";
							qtyCell.required = "required";
							row.appendChild(qtyCell);
							table.appendChild(row);
						}

					</script>
				</tbody>
			</table>
			
			<input type= "submit" value= "Submit"/>
			<input type= "reset" value="Reset Form"/>
		</form>
		<?php
		include("conn.php");

		if (isset ($_POST["date"]) && ($_POST["customer"])) { 
					$date = $_POST["date"];			
					$data = explode('.',$_POST['customer']);
					$id = $data[0];
					$fullname = $data[1];
					if (isset ($_POST["paid"])) {
						$paid = 1;
					}
					else {
						$paid = 0;
					}
					//echo "$paid";

			$conn = @mysqli_connect($servername, $username, $password)
			or die('Failed to connect to server');


			@mysqli_select_db($conn, $dbname)
			or die('Database not available');

			/*debug code:
			$inv_id = "20";
			$date = '2017-08-07';
			$total = null;
			$paid = 0;
			$customer = 22;
			*/

			$sql =
			"INSERT INTO `invoices` (`inv_id`, `date`, `total`, `paid`, `customer`) VALUES ('', '$date', NULL, '1', '$id')";
			if(mysqli_query($conn, $sql)){
				echo "Records inserted successfully.";
			} else{
				echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
			}

			//echo "DEBUG CLOSE CONN";

			mysqli_close($conn);

		}
		//echo "DEBUG END";

		?>

	</body>

	</html>