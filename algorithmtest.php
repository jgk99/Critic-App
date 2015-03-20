<!DOCTYPE html>

<html>
<head>
	<title>My Movie Critic</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="UTF-8">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
</head>
<body>

<div class="container">
	<?php require_once("includes/header.php"); ?>

	<article>
		<?php

		include 'dbfuncs.php';

		$con=dbconnect();
		$query = "SELECT * FROM `userreviews` WHERE `UserID` = '1'";
		$data = $con->query($query);

		?>

		<script type="text/javascript">
			<?php

			$php_array = array('abc','def','ghi');
			$js_array = json_encode($php_array);
			echo "var javascript_array = ". $js_array . ";\n";

			?>
		</script>
	</article>
</div>

<?php require_once("includes/footer.php"); ?>

</body>
</html>