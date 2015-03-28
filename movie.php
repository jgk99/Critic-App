<?php

require_once("includes/forcessl.php");
require_once("includes/restricted.php");
require_once("includes/dbfuncs.php");
require_once("includes/similarity_algorithm.php");

if (isset($_GET['id'])) { 
} else {
	header("Location: index.php");
	die();
}
if ($happy === "localhost" || $happy === "localhost:8888") {
	
	}

	else {

$con = dbconnect();

$check_query = "SELECT * FROM `userreviews` WHERE `UserID` = '" . $_SESSION['id'] . "' AND `MovieID` = '" . $_GET['id'] . "'";
$check_query_sql = $con->query($check_query);

$exists = false;
$old_rating = 0;
while ($row = mysqli_fetch_assoc($check_query_sql)) {
	$exists = true;
	$old_rating = $row["Rating"];
}
}

if (isset($_POST['submit'])) {
	$user_rating = 0;

	if ($_POST['star'] === '5') {
		$user_rating = 5;
	} else if ($_POST['star'] === '4') {
		$user_rating = 4;
	} else if ($_POST['star'] === '3') {
		$user_rating = 3;
	} else if ($_POST['star'] === '2') {
		$user_rating = 2;
	} else if ($_POST['star'] === '1') {
		$user_rating = 1;
	} else {
		$user_rating = 0;
	}

	if ($user_rating !== 0) {
		if ($exists) {
			$query = "UPDATE `userreviews` SET `Rating` = '" . $user_rating . "' WHERE `UserID` = '" . $_SESSION['id'] . "'";
			if (!$con->query($query)) {
				throw new Exception("Query failed with error: $con->sqlstate");
			}
		} else {
			store_user_ratings($_SESSION['id'], $_GET['id'], $user_rating);
		}
		$old_rating = $user_rating;
	}
}

$stars0 = '<img src="starpics/0stars.jpg" alt="0 stars" width="100">';
$stars1 = '<img src="starpics/1star.jpg" alt="1 stars" width="100">';
$stars2 = '<img src="starpics/2star.jpg" alt="2 stars" width="100">';
$stars3 = '<img src="starpics/3star.jpg" alt="3 stars" width="100">';
$stars4 = '<img src="starpics/4stars.jpg" alt="4 stars" width="100">';
$stars5 = '<img src="starpics/5stars.jpg" alt="5 stars" width="100">';
//$userId=$_SESSION["id"];
?>

<!DOCTYPE html>

<html>
<head>
	<title>My Movie Critic</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/ratings.css">
	<meta charset="UTF-8">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('.rating input:radio').attr('checked', false);
			$('.rating #star<?php echo $old_rating ?>').prop("checked", true);
			$('.rating #star<?php echo $old_rating ?>').parent().addClass('checked');
			$('.rating input').click(function() {
				$('.rating span.' + event.target.name).removeClass('checked');
				$(this).parent().addClass('checked');
			});
		});
	</script>
</head>
<body>

