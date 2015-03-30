<?php require_once("includes/forcessl.php"); 
require_once("includes/similarity_algorithm.php");
require_once("includes/dbfuncs.php");

if (isset($_SESSION["id"])) {
$signedIn="true";
}
else{
	$signedIn="false";
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
	

	<div class="col-md-8">
		<h2> Our Mission</h2>
		<p>
			Imagine it's a Saturday, you and some friends want to go to the movies. Everything’s fine until you can't decide what movie to see. One friend suggests a particular movie that looks awesome: the preview was epic and the special effects look incredible. But you then go on rotten tomatoes and see a terrible score. The other movie playing at the theater was given a great review, but the preview was unimpressive. You decide to see the movie with the better review but you hate it. A few weeks later when the other movie that you originally wanted to see is on Netflix, you see it and love it. You wish that you had spent your time and money to see that movie on the IMAX screen, rather than the other one. This leads many people to disregard critics entirely. We believe that our site <strong>mymoviecritic.com</strong> is the answer to this problem.
</p><p>
<strong>My Movie Critic</strong> eliminates the problem of relying on one critic or the critic consensus in the case of popular services like Rotten Tomatoes. We accomplish this task by asking you to rate movies that you have already seen so we get a feel for your personality. Then when we have enough information about your movie tastes, we match you up with five critics in our database with views most similar to yours. Then you can look up any movie and see what your personal movie critic says about it. We are confident that My Movie Critic will improve the experience of moviegoers throughout the world.</p>
	</div>


			
	
<br /><br /><br />
	<div class="well lead col-md-4 text-center">
	<?php

	if($signedIn == "false") {
		echo
		"
		<p>If you don't have an account you should sign up here now.</p>
			<a href='signup.php' class='btn btn-default'>Sign Up</a><br /><br />
			<p>If you have an account <a href='signin.php'>sign in</a> and search the movies that you are curious about in the search bar above. Your critic will tell you everything that you want to know.</p>
		</div>";
	}
	else {
		$con = dbconnect();
		$matches = get_top_matches($_SESSION['id'], 5);
		$rate_more_movies = false;
		$match_ratings = array();
		if ($matches !== false) {
			if (count($matches) === 5) {
				foreach (array_keys($matches) as $match) {
					$rating = get_rating_from_critic($match, $_GET['id'], $con);
					$link = get_critic_link($match, $con);
					if ($link !== false) {
						$match_ratings[] = "<a href=\"" . $link . "\">" . $match . "</a><br />";
					} else {
						$match_ratings[] = $match . "<br />";
					}
				}
			} else {
				$rate_more_movies = true;
			}
		} else {
			$rate_more_movies = true;
		}

		echo '<script type ="text/javascript">
				if ("'.$rate_more_movies.'" == "1") {
					document.write("Rate more movies to find some similar critics.<br /><br /><br /><br /><br /><br /><br /><br />");
				} else {
					document.write("<h2>Your Top Critics:</h2>");
					var match_ratings = ' . json_encode($match_ratings) . ';
					for (var i = 0; i < match_ratings.length; i++) {
						document.write(match_ratings[i]);
					}
				}
			</script>';
	}

	?>
</div>
<br/>

<?php require_once("includes/footer.php"); ?>

</body>
</html>