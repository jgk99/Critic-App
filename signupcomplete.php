<?php
require_once("includes/forcessl.php");
require_once("includes/restricted.php");
require_once("includes/dbfuncs.php");
//error_reporting(E_ALL | ~E_ubTRICT);

if (isset($_POST['submit'])) {
	$username = $_POST["username"]; 
	$password = $_POST["pw"];
	
	$success = validateUser($username, $password);

	if ($success) {
		$userid = getIDFromUsername($username);
		$_SESSION["id"] = $userid;
		header("Location: movies.php");
		exit();
	}
}

?>

<!DOCTYPE html>

<html>
<head>
	<title>My Movie Critic</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<meta charset="UTF-8">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<body>



<div class="container">
	<?php require_once("includes/header.php"); ?>
<br> <br> <br> <br> <br> <br> 
<h2 class="text-center">Congratulations, your My Movie Critic Account is Complete!!!</h2>
<br> <p class="text-center lead">You should start rating movies that you have already seen now!<br /><br />
<a href='movies.php' class='btn btn-primary'>Rate Movies Here</a>
<br /><br />That way you will have your similar movie critics ready when you actually need to find out about a movie!!!</p>



<br> <br> <br> <br> <br> <br> <br> <br> 

	<?php require_once("includes/footer.php"); ?>

</body>
</html>