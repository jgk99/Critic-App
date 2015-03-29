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
			Imagine it's a saturday, you and some friends want to get together and watch a movie. It's all great until you can't decide what movie you want to see. Someone suggests a movie and you're all excited, but you go on a website like rotten tomatoes and see that it has a terrible score. You don't know why it's bad, but you just assume it is because of the low score. You might want to see it anyways, but your friends are scared off by the low score, and rightly so. Maybe you would have all loved the movie despite what the score says, but there's always a chance that you just wasted two hours that you'll never get back.</p> <p>

			Society has come up with some ways to partially get around this problem though. Critics can provide a better view into movies, and more in depth reviews past a score. But this again poses its own problem: Critics are people, and people have opinions. Do their opinions match yours?</p> <p>

			The answer lies in our website, My Movie Critic. My Movie Critic eliminates the problem of which critic to believe. First our website has you rate a few movies that you have already seen so that we can better get to know you and your taste in movies. When you look up movies from then on, you can see reviews of critics who have similar tastes to you, greatly increasing your chance of a positive movie watching experience.
		</p>
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
					$match_ratings[] = $match . "<br />";
				}
			} else {
				$rate_more_movies = true;
				echo '.' . count($matches) . '.';
			}
		} else {
			$rate_more_movies = true;
		}

		echo '<script type ="text/javascript">
				if ("' . $rate_more_movies . '" == "1") {
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