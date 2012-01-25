<?php
include 'access.php';

$query = mysql_query("select * from post where p_id = '$_GET[id]'");

if(mysql_num_rows($query) == 0)
	header('Location: admin.php');
	
else
{
	$result = mysql_query("delete from post where p_id = '$_GET[id]'");
	if(!$result)
	{
		header('Location: admin.php');
	}
	
	header('Location: admin.php');
}
?>