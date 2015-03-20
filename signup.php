<?php

<<<<<<< HEAD
//error_reporting(E_ALL | ~E_ubTRICT);
=======
error_reporting(E_ALL | ~E_ubTRICT);
>>>>>>> origin/master

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
<<<<<<< HEAD
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
=======
	$password1 = $_POST["password1"];
	$password2 = $_POST["password2"];

	if(!isset($name) || $name === "") {
		$name_blank .= "Name is required";
		$name_set="1";
	}
	
	if(!isset($email) || $email === "") {
		$email_blank .= "Email is required";
		$email_set="1";
	}
	
	if(!isset($_POST["username"])) {
		$username_blank .= "Username is required";
		$username_set="1";
	}
	
	if(!isset($_POST["password1"]) || $password1 === "") {
		$password1_blank .= "Password is required";
		$password1_set="1";
	}
	
	if(!isset($_POST["password2"]) || $password2 === "") {
		$password2_blank .= "Password is required";
		$password2_set="1";
	}
	
	if(($_POST["password2"])!=($_POST["password1"])) {
		$password_problem .= "Passwords do not match";
		$password_match="1";
	}
	
	if(!isset($_POST["username"]) || $username === "") {
		$username_blank .= "Username is required";
		$username_set="1";
	}
	
	// No need to send email just yet
	/* if($name_set=="0" && $email_set=="0" && $username_set=="0"&& $password1_set=="0"&& $password2_set=="0"&& $password_match=="0" && $never=="0") {
		require_once 'lib/swift_required.php';$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, "ssl")->setUsername('')
		  ->setPassword('');
		$mailer = Swift_Mailer::newInstance($transport);
		$message = Swift_Message::newInstance('Test Subject')
		  ->setFrom(array('jkogan18@cgps.org' => 'ABC'))
		  ->setTo(array($email))
		  ->setBody($comments);
		$result = $mailer->send($message);
	}
	*/
	
	if($name_set=="0" && $email_set=="0"  && $username_set=="0" && $password1_set=="0" && $password2_set== "0" && $password_match=="0") {
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
>>>>>>> origin/master
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