<?php
session_start();

if (isset($_SESSION['login'])) {
    header("location: index.php");
    exit;
}
include "db.php";

?>
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
                <a href="" class="-intro-x flex items-center pt-5">
                    <img alt="Midone Tailwind HTML Admin Template" class="w-6" src="midone/dist/images/logo.svg">
                    <span class="text-white text-lg ml-3"> Mid<span class="font-medium">One</span> </span>
                </a>
                <div class="my-auto">
                    <img alt="Midone Tailwind HTML Admin Template" class="-intro-x w-1/2 -mt-16" src="midone/dist/images/illustration.svg">
                    <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
                        Suara Rakyat
                        <br>
                        Kami menerima Pengaduan anda.
                    </div>
                    <div class="-intro-x mt-5 text-lg text-white">Selamat datang di website Rakyat</div>
                </div>
            </div>
            <!-- END: Login Info -->
            <!-- BEGIN: Login Form -->

            <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                <div class="my-auto mx-auto xl:ml-20 bg-white xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                    <?php
                    if (isset($_SESSION['flash'])) {
                        $message = $_SESSION['flash'];
                        unset($_SESSION['flash']);
                        echo $message;
                    }
                    if (isset($_SESSION['silau'])) {
                        $message = $_SESSION['silau'];
                        unset($_SESSION['silau']);
                        echo $message;
                    }
                    ?>
                    <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                        Sign In
                    </h2>
                    <div class="intro-x mt-2 text-gray-500 xl:hidden text-center">Halaman login menuju web pengaduan Masyarakat, dimana anda bisa berkeluh kesah.</div>
                    <form action="auth_model.php" method="post">
                        <div class="intro-x mt-8">
                            <input type="text" name="username" class="intro-x login__input input input--lg border border-gray-300 block" placeholder="Username">
                            <input type="password" name="password" class="intro-x login__input input input--lg border border-gray-300 block mt-4" placeholder="Password">
                            <select name="level" class="intro-x login__input input input--lg border border-gray-300 block mt-4" id="">
                                <option value="rakyat">Rakyat</option>
                                <option value="petugas">Petugas</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                        <div class="intro-x flex text-gray-700 text-xs sm:text-sm mt-4">
                            <div class="flex items-center mr-auto">
                                <input type="checkbox" class="input border mr-2" id="remember-me">
                                <label class="cursor-pointer select-none" for="remember-me">Remember me</label>
                            </div>
                            <a href="">Forgot Password?</a>
                        </div>
                        <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                            <button type="submit" name="login" class="button button--lg w-full xl:w-32 text-white bg-theme-1 xl:mr-3">Login</button>
                        </div>
                    </form>
                    <div class="intro-x mt-10 xl:mt-24 text-gray-700 text-center xl:text-left">
                        Belum punya akun?
                        <br>
                        <a class="text-theme-4" href="register.php"><button>Klik disini untuk register!</button></a>
                    </div>
                </div>
            </div>
            <!-- END: Login Form -->
        </div>
    </div>

    <!-- js -->
    <?php include "layout/_js.php"; ?>
    <script>
        function closeAlert(event) {
            let element = event.target;
            while (element.nodeName !== "BUTTON") {
                element = element.parentNode;
            }
            element.parentNode.parentNode.removeChild(element.parentNode);
        }
    </script>
</body>

</html>