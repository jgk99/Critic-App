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

if(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== FALSE)
   echo 'Internet explorer';
 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Trident') !== FALSE) //For Supporting IE 11
    echo 'Internet explorer';
 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') !== FALSE)
   echo 'Mozilla Firefox';
 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== FALSE)
   echo 'Google Chrome';
 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== FALSE)
   echo "Opera Mini";
 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Opera') !== FALSE)
   echo "Opera";
 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Safari') !== FALSE)
   echo "Safari";
 else
   echo 'Something else';
/*if(isset($_SESSION["id"])) {


}
else if ($_SERVER["REQUEST_URI"] === "movies.php" || $_SERVER["REQUEST_URI"] === "movie.php") {
	 header("Location: https://" . $_SERVER["HTTP_HOST"]);
}

*/
?>
