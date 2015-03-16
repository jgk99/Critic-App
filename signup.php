<?php
error_reporting(E_ALL | ~E_STRICT);
function redirect_to($new_location) {
        header("Location: " . $new_location);
        exit;
    } 


$name_blank=""; 
$email_blank="";
$username_blank="";
$password1_blank="";
$password2_blank="";
$password_problem="";

$name_set="0";
$email_set="0";

$password1_set="0";
$password2_set="0";

$username_set="0";
$password_match="0";
$never="100";
$name = "";
$email = "";
$website = "";
$password1 = "";
$password2 = "";
$username = "";

if(isset($_POST['submit'])) {
	$name = $_POST["name"];
	$email = $_POST["email"]; 
	$username = $_POST["username"];
	$password1 = $_POST["password1"];
	$password2 = $_POST["password2"];

	if(!isset($name) || $name === "") {
		$name_blank .= "Name is required";
		$name_set="1";
	}
	
	if(!isset($email) || $email === "") {
		$email_blank .= "Email is required";
		$email_set="1";
	}
	
	if(!isset($_POST["username"])) {
		$username_blank .= "Username is required";
		$username_set="1";
	}
	
	if(!isset($_POST["password1"]) || $password1 === "") {
		$password1_blank .= "Password is required";
		$password1_set="1";
	}
	
	if(!isset($_POST["password2"]) || $password2 === "") {
		$password2_blank .= "Password is required";
		$password2_set="1";
	}
	
	if(($_POST["password2"])!=($_POST["password1"])) {
		$password_problem .= "Passwords do not match";
		$password_match="1";
	}
	if(!isset($_POST["username"]) || $username === "") {
		$username_blank .= "Username is required";
		$username_set="1";
	}
	// No need to send email just yet
	/* if($name_set=="0" && $email_set=="0" && $username_set=="0"&& $password1_set=="0"&& $password2_set=="0"&& $password_match=="0" && $never=="0") {
		require_once 'lib/swift_required.php';$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, "ssl")->setUsername('')
		  ->setPassword('');
		$mailer = Swift_Mailer::newInstance($transport);
		$message = Swift_Message::newInstance('Test Subject')
		  ->setFrom(array('jkogan18@cgps.org' => 'ABC'))
		  ->setTo(array($email))
		  ->setBody($comments);
		$result = $mailer->send($message);
	}
	*/
	if($name_set=="0" && $email_set=="0"  && $username_set=="0" && $password1_set=="0" && $password2_set== "0" && $password_match=="0") {
        session_start();
        $_SESSION["in"]="378";
		$_SESSION["name"]="$name";
		$_SESSION["username"]="$username";
		$_SESSION["password"]="$password1";
		$_SESSION["email"]="$email";
		
		redirect_to("questions.php");

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
<li><a href="movies.php">MOVIES<a> </li>

<li><a href="bio.html">CRITICS</a> </li>
<li><a href="bio.html">MY ACCOUNT</a> </li>


</ul>
</nav>
	<article>
		<h2> Sign Up Here</h2>
		<form action="signup.php" method="post">
			Name	: <input type="text" name="name" value="<?php echo $name; ?>" /><font color=red><?php echo $name_blank;?></font><br /><br />
			Username: <input type="text" name="username" value="<?php echo $username; ?>" /><font color=red><?php echo $username_blank;?></font><br /><br />
			Email   : <input type="text" name="email" value="<?php echo $email; ?>" /><font color=red><?php echo $email_blank;?></font><br /><br />
			Password: <input type="password" name="password1" value="<?php echo $password1; ?>" /><font color=red><?php echo $password1_blank;?></font><br /><br />
			Confirm Password: <input type="password" name="password2" value="<?php echo $password2; ?>" /><font color=red><?php echo $password2_blank;?><br /><br /><?php echo $password_problem;?></font>
			<input type="submit" name="submit" value="Submit" />
		</form>
		<br />
		If you already have an account click <a href="signin.php">here</a>.
		<br /><br /><br />
	<article>
</div>

<?php require_once("footer.php"); ?>

</body>
</html>