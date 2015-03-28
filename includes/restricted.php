<?php

if ($happy === "localhost" || $happy === "localhost:8888") {

}

else if (!isset($_SESSION["id"])) {
header("Location: signinAngry.php");

}
?>