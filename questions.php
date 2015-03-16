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
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
	<script type="text/javascript" src="js/ratings.js"></script>
</head>
<body>

<div class="container">
	<?php require_once("includes/header.php"); ?>
	<article>
		<form action="questions.php" method="post">
			<h3>Rate these movies so we can pair you up with your personal movie critic.</h3>
			<br />
			<table width="300" align="center">
				<tr>
					<td width="100" align="center"><h4 class="movie-title">Avatar</h4><br />
						<img src="images/movie_posters/avatar.jpg" alt="Avatar Movie Poster" class="movie-poster" />
					</td>
					<td align="center">
						<div class="rating">
							<span class="avatar"><input type="radio" name="avatar" id="avatar5" value="5"><label for="avatar5"></label></span>
							<span class="avatar"><input type="radio" name="avatar" id="avatar4" value="4"><label for="avatar4"></label></span>
							<span class="avatar"><input type="radio" name="avatar" id="avatar3" value="3"><label for="avatar3"></label></span>
							<span class="avatar"><input type="radio" name="avatar" id="avatar2" value="2"><label for="avatar2"></label></span>
							<span class="avatar"><input type="radio" name="avatar" id="avatar1" value="1"><label for="avatar1"></label></span>
						</div>
					</td>
				</tr>
				<tr>
					<td width="100" align="center"><h4 class="movie-title">Interstellar</h4><br />
						<img src="images/movie_posters/interstellar.jpg" alt="Interstellar Movie Poster" class="movie-poster" />
					</td>
					<td align="center">
						<div class="rating">
							<span class="interstellar"><input type="radio" name="interstellar" id="interstellar5" value="5"><label for="interstellar5"></label></span>
							<span class="interstellar"><input type="radio" name="interstellar" id="interstellar4" value="4"><label for="interstellar4"></label></span>
							<span class="interstellar"><input type="radio" name="interstellar" id="interstellar3" value="3"><label for="interstellar3"></label></span>
							<span class="interstellar"><input type="radio" name="interstellar" id="interstellar2" value="2"><label for="interstellar2"></label></span>
							<span class="interstellar"><input type="radio" name="interstellar" id="interstellar1" value="1"><label for="interstellar1"></label></span>
						</div>
					</td>
				</tr>
				<tr>
					<td width="100" align="center"><h4 class="movie-title">Men in Black</h4><br />
						<img src="images/movie_posters/men_in_black.jpg" alt="Men in Black Movie Poster" class="movie-poster" />
					</td>
					<td align="center">
						<div class="rating">
							<span class="men_in_black"><input type="radio" name="men_in_black" id="men_in_black5" value="5"><label for="men_in_black5"></label></span>
							<span class="men_in_black"><input type="radio" name="men_in_black" id="men_in_black4" value="4"><label for="men_in_black4"></label></span>
							<span class="men_in_black"><input type="radio" name="men_in_black" id="men_in_black3" value="3"><label for="men_in_black3"></label></span>
							<span class="men_in_black"><input type="radio" name="men_in_black" id="men_in_black2" value="2"><label for="men_in_black2"></label></span>
							<span class="men_in_black"><input type="radio" name="men_in_black" id="men_in_black1" value="1"><label for="men_in_black1"></label></span>
						</div>
					</td>
				</tr>
				<tr>
					<td width="100" align="center"><h4 class="movie-title">The Notebook</h4><br />
						<img src="images/movie_posters/the_notebook.jpg" alt="The Notebook Movie Poster" class="movie-poster" />
					</td>
					<td align="center">
						<div class="rating">
							<span class="the_notebook"><input type="radio" name="the_notebook" id="the_notebook5" value="5"><label for="the_notebook5"></label></span>
							<span class="the_notebook"><input type="radio" name="the_notebook" id="the_notebook4" value="4"><label for="the_notebook4"></label></span>
							<span class="the_notebook"><input type="radio" name="the_notebook" id="the_notebook3" value="3"><label for="the_notebook3"></label></span>
							<span class="the_notebook"><input type="radio" name="the_notebook" id="the_notebook2" value="2"><label for="the_notebook2"></label></span>
							<span class="the_notebook"><input type="radio" name="the_notebook" id="the_notebook1" value="1"><label for="the_notebook1"></label></span>
						</div>
					</td>
				</tr>
				<tr>
					<td width="100" align="center"><h4 class="movie-title">21 Jump Street</h4><br />
						<img src="images/movie_posters/21_jump_street.jpg" alt="21 Jump Street Movie Poster" class="movie-poster" />
					</td>
					<td align="center">
						<div class="rating">
							<span class="21_jump_street"><input type="radio" name="21_jump_street" id="21_jump_street5" value="5"><label for="21_jump_street5"></label></span>
							<span class="21_jump_street"><input type="radio" name="21_jump_street" id="21_jump_street4" value="4"><label for="21_jump_street4"></label></span>
							<span class="21_jump_street"><input type="radio" name="21_jump_street" id="21_jump_street3" value="3"><label for="21_jump_street3"></label></span>
							<span class="21_jump_street"><input type="radio" name="21_jump_street" id="21_jump_street2" value="2"><label for="21_jump_street2"></label></span>
							<span class="21_jump_street"><input type="radio" name="21_jump_street" id="21_jump_street1" value="1"><label for="21_jump_street1"></label></span>
						</div>
					</td>
				</tr>
				<tr>
					<td width="100" align="center"><h4 class="movie-title">The Hangover</h4><br />
						<img src="images/movie_posters/the_hangover.jpg" alt="The Hangover Movie Poster" class="movie-poster" />
					</td>
					<td align="center">
						<div class="rating">
							<span class="the_hangover"><input type="radio" name="the_hangover" id="the_hangover5" value="5"><label for="the_hangover5"></label></span>
							<span class="the_hangover"><input type="radio" name="the_hangover" id="the_hangover4" value="4"><label for="the_hangover4"></label></span>
							<span class="the_hangover"><input type="radio" name="the_hangover" id="the_hangover3" value="3"><label for="the_hangover3"></label></span>
							<span class="the_hangover"><input type="radio" name="the_hangover" id="the_hangover2" value="2"><label for="the_hangover2"></label></span>
							<span class="the_hangover"><input type="radio" name="the_hangover" id="the_hangover1" value="1"><label for="the_hangover1"></label></span>
						</div>
					</td>
				</tr>
				<tr>
					<td width="100" align="center"><h4 class="movie-title">Exorcist: The Beginning</h4><br />
						<img src="images/movie_posters/exorcist_the_beginning.jpg" alt="Exorcist: The Beginning Movie Poster" class="movie-poster" />
					</td>
					<td align="center">
						<div class="rating">
							<span class="exorcist_the_beginning"><input type="radio" name="exorcist_the_beginning" id="exorcist_the_beginning5" value="5"><label for="exorcist_the_beginning5"></label></span>
							<span class="exorcist_the_beginning"><input type="radio" name="exorcist_the_beginning" id="exorcist_the_beginning4" value="4"><label for="exorcist_the_beginning4"></label></span>
							<span class="exorcist_the_beginning"><input type="radio" name="exorcist_the_beginning" id="exorcist_the_beginning3" value="3"><label for="exorcist_the_beginning3"></label></span>
							<span class="exorcist_the_beginning"><input type="radio" name="exorcist_the_beginning" id="exorcist_the_beginning2" value="2"><label for="exorcist_the_beginning2"></label></span>
							<span class="exorcist_the_beginning"><input type="radio" name="exorcist_the_beginning" id="exorcist_the_beginning1" value="1"><label for="exorcist_the_beginning1"></label></span>
						</div>
					</td>
				</tr>
				<tr>
					<td width="100" align="center"><h4 class="movie-title">Lincoln</h4><br />
						<img src="images/movie_posters/lincoln.jpg" alt="Lincoln Movie Poster" class="movie-poster" />
					</td>
					<td align="center">
						<div class="rating">
							<span class="lincoln"><input type="radio" name="lincoln" id="lincoln5" value="5"><label for="lincoln5"></label></span>
							<span class="lincoln"><input type="radio" name="lincoln" id="lincoln4" value="4"><label for="lincoln4"></label></span>
							<span class="lincoln"><input type="radio" name="lincoln" id="lincoln3" value="3"><label for="lincoln3"></label></span>
							<span class="lincoln"><input type="radio" name="lincoln" id="lincoln2" value="2"><label for="lincoln2"></label></span>
							<span class="lincoln"><input type="radio" name="lincoln" id="lincoln1" value="1"><label for="lincoln1"></label></span>
						</div>
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