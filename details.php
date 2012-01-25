<!DOCTYPE HTML>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="reset.css" />
	<link rel="stylesheet" type="text/css" href="null.css" />
	
<?php

include("common.php");
dbConnect('ryanzero_post');

$query = "select * from post where p_id = '$_GET[id]'";
$result = mysql_query($query) or die;
if(mysql_num_rows($result) == 0)
{
	?>
	<title>RYANZERO :: Projects -> error</title>
	</head>
	<body>
	<?php include'nav.php' ?>
	<div id="container">
		<h1>Error</h1>
		<p>No project exists with that ID</p>
	<?php
}
else
{
	$row = mysql_fetch_array($result);
	
	?>
	<title>RYANZERO :: Projects -> <?=$row['title']?></title>
	</head>
	<body>
	<?php include'nav.php' ?>
	<div id="container">
		<h1><?=$row['title']?></h1>
		<?=$row['description']?>
		<h3>Posted <?=$row['created']?></h3>
	<?php
}
	echo "<br />
	<a href='projects.php'>Return to Projects page</a>
	</div>";
	include'footer.php';
	echo "</body>
	</html>";
?>
