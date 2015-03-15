<?php 
error_reporting(E_ALL | ~E_STRICT);

$name_blank=""; 
$email_blank="";
$gender_blank="";
$username_blank="";
$password1_blank="";
$password2_blank="";
$password_problem="";

$name_set="0";
$email_set="0";
$gender_set="0";
$password1_set="0";
$password2_set="0";
$gender_set="0";
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
	
	if($name_set=="0" && $email_set=="0" && $gender_set=="0" && $username_set=="0"&& $password1_set=="0"&& $password2_set=="0"&& $password_match=="0" && $never=="0") {
		require_once 'lib/swift_required.php';$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, "ssl")->setUsername('')
		  ->setPassword('');
		$mailer = Swift_Mailer::newInstance($transport);
		$message = Swift_Message::newInstance('Test Subject')
		  ->setFrom(array('jkogan18@cgps.org' => 'ABC'))
		  ->setTo(array($email))
		  ->setBody($comments);
		$result = $mailer->send($message);
	}

	if($name_set=="0" && $email_set=="0" && $gender_set=="0" && $username_set=="0" && $password1_set=="0" && $password2_set== "0" && $password_match=="0") {
		echo "$username" . "$password1" . "$name" . "$gender" . "$email";
		//In the actual thing these values will go in the database
	}
}
?>

<!DOCTYPE html>

<html>
<head>
	<meta charset="UTF-8">
	<title>Your Personal Movie Critic</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="container">
	<header>
		<h1>The Movie Critic</h1>
	</header>
	<nav>
		<ul>
			<li><a href="index.php">HOME</a> </li>
			<li><a href="movies.php">MOVIES<a> </li>
			<li><a href="bio.html">CRITICS</a> </li>
		</ul>
	</nav>
	<article>
		<h2> Sign Up Here</h2>
		<form action="signup.php" method="post">
			Name	: <input type="text" name="name" value="<?php echo $name; ?>" /><font color=red><?php echo $name_blank;?></font><br /><br /><br />
			Username: <input type="text" name="username" value="<?php echo $username; ?>" /><font color=red><?php echo $username_blank;?></font><br /><br /><br />
			Email   : <input type="text" name="email" value="<?php echo $email; ?>" /><font color=red><?php echo $email_blank;?></font><br /><br /><br />
			Password: <input type="password" name="password1" value="<?php echo $password1; ?>" /><font color=red><?php echo $password1_blank;?></font><br /><br /><br />
			Confirm Password: <input type="password" name="password2" value="<?php echo $password2; ?>" /><font color=red><?php echo $password2_blank;?><br /><br /><?php echo $password_problem;?><br /></font>
			<input type="submit" name="submit" value="Submit" />
		</form>
		<br /><br /><br />
		If you already have an account click <a href="signin.php">here</a>.
		<br /><br /><br />
	<article>
</div>

<?php require_once("footer.php"); ?>

</body>
</html>