<?php

			$box_office = file_get_contents('http://api.rottentomatoes.com/api/public/v1.0/lists/movies/box_office.json?apikey=nqr68qe538tc2hsub2c5fubt');
			$movielist = json_decode($box_office);
			$total = $movielist->movies;

			//for( )

?>

<!DOCTYPE html>

<html>
<head>
	<title>My Movie Critic</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<meta charset="UTF-8">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
</head>
<body>

<div class="container">
	<?php require_once("includes/header.php"); ?>
	<div class="jumbotron">
  		<h2>Welcome To My Movie Critic</h2>
  		<p>To learn more about our service please visit our Mission page.</p>
  		<p><a class="btn btn-primary btn-lg" href="/" role="button">Learn more</a></p>
	</div>
<div class="row">
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="..." alt="...">
      <div class="caption">
        <h3>Thumbnail label</h3>
        <p>...</p>
        <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
      </div>
    </div>
  </div>
<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="..." alt="...">
      <div class="caption">
        <h3>Thumbnail label</h3>
        <p>...</p>
        <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
      </div>
    </div>
  </div>
</div>
</div>

<?php require_once("includes/footer.php"); ?>

</body>
</html>