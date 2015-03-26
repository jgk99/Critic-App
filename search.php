<?php
require_once("includes/restricted.php");
require_once("includes/forcessl.php");

if (isset($_POST["query"])) { 
	$movie_query = file_get_contents('http://api.rottentomatoes.com/api/public/v1.0/movies.json?apikey=nqr68qe538tc2hsub2c5fubt&q=' . str_replace(" ", "+", $_POST["query"]));
	$movielist = json_decode($movie_query);
	$total = $movielist->total;

	if ($total == 0) {
		echo "Oops! We couldn't find a movie with that title! Try Searching Again." ;
	} else {
		$imdbid = $movielist->movies[0]->alternate_ids->imdb;

		if ($total == 1) {
			header("Location: movie.php?id=$imdbid");
			die();
		}
	}
} else {
	header("Location: index.php");
	die();

}

?>

<!DOCTYPE html>

<html>
<head>
	<title>My Movie Critic</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<meta charset="UTF-8">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
</head>
<body>

<div class="container">
	<?php require_once("includes/header.php"); ?>

	<article>
		<script type="text/javascript">
			var movies = <?php echo $movie_query ?>;

			for (var i = 0; i < movies.movies.length; i++) {
				document.write("<a href=\"movie.php?id=" + movies.movies[i].alternate_ids['imdb'] + "\">" + movies.movies[i].title + "</a><br />");
			}
		</script>
	</article>
</div>

<?php require_once("includes/footer.php"); ?>

</body>
</html>