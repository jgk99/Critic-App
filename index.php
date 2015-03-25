<?php require_once("includes/forcessl.php"); ?>

<!DOCTYPE html>

<html>
<head>
	<title>My Movie Critic</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<meta charset="UTF-8">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
	
	<?php require_once("includes/header.php"); ?> 

	<div class="col-md-8">
		<h2> Our Mission</h2>
		<p>
			Let's say it's a saturday, you're with your pals and you got all day to do whatever you want. So someone comes up with the idea to see a movie. Then, you remember there is a movie you want to see, maybe it starred Liam Neeson or maybe it didn't. You then suggest that movie and everyone is on board. However, one of your pals decides to look up it's score on rotten tomatoes. There is that dreaded moment when the movie's score is a 60. You don't know why it's bad, you just assume it is because of it's low score. You love Liam Neeson and all of his movies. Now, no one wants to see the movie.   That's where we come in. <br /> People go to movies to relax and enjoy themselves so that they can be distracted from the real world. Movies are one of the greatest things on earth, but there is one problem with them; <strong>it is extremely hard to choose which movie to watch</strong>, if you choose a good one you are plainly lucky, and if you choose a bad one you just wasted 2 hours of your short life.</p> <p>

			Society does have some ways to partially get around this problem though. People read what critics say about the movie online before they watch it. This allows people to be able to tell when there is a great movie that everyone loves and be able to tell when there is horrible movie that everyone hates. The problem is that people have different opinions and one person may hate a movie that another person loves and vice versa. That leaves conflicting reviews from the critics,<strong> how will you know which critic to believe?</strong> </p> <p>

			The answer lies in <strong>My Movie Critic</strong>. We have created a website, which eliminates the problem of which critic to believe. First we have the you rate a few movies that you have already seen so we get a feel for your personality. Then when we have enough information about your movie tastes we match you up with your movie critic, the critic with the most similar tastes to you. Then you can look up any movie and see what your personal movie critic says. Odds are that your critic will have the same views as you and your critic will make sure that you are only seeing movies that you personally like.
		</p>
	</div>
	<br /><br /><br />	

	<div class="well lead col-md-4 text-center">
		<p>If you don't have an account you should sign up here now.</p>
		<a href="signup.php"  class="btn btn-default">Sign Up</a> <br /><br />
		<p>If you have an account <a href="signin.php">login</a> and search the movies that you are curious about in the search bar above. Your critic will tell you everything that you want to know.</p>
	</div>


</div>
<br/>

<?php require_once("includes/footer.php"); ?>

</body>
</html>