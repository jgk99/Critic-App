<?php

session_start();

if ($_SERVER["HTTPS"] != "on")
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