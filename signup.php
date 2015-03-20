<?php

//error_reporting(E_ALL | ~E_ubTRICT);

/*function redirect_to($new_location) {
	header("Location: " . $new_location);
	exit;
} */

$never="100";
$name = "";
$email = "";
$password1 = "";
$username = "";

if(isset($_POST['submit'])) {
	$name = $_POST["fullname"];
	$email = $_POST["email"]; 
	$username = $_POST["username"];
	$password1 = $_POST["pw"];
	session_start();
	$_SESSION["in"]="378";
	$_SESSION["name"]="$name";
	$_SESSION["username"]="$username";
	$_SESSION["password"]="$password1";
	$_SESSION["email"]="$email";
	include 'dbfuncs.php';
	$nameArr=explode(" ",$name);
	$first=$nameArr[0];
	$last=$nameArr[1];
	addUser($last, $first, $username, $email, $password1);
	redirect_to("questions.php");
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
		<h2>Sign Up</h2>
		<br />
		<script src="js/parsley.min.js"></script>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
		<table align="left">
			<form action="signup.php" method="post">
				<tr>
					<td align="l;" class="form-label">Name: </td>
					<td align="left"><input type="text" name="fullname" required /></td>
				</tr>
				<tr>
					<td class="form-label">Username: </td>
					<td align="left"><input type="text" name="username" required /></td>
				</tr>
				<tr>
					<td class="form-label">Email: </td>
					<td align="left"><input type="email" name="email" data-parsley-type="email" required /></td>
				</tr>
				<tr>
					<td class="form-label">Password: </td>
					<td align="left"><input type="password" name="pw" id="pw" parsley-minlength="8" required/></td>
				</tr>
				<tr>
					<td class="form-label">Confirm Password: </td>
					<td align="left"><input type="password" name="pw-verify" parsley-equalto="#pw" required/></td>
				</tr>
				<tr>
					<td><input type="submit" name="submit" value="Submit" /></td>
				</tr>
			</form>
			<script type="text/javascript">
  				$('#form').parsley();
			</script>
		</table>
		<br />
		If you already have an account click <a href="signin.php">here</a>.
	<article>
</div>

<?php require_once("includes/footer.php"); ?>

</body>
</html>