<div class="container">
	<?php require_once("includes/header.php"); 

	if ($happy === "localhost" || $happy === "localhost:8888") {
	} else {
		require_once("includes/similarity_algorithm.php");
	}

	if($_GET["id"])
	{
		$id_exists = false;
		$movie_query = file_get_contents('http://api.rottentomatoes.com/api/public/v1.0/movie_alias.json?type=imdb&apikey=nqr68qe538tc2hsub2c5fubt&id=' . $_GET["id"]);
		$omdb_movie = file_get_contents('http://www.omdbapi.com/?i=tt' . $_GET["id"] . '&plot=full&r=json');
		if (strpos($movie_query, '{"error":"Could not find a movie with the specified id"}') === false) {
			$id_exists = true;
			if ($happy === "localhost" || $happy === "localhost:8888") {
	
			} else {
				store_critic_ratings($_GET["id"]);
			}
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
		}
	</script>

	<div class ="col-md-3 col-lg-3 col-sm-3 col-xs-3">
		<script type="text/javascript">
			document.write("<img src=\"http://img.omdbapi.com/?apikey=51ced2f&i=tt" + movie.alternate_ids['imdb'] + "\" width=\"\"/ class='img-responsive' />");
		</script>
		
		<div class="rating">
			<form action="" method="post" id="register">
				<div class="pull-left">
				<span class="star"><input type="radio" name="star" id="star5" value="5"><label for="star5"></label></span>
				<span class="star"><input type="radio" name="star" id="star4" value="4"><label for="star4"></label></span>
				<span class="star"><input type="radio" name="star" id="star3" value="3"><label for="star3"></label></span>
				<span class="star"><input type="radio" name="star" id="star2" value="2"><label for="star2"></label></span>
				<span class="star"><input type="radio" name="star" id="star1" value="1"><label for="star1"></label></span>
				</div>
				<input type="submit" name="submit" value="Rate" class="btn btn-md btn-primary pull-right" /></input>
			</form>
		</div>
	</div>
	<div class ="col-md-8 ">
		<script type="text/javascript">
			document.write("<h2>" + movie.title + "</h2>");
		</script>
	</div>
	

	<div class="col-md-8 col-md-offset-1">
		<div class='row'>
			<script type="text/javascript">
				document.write("<h4>Director: " + omdb_movie.Director + "</h4>");
			</script>
		</div>
	</div>

	<div class="col-md-8 col-md-offset-1">
		<div class="row">
				<script type="text/javascript">
					document.write(omdb_movie.Plot);
				</script>
		</div>
	</div>

	<div class="col-md-8 col-md-offset-4">
		<div class="row">
			<div class="well">
				<h4>Your Top Critics:</h4>
				<br />
				<script type="text/javascript">
					<?php

					$con = dbconnect();
					$matches = get_top_matches($_SESSION['id'], 5);

					foreach (array_keys($matches) as $match) {
						$rating = get_rating_from_critic($match, $_GET['id'], $con);
						if ($rating !== false) {
							
							if($rating>=1 && $rating<=2){
								$chosenStar=$stars1;
							}
							if($rating>=2 && $rating<=3){
								$chosenStar=$stars2;
							}
							if($rating>=3 && $rating<=4){
								$chosenStar=$stars3;
							}
							if($rating>=4 && $rating<=5){
								$chosenStar=$stars4;
							}
							if($rating==5){
								$chosenStar=$stars5;
							}
							
							$match_ratings[] = $match . " (" . round((5 - $matches[$match])*20) . "% similar to you) rated this movie " . get_rating_from_critic($match, $_GET['id'], $con) . "/5. ".$chosenStar."<br />";
						} else {
							$match_ratings[] = $match . " (" . round((5 - $matches[$match])*20) . "% similar to you) hasn't rated this movie. <br />";
						}
					}

					?>
					
					var match_ratings = <?php echo json_encode($match_ratings); ?>;

					if (match_ratings.length < 5 || match_ratings === undefined || match_ratings === null) {
						document.write("Rate more movies to find some similar critics.");
					} else {
						for (var i = 0; i < match_ratings.length; i++) {
							document.write(match_ratings[i]);
						}
					}
				</script>
			</div>
		</div>
	</div>

	<div class="col-md-8 col-md-offset-1">
		<div class="row">
			<div class="well">
				<h4>Other similar critics:</h4>
				<br />
				<script type="text/javascript">
					/*var top_matches = <?php echo json_encode(get_top_matches(1, 3)); ?>;
					if (top_matches.length < 1) {
						document.write("Rate more movies");
					} else {
						var match;
						for (var i = 0; i < 3; i++) {
							document.write(top_matches[i]);
						}
					}*/
				</script>
			</div>
		</div>
	</div>
</div>
<br /><br />
<?php require_once("includes/footer.php"); ?>

</body>
</html>