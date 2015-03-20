<?php
	$host = "localhost";
	$user = "mymozlsy";
	$pass = "?DV!rsKoYtYpV";
	$db = "mymozlsy_mymoviecritic";

	$connect = @mysql_connect($host, $user, $pass) or die("Error: Cannot connect to database.");
	$select = @mysql_select_db($db, $connect) or die("Error: Cannot select database.");
?>