<?php

function redirect_to($new_location) {
	header("Location: " . $new_location);
	exit;
}

$never="100";
$name1 = "";
$lname="";
$email = "";
$password1 = "";
$lname = "";

if(isset($_POST['submit'])) {
	$name = $_POST["name1"];
	$email = $_POST["email"]; 
	$lname = $_POST["lname"];
	$password1 = $_POST["pw"];
	/* session_start();
	$_SESSION["in"]="378";
	$_SESSION["name"]="$name";
	$_SESSION["lname"]="$lname";
	$_SESSION["password"]="$password1";
	$_SESSION["email"]="$email";
	*/ 
	include 'dbfuncs.php';
	$nameArr=explode(" ",$name);
	$first=$nameArr[0];
	$last=$nameArr[1];
	addUser($last, $first, $lname, $email, $password1);
	//redirect_to("questions.php");
	}
?>




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



<div class="container">
	<div class="col-md-6 col-md-offset-3">
<br /><br />
      <h2>Sign Up ALso There must be a validation that forces the passwords to be the same!!!</h2>
		<br />
		<script src="js/jquery-1.11.2.min.js"></script>
		<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script> -->
		<script src="js/parsley.min.js"></script>
		<form action="signup.php" method="post" id="register" data-parsley-validate>
			<table align="left">
				<tr>
					<td align="left" class="form-label">First Name: </td>
					<td align="left"><input type="text" name="name1" class="form-control" required/></td>
				</tr>
				<tr>
					<td class="form-label">Last Name: </td>
					<td align="left"><input type="text" name="lname" class="form-control" required/></td>
				</tr>
				<tr>
					<td class="form-label">Email: </td>
					<td align="left"><input type="email" name="email" data-parsley-type="email" class="form-control"  required/></td>
				</tr>
				<tr>
					<td class="form-label">Password: </td>
					<td align="left"><input type="password" name="pw" id="pw" minlength="8"  class="form-control"  required/></td>
				</tr>
				<tr>
					<td class="form-label">Confirm Password: </td>
					<td align="left"><input type="password" name="pw-verify" data-parsley-equalto="#pw" class="form-control"required/></td>
				</tr>

				<tr>
					<td></td>
					<td><input type="submit" name="submit" value="Submit" class="btn btn-md btn-primary" /></td>
				</tr>
			

		<!--	 <script type="text/javascript">
			 		$(document).ready(function(){    
     				$('#form').parsley();
    			});	
			</script> -->
		</table>
		</form>

</div>
    </div>




<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<?php require_once("includes/footer.php"); ?>

</body>
</html>