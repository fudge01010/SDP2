<html>
<p> I am testing bags</p>

<!-- THIS IS A HTML TAG TO EMBED JAVASCRIPT -->
<script type="text/javascript">
// This is javascript embedding a php function
var ar =
<?php
// this is inside the php function
include('functions.php');
$base = get_base();
$result = file_get_contents($base . '/queries.php?qid=99');
echo($result);
?>;
// the php function has now echoed the query as a JSON string,
// and the JS has parsed it into a variable.
console.log(ar);
</script>


<p>wow</p>
</html>