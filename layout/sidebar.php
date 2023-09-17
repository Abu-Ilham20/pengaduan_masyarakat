<div class="flex">
    <!-- BEGIN: Side Menu -->
    <nav class="side-nav">
        <a href="" class="intro-x flex items-center pl-5 pt-4">
            <img alt="Midone Tailwind HTML Admin Template" class="w-6" src="midone/dist/images/logo.svg">
            <span class="hidden xl:block text-white text-lg ml-3"> Suara<span class="font-medium">Rakyat</span> </span>
        </a>

        <div class="side-nav__devider my-6"></div>
        <ul>
            <li>
                <a href="index.php" class="side-menu side-menu--<?php if ($halaman == "dashboard") {
                                                                    echo "active";
                                                                } ?>">
                    <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                    <div class="side-menu__title"> Dashboard </div>
                </a>
            </li>
            <?php if (($_SESSION['level'] == "admin") or  ($_SESSION['level'] == "petugas")) { ?>
                <li>
                    <a href="data_masyarakat.php" class="side-menu side-menu--<?php if ($halaman == "masyarakat") {
                                                                                    echo "active";
                                                                                } ?>">
                        <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>
                        <div class="side-menu__title"> Data Masyarakat </div>
                    </a>
                </li>
                <li>
                    <a href="data_petugas.php" class="side-menu side-menu--<?php if ($halaman == "petugas") {
                                                                                echo "active";
                                                                            } ?>">
                        <div class="side-menu__icon"> <i data-feather="hard-drive"></i> </div>
                        <div class="side-menu__title"> Data Petugas </div>
                    </a>
                </li>
                <li>
                    <a href="tanggapan.php" class="side-menu side-menu--<?php if ($halaman == "tanggapan") {
                                                                            echo "active";
                                                                        } ?>">
                        <div class="side-menu__icon"> <i data-feather="credit-card"></i> </div>
                        <div class="side-menu__title"> Tanggapan </div>
                    </a>
                </li>
            <?php } else { ?>
                <li>
                    <a href="pengaduan.php" class="side-menu side-menu--<?php if ($halaman == "pengaduan") {
                                                                            echo "active";
                                                                        } ?>">
                        <div class="side-menu__icon"> <i data-feather="message-square"></i> </div>
                        <div class="side-menu__title"> Pengaduan </div>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </nav>
    <!-- END: Side Menu -->