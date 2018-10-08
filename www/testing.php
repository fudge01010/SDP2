<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <meta name="author" content="Jack Fuge"  />
  <title></title>
</head>
<body>
<h1>js test</h1>
<script type="text/javascript">
	var name = "this is a test product";
	var description = "this is a long description for my test product! it's";
	var cost = 420.69;
	name = encodeURI(name);
	description = encodeURI(description);
	cost = encodeURI(cost);

	//
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("txtHint").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "gethint.php?q=" + str, true);
    xmlhttp.send();

</script>

<?php
// this is inside the php function
include('functions.php');
$base = get_base();

$result = file_get_contents($base . "queries.php?qid=15&name=<script>document.writeln(name);</script>&description=<script>document.writeln(description);</script>&cost=<script>document.writeln(cost);</script>");
echo($result);
?>;
</body>
</html>