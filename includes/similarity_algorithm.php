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

function get_top_matches($userID, $quantity) {
	$similarities=get_similarities($userID);
	asort($similarities);
	$criticNames = array_keys($similarities);
	return array_slice($criticNames, 0, $quantity);
}

?>