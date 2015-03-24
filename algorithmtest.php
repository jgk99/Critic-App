<!DOCTYPE html>

<html>
<head>
	<title>My Movie Critic</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="UTF-8">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
</head>
<body>

<div class="container">
	<?php require_once("includes/header.php"); ?>

	<article>
		<?php
		
		require_once("includes/similarity_algorithm.php");

		/*$similarities = get_similarities(1);
		foreach ($similarities as $critic => $similarity) { 
			echo $critic . "'s average difference from user with ID 1: " . $similarity;
			echo "<br />";
		}*/

		/*$similarities = array(
			"Roger Ebert" => "3.5",
			"John Critic" => "1",
			"Jerry Critic" => "4",
			"Albert Critic" => "2.5"
		);

		storeCritics(1, $similarities);*/

		store_critic_ratings("1375666");

		?>
	</article>
</div>

<?php require_once("includes/footer.php"); ?>

</body>
</html> 