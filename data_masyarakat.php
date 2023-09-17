<?php
session_start();
$halaman = "masyarakat";

if (!isset($_SESSION["username"])) {
    header("location: login.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--CSS -->
    <?php include "layout/_css.php"; ?>
</head>
<?php include "layout/sidebar.php"; ?>
<?php include "layout/nav.php"; ?>


<p class="pt-6">Hai ini halamat data masyarakat</p>

<!-- JavaScript -->
<?php include "layout/_js.php"; ?>

<body>

</body>

</html>