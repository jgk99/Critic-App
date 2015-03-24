<?php
	if (isset($_GET['id'])) { 

		}
	else {
			header("Location: index.php");
			die();

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

<div class="container">
	
	<?php require_once("includes/header.php"); ?> 

		<?php

		if($_GET["id"])
		{
			$id_exists = false;
			$movie_query = file_get_contents('http://api.rottentomatoes.com/api/public/v1.0/movie_alias.json?type=imdb&apikey=nqr68qe538tc2hsub2c5fubt&id=' . $_GET["id"]);
			$omdb_movie = file_get_contents('http://www.omdbapi.com/?i=tt' . $_GET["id"] . '&plot=full&r=json');
			if (strpos($movie_query, '{"error":"Could not find a movie with the specified id"}') === false) {
				$id_exists = true;
			}
		}

		?>

		<script type="text/javascript">
			var id_exists = <?php echo json_encode($id_exists); ?>;
			if (id_exists) {
				var movie = <?php echo $movie_query; ?>;
				var omdb_movie = <?php echo $omdb_movie ?>;
				/* document.write("<h2><div class=\"col-md-5\">" + movie.title + "</div></h2><br />");
				document.write("<h4><div class=\"col-md-5\">Director: " + omdb_movie.Director + "</div></h4><br />");
				document.write("<h5><div class=\"col-md-5\">Cast: " + omdb_movie.Actors + "</div></h5><br />");
				document.write("<img src=\"http://img.omdbapi.com/?apikey=51ced2f&i=tt" + movie.alternate_ids['imdb'] + "\>"); */
				// Maybe we shouldn't use these movie synposes. They often have weird things added to the end of them and they don't exist for certain movies.
			}


		</script>
			<div class ="col-md-2 well well-sm">
				<script type="text/javascript">
				document.write("<img src=\"http://img.omdbapi.com/?apikey=51ced2f&i=tt" + movie.alternate_ids['imdb'] + "\" width=\"\"/ class='img-responsive'>");
				</script>
				</div>
			<div class ="col-md-9 col-md-offset-0">
				<script type="text/javascript">
				document.write("<h2>" + movie.title + "</h2>");
				</script>
				</div>
			<div class="col-md-6 col-md-offset-1">
  				<div class='row'>
   					<script type="text/javascript">
   					document.write("<h4>Director: " + omdb_movie.Director + "</h4>");
   					</script>
  				</div>
			</div>
<div class="col-md-9 col-md-offset-1">
<a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
  Plot
</a>
<div class="collapse" id="collapseExample">
  <div class="row">
  <div class="well">
   <script type="text/javascript">
   document.write(omdb_movie.Plot);
   </script>
  </div>
</div>
</div>
</div>
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
<?php require_once("includes/footer.php"); ?>

</body>
</html>