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
<li><a href="movies.php">MOVIES<a> </li>

<li><a href="bio.html">CRITICS</a> </li>
<li><a href="bio.html">MY ACCOUNT</a> </li>


</ul>
</nav>
<article>
<form action="questions.php" method="post">
<h2>Rate these movies so we can pair you up with your personal movie critic</h2>
   <tr>
   	<table><tr>
      <td width="400" align="center">Avatar<br/>
      <img  src="avatar.jpg"  alt="Avatar Movie Cover"  width="150" />
  </td>
      <td width="600" align="center">
      	<input type="radio" name="avatar" value="likeit">Like it     
            <input type="radio" name="avatar" value="dislikeit">Dislike it
            <input type="radio" name="avatar" value="impartial">Impartial     
            <input type="radio" name="avatar" value="impartial">Haven't seen it
        </td></tr><tr>
    <td width="400" align="center">Interstellar<br/>
      <img  src="interstellar.jpg"  alt="Interstellar Movie Cover"  width="150" />
  </td>
      <td width="600" align="center">
      	<input type="radio" name="interstellar" value="likeit">Like it     
            <input type="radio" name="interstellar" value="dislikeit">Dislike it
            <input type="radio" name="interstellar" value="impartial">Impartial     
            <input type="radio" name="interstellar" value="impartial">Haven't seen it
        </td></tr><tr>
        <td width="400" align="center">Men In Black<br/>
      <img  src="meninblack.jpg"  alt="Men in Black Movie Cover"  width="150" />
  </td>
      <td width="600" align="center">
      	<input type="radio" name="meninblack" value="likeit">Like it     
            <input type="radio" name="meninblack" value="dislikeit">Dislike it
            <input type="radio" name="meninblack" value="impartial">Impartial     
            <input type="radio" name="meninblack" value="impartial">Haven't seen it
        </td></tr><tr>
        <td width="400" align="center">The Notebook<br/>
      <img  src="notebook.jpg"  alt="Notebook Movie Cover"  width="150" />
  </td>
      <td width="600" align="center">
      	<input type="radio" name="notebook" value="likeit">Like it     
            <input type="radio" name="notebook" value="dislikeit">Dislike it
            <input type="radio" name="notebook" value="impartial">Impartial     
            <input type="radio" name="notebook" value="impartial">Haven't seen it
        </td></tr><tr>
        <td width="400" align="center">21 Jump Street<br/>
      <img  src="21jumpstreet.jpg"  alt="21 jump street Movie Cover"  width="150" />
  </td>
      <td width="600" align="center">
      	<input type="radio" name="21jumpstreet" value="likeit">Like it     
            <input type="radio" name="21jumpstreet" value="dislikeit">Dislike it
            <input type="radio" name="21jumpstreet" value="impartial">Impartial     
            <input type="radio" name="21jumpstreet" value="impartial">Haven't seen it
        </td></tr><tr>
        <td width="400" align="center">The Hangover<br/>
      <img  src="hangover.jpg"  alt="The Hangover Movie Cover"  width="150" />
  </td>
      <td width="600" align="center">
      	<input type="radio" name="hangover" value="likeit">Like it     
            <input type="radio" name="hangover" value="dislikeit">Dislike it
            <input type="radio" name="hangover" value="impartial">Impartial     
            <input type="radio" name="hangover" value="impartial">Haven't seen it
        </td></tr></tr><tr>
        <td width="400" align="center">The Exorcist<br/>
      <img  src="exorcist.jpg"  alt="The Exorcist Movie Cover"  width="150" />
  </td>
      <td width="600" align="center">
      	<input type="radio" name="exorcist" value="likeit">Like it     
            <input type="radio" name="exorcist" value="dislikeit">Dislike it
            <input type="radio" name="exorcist" value="impartial">Impartial     
            <input type="radio" name="exorcist" value="impartial">Haven't seen it
        </td></tr>
        </tr><tr>
        <td width="400" align="center">Lincoln<br/>
      <img  src="lincoln.jpg"  alt="Lincoln Movie Cover"  width="150" />
  </td>
      <td width="600" align="center">
      	<input type="radio" name="lincoln" value="likeit">Like it     
            <input type="radio" name="lincoln" value="dislikeit">Dislike it
            <input type="radio" name="lincoln" value="impartial">Impartial     
            <input type="radio" name="lincoln" value="impartial">Haven't seen it
        </td></tr>










    </tr>
    
      
   
  </table>
  <input type="submit" name="submit" value="Submit" />
</form>
<article>
</div>


<?php require_once("footer.php"); ?>
</body>
</html>