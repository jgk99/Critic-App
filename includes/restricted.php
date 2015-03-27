<?php function redirect_to($new_location) {
	header("Location: " . $new_location);
	exit;
}

if ($happy === "localhost" || $happy === "localhost:8888") {

}

else if (!isset($_SESSION["id"])) {
redirect_to("signinAngry.php");

}
?>