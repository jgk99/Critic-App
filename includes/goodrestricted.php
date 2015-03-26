<?php function redirect_to($new_location) {
	header("Location: " . $new_location);
	exit;
}
if (isset($_SESSION["id"])) {
redirect_to("signinAngry.php");
}
?>