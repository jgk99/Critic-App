<!DOCTYPE html>

<html>
<head>
<<<<<<< HEAD
	<title>My Film Critic</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="UTF-8">
=======
	<title>My Movie Critic</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="UTF-8">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
>>>>>>> origin/master
</head>
<body>

<div class="container">
	<?php require_once("includes/header.php"); ?>
<<<<<<< HEAD
	<article>
		<h2> Sign In</h2>
		If you don't have an account click <a href="signup.php">here</a>.
=======

	<article>
		<form action="" method="post">
			<input type="text" name="query">
			<br />
			<input type="submit" value="Search" name="submit">
		</form>

		<?php

		if (isset($_POST['submit'])) { 
			echo "<br />";
			$movie_query = file_get_contents('http://api.rottentomatoes.com/api/public/v1.0/movies.json?apikey=nqr68qe538tc2hsub2c5fubt&q=' . str_replace(" ", "+", $_POST["query"]));
		}

		?>

		<script type="text/javascript">
			var movies = <?php echo $movie_query ?>;
			for (var i = 0; i < movies.movies.length; i++) {
				document.write("<a href=\"movie.php?id=" + movies.movies[i].alternate_ids['imdb'] + "\">" + movies.movies[i].title + "</a><br />");
			}
		</script>
>>>>>>> origin/master
	</article>
</div>

<?php require_once("includes/footer.php"); ?>

</body>
</html>