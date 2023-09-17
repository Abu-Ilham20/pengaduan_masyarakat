<?php

session_start();
include "db.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include "layout/_css.php"; ?>
</head>

<body>
    <?php include "layout/sidebar.php"; ?>
    <?php include "layout/nav.php"; ?>

    <form action="auth_model.php" method="post">
    <div class="mt-3">
            <!-- <input type="text" class="input w-full rounded-full border mt-2" name="nik" value="<//?= $_SESSION['nik']; ?>"> -->
        </div>
        <div class="mt-3">
            <label>Nama</label>
            <input type="text" class="input w-full rounded-full border mt-2" name="updtnm" value="<?= $_SESSION['nama']; ?>">
        </div>
        <div class="mt-3">
            <label>Username</label>
            <input type="text" class="input w-full rounded-full border mt-2" name="updtuser" value="<?= $_SESSION['username']; ?>">
        </div>
        <div class="mt-3">
            <label>No Telpon</label>
            <input type="text" class="input w-full rounded-full border mt-2" name="updttlp" value="<?= $_SESSION['telp']; ?>">
        </div>
        <div class="intro-x flex text-gray-700 text-xs sm:text-sm mt-4">
            <button type="submit" name="updateprof" class="button button--lg w-full xl:w-32 text-white bg-theme-9 xl:mr-3">Update Profile</button>
        </div>
    </form>

    <?php include "layout/_js.php"; ?>
</body>

</html>