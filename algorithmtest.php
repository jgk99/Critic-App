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
		
		require_once("similarity_algorithm.php");

		$similarities = get_similarities(1);
		foreach ($similarities as $critic => $similarity) { 
			echo $critic . "'s average difference from user with ID 1: " . $similarity;
			echo "<br />";
		}

		?>
	</article>
</div>

<?php require_once("includes/footer.php"); ?>

</body>
</html>