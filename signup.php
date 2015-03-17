<?php

error_reporting(E_ALL | ~E_STRICT);

function redirect_to($new_location) {
	header("Location: " . $new_location);
	exit;
} 

$name_blank=""; 
$email_blank="";
$username_blank="";
$password1_blank="";
$password2_blank="";
$password_problem="";

$name_set="0";
$email_set="0";

$password1_set="0";
$password2_set="0";

$username_set="0";
$password_match="0";
$never="100";
$name = "";
$email = "";
$website = "";
$password1 = "";
$password2 = "";
$username = "";

if(isset($_POST['submit'])) {
	$name = $_POST["name"];
	$email = $_POST["email"]; 
	$username = $_POST["username"];
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
		
		redirect_to("questions.php");
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
		<h2>Sign Up</h2>
		<br />
		<table align="left">
			<form action="signup.php" method="post">
				<tr>
					<td align="l;" class="form-label">Name: </td>
					<td align="left"><input type="text" name="name" value="<?php echo "$name"; ?>" /><font color="red"><?php echo "$name_blank"; ?></font></td>
				</tr>
				<tr>
					<td class="form-label">Username: </td>
					<td align="left"><input type="text" name="username" value="<?php echo "$username"; ?>" /><font color="red"><?php echo "$username_blank"; ?></font></td>
				</tr>
				<tr>
					<td class="form-label">Email: </td>
					<td align="left"><input type="text" name="email" value="<?php echo "$email"; ?>" /><font color="red"><?php echo "$email_blank"; ?></font></td>
				</tr>
				<tr>
					<td class="form-label">Password: </td>
					<td align="left"><input type="password" name="password1" value="<?php echo "$password1"; ?>" /><font color="red"><?php echo "$password1_blank"; ?></font></td>
				</tr>
				<tr>
					<td class="form-label">Confirm Password: </td>
					<td align="left"><input type="password" name="password2" value="<?php echo "$password2"; ?>" /><font color="red"><?php echo "$password2_blank"; ?><?php echo "$password_problem"; ?></font></td>
				</tr>
				<tr>
					<td><input type="submit" name="submit" value="Submit" /></td>
				</tr>
			</form>
		</table>
		<br />
		If you already have an account click <a href="signin.php">here</a>.
	<article>
</div>

<?php require_once("includes/footer.php"); ?>

</body>
</html>