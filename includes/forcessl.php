<?php

session_start();

$happy = $_SERVER["HTTP_HOST"];

if ($happy === "localhost" || $happy === "localhost:8888" || $happy === "test.mymoviecritic.com") {
	
}

else if ($_SERVER["HTTPS"] != "on")
{
    header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
    exit();
}
/*if(isset($_SESSION["id"])) {


}
else if ($_SERVER["REQUEST_URI"] === "movies.php" || $_SERVER["REQUEST_URI"] === "movie.php") {
	 header("Location: https://" . $_SERVER["HTTP_HOST"]);
}

*/
?>