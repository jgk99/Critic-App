<!DOCTYPE html>

<html>
<head>
	<title>My Film Critic</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="UTF-8">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
	<script type="text/javascript" src="js/slideshow.js"></script>
</head>
<body>

<div class="container">
	<?php require_once("includes/header.php"); ?>

	<?php

	/*require_once("includes/connect.php"); 

	$criticSql = mysql_query("SELECT * FROM Critics
		WHERE ID='1' LIMIT 1");
	$criticSqlRow = mysql_fetch_assoc($criticSql);

	echo "Critic Name: " . $criticSqlRow['Name'] . "<br />";

	$userSql = mysql_query("SELECT * FROM Login
		WHERE ID='1' LIMIT 1");
	$userSqlRow = mysql_fetch_assoc($userSql);

	echo "User Name: " . $userSqlRow['First Name'] . " " . $userSqlRow['Last Name'] . "<br />";8*/

	?>

	<article>
		If you don't have an account click <a href="signup.php">here</a>.
		<!--<div id="slideshow">
			<a href="images/movie_posters/21_jump_street.jpg" class="slideshow-active"><img src="images/movie_posters/21_jump_street.jpg" /></a>
			<a href="images/movie_posters/21421_street.jpg"><img src="images/movie_posters/avatar.jpg" /></a>
			<a href="images/movie_posters/2421mp_street.jpg"><img src="images/movie_posters/exorcist_the_beginning.jpg" /></a>
			<a href="images/movie_posters/21_jum532222222222222eet.jpg"><img src="images/movie_posters/interstellar.jpg" /></a>
			<a href="images/movie_posters/21_421_street.jpg"><img src="images/movie_posters/lincoln.jpg" /></a>
		</div>-->
	</article>
</div>

<?php require_once("includes/footer.php"); ?>

</body>
</html>