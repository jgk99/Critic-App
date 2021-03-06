<?php

require_once 'dbfuncs.php';
require_once 'unirest-php/src/Unirest.php';

// Returns an associative array with each key being the name of a critic and each value being the similarity.
// The similarity is simply the average difference in ratings between the user and critic.
function get_similarities($userID) {
	$min_common_reviews = 3;

	$similarities = array();

	$con = dbconnect();
	$user_ratings_query = "SELECT `MovieID`, `Rating` FROM `userreviews` WHERE `UserID` = '" . $userID . "' ORDER BY `MovieID` ASC";
	$user_ratings_sql = $con->query($user_ratings_query);

	$user_ratings = array();
	while ($row = mysqli_fetch_assoc($user_ratings_sql)) {
		$user_ratings[] = array($row["MovieID"], $row["Rating"]);
		$user_rated_movies[] = $row["MovieID"];
	}

	if (!empty($user_rated_movies)) {
		$critic_ratings_query = "SELECT * FROM `criticreviews` WHERE `MovieID` IN (" . implode(', ', $user_rated_movies) . ") ORDER BY `Name` ASC";
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
			foreach ($critic as $rating) {
				$search_key = array_search($rating[1], $user_rated_movies);
				if ($search_key !== false) {
					$total += abs($user_ratings[$search_key][1] - $rating[2]);
				}
				$count++;
			}
			$similarities[$critic[0][0]] = $total/$count;
		}

		return $similarities;
	} else {
		return false;
	}
}

function get_top_matches($userID, $quantity) {
	$similarities = get_similarities($userID);
	if ($similarities !== false) {
		asort($similarities);
		return array_slice($similarities, 0, $quantity);
	} else {
		return false;
	}
}

function get_rating_from_critic($critic_name, $movie_id, $con) {
	$query = "SELECT `Rating` FROM `criticreviews` WHERE `Name` = '" . $critic_name . "' AND `MovieID` = '" . $movie_id . "'";
	$query_sql = $con->query($query);

	$exists = false;
	$rating = 0;
	if ($row = mysqli_fetch_assoc($query_sql)) {
		$exists = true;
		$rating = $row["Rating"];
	}

	if ($exists) {
		return $rating;
	} else {
		return false;
	}
}

function store_critic_ratings($movieID) {
	$removeable_characters = array(":", ",", ".", ";", "/", "&", "'", "\"");

	$omdb_movie_json = file_get_contents('http://www.omdbapi.com/?i=tt' . $movieID . '&plot=short&r=json');
	$omdb_movie = json_decode($omdb_movie_json);
	$movie_title = $omdb_movie->{'Title'};
	$movie_title = strtolower($movie_title);

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
		$con = dbconnect();

		$result = $response->body->result;
		
		foreach ($result as $rating) {
			if (isset($rating->author)) {
				$author = $con->real_escape_string($rating->author);
				$check_query = "SELECT * FROM `criticreviews` WHERE `Name` = '" . $author . "' AND `MovieID` = '" . $movieID . "'";
				$check_query_sql = $con->query($check_query);

				$exists = false;
				while ($row = mysqli_fetch_assoc($check_query_sql)) {
					$exists = true;
				}

				if ($exists === false) {
					$link = str_replace($removeable_characters, "", $rating->author);
					$link = preg_replace("/ {2,}/", " ", $link);
					$link = str_replace(" ", "-", $link);
					$link = strtr(utf8_decode($link), utf8_decode('àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ'), 'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
					$link = strtolower($link);
					$add_query = "INSERT INTO `criticreviews` (`Name`, `Link`, `MovieID`, `Rating`) VALUES ('" . $author . "', '$link', '$movieID', '" . $rating->score/20 . "')";
					if (!$con->query($add_query)) {
						throw new Exception("Query failed with error: $con->sqlstate");
					}
				}
			}
		}

		$con->close();
	}
}

function store_user_ratings($userid, $movieid, $userrating) {
	$userrating = $userrating ;
	$con = dbconnect();
	$rating_insert = "INSERT INTO `userreviews` (`UserID`, `MovieID`, `Rating`) VALUES ('$userid', '$movieid', '$userrating')";
	if (!$con->query($rating_insert)) {
		throw new Exception("Query failed with error: $con->sqlstate");
	}
}

function get_critic_link($critic_name, $con) {
	$query = "SELECT `Link` FROM `criticreviews` WHERE `Name` = '" . $critic_name . "' LIMIT 1";
	$query_sql = $con->query($query);

	$exists = false;
	$link = 0;
	if ($row = mysqli_fetch_assoc($query_sql)) {
		$exists = true;
		$link = $row["Link"];
		$link = "http://www.metacritic.com/critic/" . $link;
	}

	if ($exists) {
		return $link;
	} else {
		return false;
	}
}

?>