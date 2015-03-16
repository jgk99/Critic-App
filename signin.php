<?php

$username="";
$password="";
$username_blank="";
$password_blank="";
$username_set="0";
$password_set="0";

if((isset($_POST['submit']))) {
	$username=$_POST["username"];
	$password=$_POST["password"];

	if(!isset($username) || $username === "") {
		$username_blank .= "Username is required.";
		$username_set="1";
	}

	if(!isset($password) || $password === "") {
		$password_blank .= "Password is required.";
		$password_set="1";
	}

	if($password_set=="0" && $username_set=="0") {
		echo "$username" . "$password";
		//It will actually use the database
	}
}

?>

<!DOCTYPE html>

<html>
<head>
	<title>My Film Critic</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="UTF-8">
</head>
<body>

<div class="container">
	<?php require_once("includes/header.php"); ?>
	<article>
		<h2> Sign In</h2>
		<br />
		<table align="left">
			<form action="signin.php" method="post">
				<tr>
					<td class="form-label">Username: </td>
					<td align="left"><input type="text" name="username" value="<?php echo "$username"; ?>" /><font color="red"><?php echo "$username_blank"; ?></font></td>
				</tr>
				<tr>
					<td class="form-label">Password: </td>
					<td align="left"><input type="password" name="password" value="<?php echo "$password"; ?>" /><font color="red"><?php echo "$password_blank"; ?></font></td>
				</tr>
				<tr>
					<td><input type="submit" name="submit" value="Submit" /></td>
				</tr>
			</form>
		</table>
		<br />
		If you don't have an account click <a href="signup.php">here</a>.
		<br /><br />
	</article>
</div>

<?php require_once("includes/footer.php"); ?>

</body>
</html>