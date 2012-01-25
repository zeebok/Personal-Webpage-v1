<?php
include_once 'common.php';

session_start();

$uid = isset($_POST['uid']) ? $_POST['uid'] : $_SESSION['uid'];
$pwd = isset($_POST['pwd']) ? $_POST['pwd'] : $_SESSION['pwd'];
$auth = isset($_SESSION['auth'])? $_SESSION['auth'] : 0;

if(!isset($uid))
{
	?>
	<h1> Login Required </h1>
	<p><form method="post" action="<?=$_SERVER['PHP_SELF']?>">
		Username: <input type="text" name="uid" /><br />
		Password: <input type="password" name="pwd" /><br />
		<input type="submit" value="Log In" />
	</form></p>
	<?php
	exit;
}

$_SESSION['uid'] = $uid;
$_SESSION['pwd'] = $pwd;

dbConnect("database");
$query = "select * from Users where uid = '$uid' and password = '$pwd'";
$result = mysql_query($query) or die(mysql_error());
if(!$result)
{
	die('A database error occured while checking your login details.');
}

if(mysql_num_rows($result) == 0)
{
	unset($_SESSION['uid']);
	unset($_SESSION['pwd']);
	?>
	<h1>Congratulations, you're wrong!</h1>
	<p>You did not provide the correct login credentials. Try again by clicking <a href="<?$_SERVER['PHP_SELF']?>">here</a>. Or if you'd like to register click <a href="register.php">here</a>
	<?php
	exit;
}
?>