<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link href="dist/images/logo.svg" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Midone admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Midone admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="LEFT4CODE">
    <title>Login - Midone - Tailwind HTML Admin Template</title>
    <?php include "layout/_css.php"; ?>
</head>
<!-- END: Head -->

<body class="login">
    <div class="container sm:px-10">
        <div class="block xl:grid grid-cols-2 gap-4">
            <!-- BEGIN: Login Info -->
            <div class="hidden xl:flex flex-col min-h-screen">
                <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
                    Halaman Registrasi Akun
                </div>
            </div>
            <!-- END: Login Info -->
            <!-- BEGIN: Login Form -->
            <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                <div class="my-auto mx-auto xl:ml-20 bg-white xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                    <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                        Register
                    </h2>
                    <div class="intro-x mt-2 text-gray-500 xl:hidden text-center">Halaman Untuk membuat akun pengaduan masyarakat anda.</div>
                    <form action="auth_model.php" method="post">
                        <div class="intro-x mt-8">
                            <input type="text" name="nik" class="intro-x login__input input input--lg border border-gray-300 block" placeholder="NIK" required>
                            <input type="text" name="nama" class="intro-x login__input input input--lg border border-gray-300 block mt-4" placeholder="Nama Anda" required>
                            <input type="text" name="username" class="intro-x login__input input input--lg border border-gray-300 block mt-4" placeholder="Username" required>
                            <input type="password" name="password" class="intro-x login__input input input--lg border border-gray-300 block mt-4" placeholder="Password" required>
                            <input type="text" name="telp" class="intro-x login__input input input--lg border border-gray-300 block mt-4" placeholder="Telepon" required>
                        </div>
                        <div class="intro-x flex text-gray-700 text-xs sm:text-sm mt-4">
                            <div class="flex items-center mr-auto">
                                <input type="checkbox" class="input border mr-2" id="remember-me">
                                <label class="cursor-pointer select-none" for="remember-me">Remember me</label>
                            </div>
                            <a href="login.php"><button type="submit" name="register" class="button button--lg w-full xl:w-32 text-white bg-theme-1 xl:mr-3">Register</button></a>
                        </div>
                    </form>
                    <div class="intro-x mt-10 xl:mt-24 text-gray-700 text-center xl:text-left">
                        Sudah Punya Akun ?
                        <br>
                        <a class="text-theme-1" href=""></a> <a class="text-theme-1" href="login.php">Silahkan Klik untuk ke halaman Login.</a>
                    </div>
                </div>
            </div>
            <!-- END: Login Form -->
        </div>
    </div>

    <!-- js -->
    <?php include "layout/_js.php"; ?>
</body>

</html>