<!DOCTYPE html>
<html>
<body>

<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$error = "";
		if (empty(htmlspecialchars(stripslashes(trim($_POST["name"]))))) {
			$error = "Name empty!";
		} else if (empty(htmlspecialchars(stripslashes(trim($_POST["email"]))))) {
			$error = "E-Mail empty!";
		} else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
			$error = "Invalid E-Mail!";
		} else {
			echo "Hallo ".htmlspecialchars(stripslashes(trim($_POST["name"])))."<br>Ihre E-Mail-Adresse lautet: ".
				htmlspecialchars(stripslashes(trim($_POST["email"])));
		}
	}
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
Name: <input type="text" name="name"><br>
E-mail: <input type="text" name="email"><br>
<?php echo $error ?>
<input type="submit">
</form>

</body>
</html>