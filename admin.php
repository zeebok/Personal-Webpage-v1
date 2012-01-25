<?php include'access.php' ?>
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
	<h1>Add new post</h1>
	<p>Be sure not to leave anything blank.</p>
	<form method="post" action="post.php">
		<h2>Post Type</h2>
		<select name="category">
			<option selected>Select Type</option>
			<option value="News">News</option>
			<option value="Project">Project</option>
		</select>
		<h2>Post Title</h2>
		<textarea rows="1" cols="50" name="title"></textarea>
		<h2>Summary</h2>
		<textarea cols="80" name="summary"></textarea>
		<h2>Description</h2>
		<textarea rows="20" cols="80" name="description"></textarea>
		<br />
		<select name="progress">
			<option value="yes">Completed Project</option>
			<option value="no">Work in Progress</option>
		</select>
		<br />
		<br />
		<input type="submit" name="submit" value="Submit Post" />
	</form>
	<br />
	<h1>Current Posts</h1>
	<?php
	
	$query = "select p_id, title, summary, category from post";
	$result = mysql_query($query) or die("Could not query");
	
	echo"<table class='prettytable'><th>Title</th><th>Summary</th><th>Category</th><th>Remove?</th>";
	while($row = mysql_fetch_array($result))
	{
		?>
		<tr>
		<td><?=$row['title']?></td>
		<td><?=$row['summary']?></td>
		<td><?=$row['category']?></td>
		<td><a href="erase.php?id=<?=$row['p_id']?>">X</a></td>
		</tr>
		<?php
	}
	echo"</table>";
	
echo "</div>";
include'footer.php';
echo "</body></html>";
?>