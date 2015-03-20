<<<<<<< HEAD
<?php


?>

=======
>>>>>>> origin/master
<!DOCTYPE html>

<html>
<head>
<<<<<<< HEAD
	<title>My Film Critic</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="UTF-8">
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	<script>
function happy () {
  var flickerAPI = "http://api.flickr.com/services/feeds/photos_public.gne?jsoncallback=?";
  $.getJSON( flickerAPI, {
    tags: "mount rainier",
    tagmode: "any",
    format: "json"
  })
    .done(function( data ) {
      $.each( data.items, function( i, item ) {
        $( "<img>" ).attr( "src", item.media.m ).appendTo( "#images" );
        return "Hello";
        if ( i === 3 ) {
          return false;
        }
      });
    });
};
</script>
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
		<h2>Movie Detail</h2>
		<br />
 <div class = "moviedetail"></div>
		<br />
		<p>If you don't have an account click <a href="signup.php">here</a></p>
		<br />
=======

	<article>
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
				document.write("<h3><div style=\"text-align: center\">" + movie.title + "</div></h3><br />");
				document.write("<img src=\"http://img.omdbapi.com/?apikey=51ced2f&i=tt" + movie.alternate_ids['imdb'] + "\" width=\"24%\" />");
				// Maybe we shouldn't use these movie synposes. They often have weird things added to the end of them and they don't exist for certain movies.
				document.write("<div id=\"movie-description\">" + omdb_movie.Plot + "</span>");
			}
		</script>
>>>>>>> origin/master
	</article>
</div>

<?php require_once("includes/footer.php"); ?>

</body>
</html>