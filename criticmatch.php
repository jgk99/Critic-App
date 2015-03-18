<?php
require_once 'unirest-php/src/Unirest.php';

//User-Critic Matching Algorithm

$response = Unirest\Request::post("https://byroredux-metacritic.p.mashape.com/find/movie",
  array(
    "X-Mashape-Key" => "Bxptd9gPaymshZ9LH7uY2rs79K17p1Md69rjsnvkFTaX4DLx4L",
    "Content-Type" => "application/x-www-form-urlencoded",
    "Accept" => "application/json"
  ),
  array(
    "retry" => 4,
    "title" => "Fast & Furious 6"
  )
);


?>

<!DOCTYPE html>

<html>
<head>
	<title>My Film Critic</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="UTF-8">
</head>
<body>

<div class="container">
	<?php require_once("includes/header.php"); ?>
	<article>
		<p>Here are some reviewers that may interest you:</p>
	<article>
</div>

<?php require_once("includes/footer.php"); ?>

</body>
</html>