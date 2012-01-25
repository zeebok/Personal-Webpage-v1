<!DOCTYPE HTML>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="reset.css" />
	<link rel="stylesheet" type="text/css" href="null.css" />
	<title>RYANZERO :: Admin</title>
</head>
<body>
<?php include'nav.php' ?>

<div id="container">
	<h1>Results</h1>
<?php

include("common.php");

dbConnect('ryanzero_post');

$countquery = mysql_query("select count(p_id) from post");
$count = mysql_result($countquery, 0) + 1;
$result = mysql_query("insert into post set p_id = $count, title = '$_POST[title]', summary = '$_POST[summary]',
			description = '$_POST[description]', category = '$_POST[category]', progress = '$_POST[progress]', created = NOW()");

if(!$result)
{
	echo "<p>An error occured trying to add the post!</p>";
}
else
{
	echo "<p><?=$_POST[category]?> post created successfully!</p>";
}
?>
</div>
<?php include'footer.php' ?>
</body>
</html>
