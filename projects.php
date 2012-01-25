<!DOCTYPE HTML>
<html>

<head>
<title>RYANZERO :: Projects</title>
<link rel="stylesheet" type="text/css" href="reset.css" />
<link rel="stylesheet" type="text/css" href="null.css" />
</head>

<body>
<?php 
include'nav.php';
include("common.php");

echo "<div id='container'>
	<h1>Projects</h1>";
	dbConnect('ryanzero_post');	
	$query = "select p_id, title, summary, progress, created from post where category = 'project' and progress = 'no' order by created desc";
	$result = mysql_query($query);
	
	while($row = mysql_fetch_array($result))
	{
		echo "<h2>$row[title]</h2>
		<p>$row[summary]</p>
		Work in Progress - <a href='details.php?id=$row[p_id]'>[More Info]</a>";
	}
	echo "<h1>Archive</h1>";
	$query = "select p_id, title, summary, progress, created from post where category = 'project' and progress = 'yes' order by created desc";
	$result = mysql_query($query);
	while($row = mysql_fetch_array($result))
	{
		echo "<h2>$row[title]</h2>
		<p>$row[summary]</p> 
		Completed Project - <a href='details.php?id=$row[p_id]'>[More Info]</a>";
	}
echo "</div>";

include'footer.php';
echo "</body>
	</html>";
