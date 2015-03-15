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
		$username_blank .= "Username is required";
		$username_set="1";
	}

    if(!isset($password) || $password === "") {
		$password_blank .= "Password is required";
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
			<li><a href="books.html">MOVIES<a> </li>
			<li><a href="bio.html">CRITICS</a> </li>
			<li><a href="bio.html">My Account</a> </li>
		</ul>
	</nav>
	<article>
		<h2> Sign In Here</h2>

		<form action="signin.php" method="post">
			Username: <input type="text" name="username" value="<?php echo $username; ?>" /><font color=red><?php echo $username_blank;?></font><br /><br />
			Password: <input type="password" name="password" value="<?php echo $password; ?>" /><font color=red><?php echo $password_blank;?></font><br /><br />
			<input type="submit" name="submit" value="Submit" />
		</form>
		<br />
		If you don't have an account click <a href="signup.php">here</a>.
		<br /><br /><br />
</div>

<?php require_once("footer.php"); ?>

</body>
</html>