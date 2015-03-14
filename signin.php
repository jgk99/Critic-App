<?php
$username="";
$password="";
$username_blank="";
$password_blank="";
$username_set="0";
$password_set="0";

if((isset($_POST['submit']))){
    $username=$_POST["username"];
    $password=$_POST["password"];

    if(!isset($username) || $username === "")    {
        $name_blank .= "Username is required";
        $username_set="1";
    }
    if(!isset($password) || $password === "")    {
        $password_blank .= "Password is required";
        $password_set="1";
    }

if($password_set=="0" && $username_set=="0")    {
}

}

?>




<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">

<html lang="en">
<head><title>Your Personal Movie Critic</title>

<link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>


<div class="container">
 
  <header>


 <h1>The Movie Critic</h1>
</header>
<nav>
<ul>
<li><a href="index.php">HOME</a> </li>
<li><a href="books.html">MOVIES<a> </li>

<li><a href="bio.html">CRITICS</a> </li>

</ul>
</nav>
<article>
<h2> Sign In Here</h2>

<form action="signup.php" method="post">
			
			Username: <input type="text" name="username" value="<?php echo $username; ?>" /><font color=red><?php echo $username_blank;?></font><br /><br /><br />
			Password: <input type="password" name="password" value="<?php echo $password; ?>" /><font color=red><?php echo $password_blank;?></font><br /><br /><br />
		
			<input type="submit" name="submit" value="Submit" />
		</form> <br /><br /><br />

<article>
</div>


<footer>
Designed By:<br />
Jonathan Kogan
<br />
Jonathan Stemple
<br />
Sam Gertler<br />
Teddy Dubno
<br />
Eric Martin<br />
Marty Reider
</footer>
</body>
</html>