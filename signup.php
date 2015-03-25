<?php

require_once("includes/forcessl.php");
require_once("includes/dbfuncs.php");

function redirect_to($new_location) {
	header("Location: " . $new_location);
	exit;
}

$unameTaken = "";
$emailTaken = "";
$lastname = "";
$firstname = "";
$email = "";
$username = "";
$password1 = "";
$password2 = "";
$error = "nhappened";
$pmatch = "";
$never = "100";
$name1 = "";
$lname = "";
$email = "";
$password1 = "";
$lname = "";

if (isset($_POST['submit'])) {
	$firstname = $_POST["firstname"];
	$lastname = $_POST["lastname"];
	$email = $_POST["email"]; 
	$username = $_POST["username"];
	$password1 = $_POST["pw"];
	$password2 = $_POST["pw-verify"];

	if($password1!=$password2){
		$error="happened";
		$pmatch='<font color=red>Passwords do not match</font>';
	}
	/* session_start();
	$_SESSION["in"]="378";
	$_SESSION["name"]="$name";
	$_SESSION["lname"]="$lname";
	$_SESSION["password"]="$password1";
	$_SESSION["email"]="$email";
	*/ 
	if($error==="nhappened"){
		try {
			addUser($lastname, $firstname, $username, $email, $password1);
		} catch (mysqli_sql_exception $e) {
 			$errArr = explode(' ', $e->getMessage());
 			print_r($errArr);
			if ('$errArr[0]'== 'Duplicate') {
				$dupeField = $errArr[5];
				if ($dupeField == 'username') {
					$unameTaken='<font color=red>Your username is already taken by another user. Please make another one.</font>';
				}
				if ($dupeField == 'Email') {
					$emailTaken='<font color=red>Your email is already taken by another user. Please make another one.</font>';
				}
			}
 		}
 		//Add the session that makes them stay logged in
		redirect_to("movies.php");

	}
}

?>

<!DOCTYPE html>

<html>
<head>
	<title>My Movie Critic</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<meta charset="UTF-8">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<body>

<?php require_once("includes/header.php"); ?> 

<div class="container">
	<div class="col-md-6 col-md-offset-3">
		<br /><br />
		<h2>Sign Up</h2>
		<br />
		<script src="js/jquery-1.11.2.min.js"></script>
		<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script> -->
		<script src="js/parsley.min.js"></script>
		<form action="signup.php" method="post" id="register" data-parsley-validate>
			<table align="left">
				<tr>
					<td align="left" class="form-label">First Name: </td>
					<td align="left"><input type="text" name="firstname" class="form-control" value="<?php echo $firstname; ?>" required /></td>
				</tr>
				<tr>
					<td align="left" class="form-label">Last Name: </td>
					<td align="left"><input type="text" name="lastname" class="form-control" value="<?php echo $lastname; ?>" required /></td>
				</tr>
				<tr>
					<td class="form-label">Username: </td>
					<td align="left"><input type="text" name="username" class="form-control" value="<?php echo $username; ?>" required /><?php echo $unameTaken; ?></td>
				</tr>
				<tr>
					<td class="form-label">Email: </td>
					<td align="left"><input type="email" name="email" data-parsley-type="email" class="form-control" value="<?php echo $email; ?>" required /><?php echo $emailTaken; ?></td>
				</tr>
				<tr>
					<td class="form-label">Password: </td>
					<td align="left"><input type="password" name="pw" id="pw" minlength="8"  class="form-control"  value="<?php echo $password1; ?>" required /></td>
				</tr>
				<tr>
					<td class="form-label">Confirm Password: </td>
					<td align="left"><input type="password" name="pw-verify" data-parsley-equalto="#pw" class="form-control"  value="<?php echo $password2; ?>" required /><?php echo $pmatch; ?></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="submit" value="Submit" class="btn btn-md btn-primary" /></td>
				</tr>


			<!--<script type="text/javascript">
			 		$(document).ready(function(){    
						$('#form').parsley();
				});	
			</script> -->
			</table>
		</form>
	</div>
</div>
<br /><br /><br /><br /><br /><br /><br /><br />

<?php require_once("includes/footer.php"); ?>

</body>
</html>