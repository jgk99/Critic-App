<?php
function dbconnect() {
	//Create connection
	$con=new mysqli("localhost","mymozlsy_happy",base64_decode("Y2dwc2NyMXRpYyE="),"mymozlsy_mymoviecritic");

	//Test Connection
	if (mysqli_connect_errno()) {
		throw new Exception("Connection failed with error %s", mysqli_connect_error());
	}

	//Return connection
	return $con;
}

function validateUser($usrname, $passwd) {
	//Connect to database
	$con=dbconnect();

	//Sanitize Variables
	$usrname = $con->real_escape_string($usrname);
	$passwd = $con->real_escape_string(hash("sha256",$passwd)); //Hash password using SHA256 algorithm

	//Build query string
	$query = "SELECT `username` FROM `Login` WHERE `username` = '$usrname' and `password` = '$passwd'";
	
	//Execute query and check for errors
	$data = $con->query($query);
	if (!$data) {
		throw new mysqli_sql_exception("Query failed with error: $con->sqlstate");
	} else {
		//Check if query returned a row results
		if ($data->num_rows == 1) {
			//User is valid
			return true;
		} else {
			return false;
		}
	}
}

function addUser($lname, $fname, $usrname, $email, $pass) {
	//Connecto to database
	$con = dbconnect();

	//Sanitize Variables
	$lname = $con->real_escape_string($lname);
	$fname = $con->real_escape_string($fname);
	$usrname = $con->real_escape_string($usrname);
	$email = $con->real_escape_string($email);
	$pass = $con->real_escape_string(hash("sha256", $pass)); //Hash password using SHA256 algorithm

	//Build query string
	$query = "INSERT INTO `Login` (`Last Name`, `First Name`, `username`, `Email`, `Password`) VALUES ('$lname', '$fname', '$usrname', '$email', '$pass')";

	//Execute query and check for errors
	if (!$con->query($query)) {
		throw new mysqli_sql_exception("$con->error");
	}
	$con->close();
}
?>