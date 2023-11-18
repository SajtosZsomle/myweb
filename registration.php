<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Regisztráció | MrZsomi.xyz</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="assets/img/standard.gif">
</head>

<body>
    <?php
    require('db.php');
    if (isset($_REQUEST['username'])) {
        $username = stripslashes($_REQUEST['username']);
        $username = mysqli_real_escape_string($con, $username);
        $email = stripslashes($_REQUEST['email']);
        $email = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $trn_date = date("Y-m-d H:i:s");
        $query = "INSERT into `users` (username, password, email, trn_date)
VALUES ('$username', '" . md5($password) . "', '$email', '$trn_date')";
        $result = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='alert alert-success' role='alert'>Sikeres regisztráció! Átirányítás a bejelentkezéshez...</div>";
            sleep(8);
            header("Location: login.php");
            exit;
        }
    } else {
    ?>
        <div class="form">
            <h1>Registration</h1>
            <form name="registration" action="" method="post">
                <input type="text" name="username" placeholder="Felhasználónév" required />
                <input type="email" name="email" placeholder="Email" required />
                <input type="password" name="password" placeholder="Jelszó" required />
                <input type="submit" name="submit" value="Regisztráció" />

                <div color="orange" class="margin-top20 text-center">
                    Regisztráltál már? <a style="color:#e38809" href="login.php">Jelentkezz be!</a>
                </div>
            </form>
        </div>
    <?php } ?>
</body>

</html>