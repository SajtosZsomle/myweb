<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Belépés | MrZsomi.xyz</title>
	<link rel="stylesheet" href="../assets/style/style.css" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	<link rel="icon" type="image/x-icon" href="assets/img/standard.gif">
</head>

<body>
	<?php
	require('db.php');
	// If form submitted, insert values into the database.
	if (isset($_POST['username'])) {
		// removes backslashes
		$username = stripslashes($_REQUEST['username']);
		//escapes special characters in a string
		$username = mysqli_real_escape_string($con, $username);
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con, $password);
		//Checking is user existing in the database or not
		$query = "SELECT * FROM `users` WHERE username='$username'
and password='" . md5($password) . "'";
		$result = mysqli_query($con, $query) or die(mysqli_error($con));
		$rows = mysqli_num_rows($result);
		if ($rows == 1) {
			$_SESSION['username'] = $username;
			header("Location: index.php");
			exit();
		} else {
			echo "<div class='alert alert-danger' role='alert'>Helytelen felhasználónév vagy jelszó!</div>";
		}
	} else {
	?>
		<div class="form">
			<h1>Bejelentkezés</h1>
			<form action="" method="post" name="login">
				<input type="text" name="username" placeholder="Felhasználónév" required />
				<input type="password" name="password" placeholder="Jelszó" required />
				<input name="submit" type="submit" value="Belépés" />
			</form>
			<p>Még nincs fiókod? <a href='registration.php'>Regisztráció</a></p>
		</div>
	<?php } ?>
</body>

</html>