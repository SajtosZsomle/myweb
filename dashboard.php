<?php
include("auth.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Kezelőfelület | MrZsomi.xyz</title>
    <link rel="stylesheet" href="assets/style/style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="assets/img/standard.gif">
</head>

<body>
    <div class="form">
        <div class="container">
            <div class="alert alert-primary" role="alert">Üdvözöllek <?php echo $_SESSION['username'];?>, a Kezelőfelületen! </div>
        </div>
    </div>
</body>

</html>