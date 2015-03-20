<?php


?>

<!DOCTYPE html>

<html>
<head>
	<title>My Film Critic</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="UTF-8">
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	<script>
function happy () {
  var flickerAPI = "http://api.flickr.com/services/feeds/photos_public.gne?jsoncallback=?";
  $.getJSON( flickerAPI, {
    tags: "mount rainier",
    tagmode: "any",
    format: "json"
  })
    .done(function( data ) {
      $.each( data.items, function( i, item ) {
        $( "<img>" ).attr( "src", item.media.m ).appendTo( "#images" );
        return "Hello";
        if ( i === 3 ) {
          return false;
        }
      });
    });
};
</script>
</head>
<body>

<div class="container">
	<?php require_once("includes/header.php"); ?>
	<article>
		<h2>Movie Detail</h2>
		<br />
 <div class = "moviedetail"></div>
		<br />
		<p>If you don't have an account click <a href="signup.php">here</a></p>
		<br />
	</article>
</div>

<?php require_once("includes/footer.php"); ?>

</body>
</html>