<?php

$box_office = file_get_contents('http://api.rottentomatoes.com/api/public/v1.0/lists/movies/box_office.json?apikey=nqr68qe538tc2hsub2c5fubt');
$movielist = json_decode($box_office);

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

	<div class="jumbotron">
		<h2>Top Box Office Hits</h2>
	</div>
	
	<script type="text/javascript">
	var movies = <?php echo $box_office ?>;
	var i = 0;
	</script>
	
	<div class="row">
		<div class="col-sm-6 col-md-4">
			<div class="thumbnail">
				<script type="text/javascript">
				document.write("<img src=\"http://img.omdbapi.com/?i=tt" + movies.movies[i].alternate_ids['imdb'] + "&apikey=51ced2f\"");          
				</script> alt="...">
				<div class="caption">
					<h3>
						<script type="text/javascript">
							document.write(movies.movies[i].title);          
						</script>
					</h3>
					<p>
						<script type="text/javascript">
							document.write(movies.movies[i].synopsis);   
						</script>
					</p>
					<p>
						<script type="text/javascript">
							document.write("<a href=\"movie.php?id=" + movies.movies[i].alternate_ids['imdb'] + "\"");
							i++;          
						</script> class="btn btn-primary" role="button">Details</a>
					</p>
				</div>
			</div>
		</div>
		
		<div class="col-sm-6 col-md-4">
			<div class="thumbnail">
				<script type="text/javascript">
					document.write("<img src=\"http://img.omdbapi.com/?i=tt" + movies.movies[i].alternate_ids['imdb'] + "&apikey=51ced2f\"");          
				</script> alt="...">
				<div class="caption">
					<h3>
						<script type="text/javascript">
							document.write(movies.movies[i].title);          
						</script>
					</h3>
					<p>
						<script type="text/javascript">
							document.write(movies.movies[i].synopsis);   
						</script>
					</p>
					<p>
						<script type="text/javascript">
							document.write("<a href=\"movie.php?id=" + movies.movies[i].alternate_ids['imdb'] + "\"");
							i++;          
						</script> class="btn btn-primary" role="button">Details</a>
					</p>
				</div>
			</div>
		</div>
		
		<div class="col-sm-6 col-md-4">
			<div class="thumbnail">
				<script type="text/javascript">
					document.write("<img src=\"http://img.omdbapi.com/?i=tt" + movies.movies[i].alternate_ids['imdb'] + "&apikey=51ced2f\"");          
				</script> alt="...">
				<div class="caption">
					<h3>
						<script type="text/javascript">
							document.write(movies.movies[i].title);          
						</script>
					</h3>
					<p>
						<script type="text/javascript">
							document.write(movies.movies[i].synopsis);   
						</script>
					</p>
					<p>
						<script type="text/javascript">
							document.write("<a href=\"movie.php?id=" + movies.movies[i].alternate_ids['imdb'] + "\"");
							i++;          
						</script> class="btn btn-primary" role="button">Details</a>
					</p>
				</div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-sm-6 col-md-4">
			<div class="thumbnail">
				<script type="text/javascript">
					document.write("<img src=\"http://img.omdbapi.com/?i=tt" + movies.movies[i].alternate_ids['imdb'] + "&apikey=51ced2f\"");          
				</script> alt="...">
				<div class="caption">
					<h3>
						<script type="text/javascript">
							document.write(movies.movies[i].title);          
						</script>
					</h3>
					<p>
						<script type="text/javascript">
							document.write(movies.movies[i].synopsis);   
						</script>
					</p>
					<p>
						<script type="text/javascript">
							document.write("<a href=\"movie.php?id=" + movies.movies[i].alternate_ids['imdb'] + "\"");
							i++;          
						</script> class="btn btn-primary" role="button">Details</a>
					</p>
				</div>
			</div>
		</div>
		
		<div class="col-sm-6 col-md-4">
			<div class="thumbnail">
				<script type="text/javascript">
					document.write("<img src=\"http://img.omdbapi.com/?i=tt" + movies.movies[i].alternate_ids['imdb'] + "&apikey=51ced2f\"");          
				</script> alt="...">
				<div class="caption">
					<h3>
						<script type="text/javascript">
							document.write(movies.movies[i].title);          
						</script>
					</h3>
						<p>
						<script type="text/javascript">
							document.write(movies.movies[i].synopsis);   
						</script>
					</p>
					<p>
						<script type="text/javascript">
							document.write("<a href=\"movie.php?id=" + movies.movies[i].alternate_ids['imdb'] + "\"");
							i++;          
						</script> class="btn btn-primary" role="button">Details</a>
					</p>
				</div>
			</div>
		</div>
		
		<div class="col-sm-6 col-md-4">
			<div class="thumbnail">
				<script type="text/javascript">
					document.write("<img src=\"http://img.omdbapi.com/?i=tt" + movies.movies[i].alternate_ids['imdb'] + "&apikey=51ced2f\"");          
				</script> alt="...">
				<div class="caption">
					<h3>
						<script type="text/javascript">
							document.write(movies.movies[i].title);          
						</script>
					</h3>
					<p>
						<script type="text/javascript">
							document.write(movies.movies[i].synopsis);   
						</script>
					</p>
					<p>
						<script type="text/javascript">
							document.write("<a href=\"movie.php?id=" + movies.movies[i].alternate_ids['imdb'] + "\"");
							i++;          
						</script> class="btn btn-primary" role="button">Details</a></p>
				</div>
			</div>
		</div>
	</div>
</div>

<?php require_once("includes/footer.php"); ?>

</body>
</html>