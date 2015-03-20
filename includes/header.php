<?php

echo'
	<br />
	<header>
		<h1>My Movie Critic</h1>
	</header>
	<nav>
		<ul>
			<li><a href="index.php">HOME</a></li>
			<li><a href="movies.php">MOVIES<a></li>
			<li><a href="bio.html">CRITICS</a></li>
			<li><a href="bio.html">MY ACCOUNT</a></li>
		</ul>
	</nav>
	<form action="search.php" method="post">
                                <input type="text" placeholder="Search..." required>
                                <input type="submit" value="Search">
	</form>
	<br />
'
	
?>