<?php

$username="";
$password="";
$username_blank="";
$password_blank="";
$username_set="0";
$password_set="0";

if((isset($_POST['submit']))) {
	$username=$_POST["username"];
	$password=$_POST["password"];

	if(!isset($username) || $username === "") {
		$username_blank .= "Username is required";
		$username_set="1";
	}

    if(!isset($password) || $password === "") {
		$password_blank .= "Password is required";
		$password_set="1";
	}

    if($password_set=="0" && $username_set=="0") {
		echo "$username" . "$password";
		//It will actually use the database
	}
}

?>






<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">

<html lang="en">
<head><title>My Film Critic</title>

<link rel="stylesheet" type="text/css" href="style.css">
<style>
header {  text-align:center; }
ul { list-style-type:none; }
li { display:inline; padding:8px; font-size:20px; bold;}

body { background-color:#ECECE4;   font-family:Cambria; font-size:20px; margin:0;}
nav { text-align:center; border:5px solid black;}
article { background-image:URL(hey.png); text-align:center; width:1000px; float:left; border:0px solid grey; float: left; }
.article2 { background-image:URL(hey.png); text-align:center; width:1000px; float:left; border:0px solid grey; float: left; } 


aside { background-image:URL(hey.png); float:left; width:00px; padding: 10px; }
footer { clear:left; text-align:center; background-color:#000; color:#fff; font-size:small;  padding: 20px;  }

a:link { color:#FF9933;  font-family:Cambria; text-decoration:none; }
a:visited { color:#FF9933; font-family:Cambria; text-decoration:none; }
a:hover { color:black; font-family:Cambria; text-decoration:none }
a:active { color:black;  font-family:Cambria; text-decoration:none  }

.container { background-image:URL(hey.png); width:1000px; margin:0 auto; border:0px solid grey;}
.article-menu { background-image:URL(hey.png); text-align:center; width:1000px; float:left; border:0px solid grey; float: left; } 
.colorblack { color:black }

p { margin:20px; }






</style>


	
</head>
<body>

<div class="container">

 
  <header>


 <h1>My Film Critic</h1>
</header>
<nav>
<ul>
<li><a href="index.php">HOME</a> </li>
<li><a href="books.html">MOVIES<a> </li>

<li><a href="bio.html">CRITICS</a> </li>
<li><a href="bio.html">MY ACCOUNT</a> </li>

</ul>
</nav>
<article>
<h2> Sign In Here</h2>

<form action="signin.php" method="post">
			

		

		<form action="signin.php" method="post">

			Username: <input type="text" name="username" value="<?php echo $username; ?>" /><font color=red><?php echo $username_blank;?></font><br /><br /><br />
			Password: <input type="password" name="password" value="<?php echo $password; ?>" /><font color=red><?php echo $password_blank;?></font><br /><br /><br />
			<input type="submit" name="submit" value="Submit" />
		</form>
		<br /><br /><br />
		If you don't have an account click <a href="signup.php">here</a><br /><br /><br />
</div>

<?php require_once("footer.php"); ?>

</body>
</html>