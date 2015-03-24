<?php

include 'dbfuncs.php';

// Returns an associative array with each key being the name of a critic and each value being the similarity.
// The similarity is simply the average difference in ratings between the user and critic.
function get_similarities($userID) {
	$min_common_reviews = 10;

	$similarities = array();

	$con = dbconnect();
	$user_ratings_query = "SELECT `MovieID`, `Rating` FROM `userreviews` WHERE `UserID` = '" . $userID . "' ORDER BY `MovieID` ASC";
	$user_ratings_sql = $con->query($user_ratings_query);

	$user_ratings = array();
	while ($row = mysqli_fetch_assoc($user_ratings_sql)) {
		$user_ratings[] = array($row["MovieID"], $row["Rating"]);
		$user_rated_movies[] = $row["MovieID"];
	}

	$critic_ratings_query = "SELECT * FROM `criticreviews` WHERE `MovieID` IN (" . implode(', ', $user_rated_movies) . ")";
	$critic_ratings_sql = $con->query($critic_ratings_query);

	$critic_ratings = array();
	$count = 0;
	$previous_row;
	while ($row = mysqli_fetch_assoc($critic_ratings_sql)) {
		if ($count !== 0) {
			if ($previous_row["Name"] === $row["Name"]) {
				array_push($critic_ratings[count($critic_ratings) - 1], array($row["Name"], $row["MovieID"], $row["Rating"]));
			} else {
				$critic_ratings[] = array();
				array_push($critic_ratings[count($critic_ratings) - 1], array($row["Name"], $row["MovieID"], $row["Rating"]));
			}
		} else {
			$critic_ratings[] = array();
			array_push($critic_ratings[count($critic_ratings) - 1], array($row["Name"], $row["MovieID"], $row["Rating"]));
		}
		$count++;
		$previous_row = $row;
	}

	foreach ($critic_ratings as $key => $critic) {
		if (count($critic) < $min_common_reviews) {
			unset($critic_ratings[$key]);
		}
	}

	foreach ($critic_ratings as $key => $critic) {
		$count = 0;
		$total = 0;
		foreach($critic as $rating) {
			$search_key = array_search($rating[1], $user_rated_movies);
			if ($search_key !== false) {
				$total += abs($user_ratings[$search_key][1] - $rating[2]);
			}
			$count++;
		}
		$similarities[$critic[0][0]] = $total/$count;
	}

	return $similarities;
}

function store_critic_ratings($movieID) {
	$omdb_movie_json = file_get_contents('http://www.omdbapi.com/?i=tt' . $movieID . '&plot=short&r=json');
	$omdb_movie = json_decode($omdb_movie_json);
	$movie_title = $omdb_movie->{'Title'};
	$movie_title = strtolower($movie_title);

	$removeable_characters = array(":", ",", ".", ";", "/", "&");
	$movie_title = str_replace($removeable_characters, "", $movie_title);
	$movie_title = preg_replace("/ {2,}/", " ", $movie_title);
	$movie_title = str_replace(" ", "-", $movie_title);
	$movie_title = strtr(utf8_decode($movie_title), utf8_decode('àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ'), 'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');

	$response = Unirest\Request::get("https://byroredux-metacritic.p.mashape.com/reviews?url=http%3A%2F%2Fwww.metacritic.com%2Fmovie%2F" . $movie_title,
		array(
			"X-Mashape-Key" => "pyIe8fZfCxmshRbh8S0w2DBUVtUop1I4YA8jsncmelO8wbRw5U",
			"Accept" => "application/json"
		)
	);

	// Only if the request is successful.
	if ($response->code === 200) {
		//print_r($response);
		$result = $response->body;
		
		foreach ($result as $rating) {
			echo $rating->author . ": " . $rating->score . "<br />";
		}
	}
}

function get_top_matches($userID, $quantity) {
	$similarities=get_similarities($userID);
	asort($similarities);
	$criticNames = array_keys($similarities);
	return array_slice($criticNames, 0, $quantity);
}

?>