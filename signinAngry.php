<?php
require_once("includes/forcessl.php");
require_once("includes/goodrestricted.php");
//error_reporting(E_ALL | ~E_ubTRICT);




if(isset($_POST['submit'])) {

	$username = $_POST["username"]; 
	$password = $_POST["pw"];
	
	echo "$username". "$password";

	}
?>




<!DOCTYPE html>

<html>
<head>
	<title>My Movie Critic</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<meta charset="UTF-8">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
	
	<?php require_once("includes/header.php"); ?> 



<div class="container">
	<br />
	
	<div class="col-md-6 col-md-offset-3 ">
<br />
<p> <font color=red><h2>You must be signed in to access all aspects of My Movie Critic. </h2></font></p>
      <h2>Sign In</h2>
		<br />
		<script src="js/jquery-1.11.2.min.js"></script>
		<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script> -->
		<script src="js/parsley.min.js"></script>
		<form action="signin.php" method="post" id="register">
				<tr>
					<td class="form-label">Username: </td>
					<td align="left"><input type="text" name="username" data-parsley-type="email" class="form-control"  required/></td>
				</tr>
				<tr>
					<td class="form-label">Password: </td>
					<td align="left"><input type="password" name="pw" id="pw" minlength="8"  class="form-control"  required/></td>
				</tr>
				<br/>

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
<p class="lead col-md-12 text-center"><br /><br />
			If you don't have an account sign up here.
			<br />
			<a href="signup.php"  class="btn btn-default">Sign Up</a>
		</p>
</div>
<br />
<br />

<?php require_once("includes/footer.php"); ?>

</body>
</html>