<?php

session_start();

function redirect_to($new_location) {
	header("Location: " . $new_location);
	exit;
}

if(!isset($_SESSION["in"])) {
	redirect_to("signup.php");
}

$name = $_SESSION["name"];
$username = $_SESSION["username"];
$password = $_SESSION["password"];
$email = $_SESSION["email"];

session_destroy();

echo "$name" . "$username" . "$email" . "$password";

// if All questions answered open the database and add the user

?>

<!DOCTYPE html>

<html>
<head>
	<title>My Movie Critic</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="UTF-8">
</head>
<body>

<div class="container">
	<?php require_once("includes/header.php"); ?>
	<article>
		<form action="questions.php" method="post">
			<h3>Rate these movies so we can pair you up with your personal movie critic.</h3>
			<br />
			<table width="600" align="center">
				<tr>
					<td width="194" align="center"><h4 class="movie-title">Avatar</h4><br />
						<img src="images/movie_posters/avatar.jpg" alt="Avatar Movie Poster" />
					</td>
					<td width="500" align="center">
						<input type="radio" name="avatar" value="likeit">Like it	 
						<input type="radio" name="avatar" value="dislikeit">Dislike it
						<input type="radio" name="avatar" value="impartial">Impartial	 
						<input type="radio" name="avatar" value="impartial">Haven't seen it
					</td>
				</tr>
				<tr>
					<td width="194" align="center"><h4 class="movie-title">Interstellar</h4><br />
						<img src="images/movie_posters/interstellar.jpg" alt="Interstellar Movie Poster" />
					</td>
					<td width="500" align="center">
						<input type="radio" name="interstellar" value="likeit">Like it	 
						<input type="radio" name="interstellar" value="dislikeit">Dislike it
						<input type="radio" name="interstellar" value="impartial">Impartial	 
						<input type="radio" name="interstellar" value="impartial">Haven't seen it
					</td>
				</tr>
				<tr>
					<td width="194" align="center"><h4 class="movie-title">Men in Black</h4><br />
						<img src="images/movie_posters/men_in_black.jpg" alt="Men in Black Movie Poster" />
					</td>
					<td width="500" align="center">
						<input type="radio" name="men_in_black" value="likeit">Like it	 
						<input type="radio" name="men_in_black" value="dislikeit">Dislike it
						<input type="radio" name="men_in_black" value="impartial">Impartial	 
						<input type="radio" name="men_in_black" value="impartial">Haven't seen it
					</td>
				</tr>
				<tr>
					<td width="194" align="center"><h4 class="movie-title">The Notebook</h4><br />
						<img src="images/movie_posters/the_notebook.jpg" alt="The Notebook Movie Poster" />
					</td>
					<td width="500" align="center">
						<input type="radio" name="the_notebook" value="likeit">Like it	 
						<input type="radio" name="the_notebook" value="dislikeit">Dislike it
						<input type="radio" name="the_notebook" value="impartial">Impartial	 
						<input type="radio" name="the_notebook" value="impartial">Haven't seen it
					</td>
				</tr>
				<tr>
					<td width="194" align="center"><h4 class="movie-title">21 Jump Street</h4><br />
						<img src="images/movie_posters/21_jump_street.jpg" alt="21 Jump Street Movie Poster" />
					</td>
					<td width="500" align="center">
						<input type="radio" name="21_jump_street" value="likeit">Like it	 
						<input type="radio" name="21_jump_street" value="dislikeit">Dislike it
						<input type="radio" name="21_jump_street" value="impartial">Impartial	 
						<input type="radio" name="21_jump_street" value="impartial">Haven't seen it
					</td>
				</tr>
				<tr>
					<td width="194" align="center"><h4 class="movie-title">The Hangover</h4><br />
						<img src="images/movie_posters/the_hangover.jpg" alt="The Hangover Movie Poster" />
					</td>
					<td width="500" align="center">
						<input type="radio" name="the_hangover" value="likeit">Like it	 
						<input type="radio" name="the_hangover" value="dislikeit">Dislike it
						<input type="radio" name="the_hangover" value="impartial">Impartial	 
						<input type="radio" name="the_hangover" value="impartial">Haven't seen it
					</td>
				</tr>
				<tr>
					<td width="194" align="center"><h4 class="movie-title">Exorcist: The Beginning</h4><br />
						<img src="images/movie_posters/exorcist_the_beginning.jpg" alt="Exorcist: The Beginning Movie Poster" />
					</td>
					<td width="500" align="center">
						<input type="radio" name="exorcist_the_beginning" value="likeit">Like it	 
						<input type="radio" name="exorcist_the_beginning" value="dislikeit">Dislike it
						<input type="radio" name="exorcist_the_beginning" value="impartial">Impartial	 
						<input type="radio" name="exorcist_the_beginning" value="impartial">Haven't seen it
					</td>
				</tr>
				<tr>
					<td width="194" align="center"><h4 class="movie-title">Lincoln</h4><br />
						<img src="images/movie_posters/lincoln.jpg" alt="Lincoln Movie Poster" />
					</td>
					<td width="500" align="center">
						<input type="radio" name="lincoln" value="likeit">Like it	 
						<input type="radio" name="lincoln" value="dislikeit">Dislike it
						<input type="radio" name="lincoln" value="impartial">Impartial	 
						<input type="radio" name="lincoln" value="impartial">Haven't seen it
					</td>
				</tr>
			</table>
			<input type="submit" name="submit" value="submit" />
		</form>
	<article>
<!-- end .container --> </div>

<?php require_once("includes/footer.php"); ?>

</body>
</html>