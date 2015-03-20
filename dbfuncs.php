<?php
function dbconnect() {
	//Create connection
	$con = new mysqli("54.174.198.68","happycritic",base64_decode("Y2dwc2NyMXRpYyE="),"MyMovieCritic")

	//Test Connection
	if (mysqli_connect_ernro()) {
		throw new Exception("Connection failed with error %s\n", mysqli_connect_error());
	}
}

function dbquery(string $queryStr) {
	//Connect to database
	dbconnect();

	//Execute query and check for errors
	if (!$con->query($queryStr)) {
		throw new Exception("Query failed with error %s\n", $con->sqlstate)
	}
}

function addUser(string $lname, string $fname, string $usrname, string $email, string $pass) {
	//Sanitize Variables
	$lname = $con->real_escape_string($lname);
	$fname = $con->real_escape_string($fname);
	$usrname = $con->real_escape_string($usrname);
	$email = $con->real_escape_string($email);
	$pass = $con->real_escape_string(hash("sha256",$pass)); //Hash password using SHA256 algorithm

	//Build query string
	$query = "INSERT INTO AppUsers (lastname, firstname, username, email, passwd) VALUES ($lname, $fname, $usrname, $email, $pass)"

	//Connect to database and execute query
	dbquery($query);
}
?>