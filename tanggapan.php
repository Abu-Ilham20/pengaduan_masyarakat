<?php
session_start();
include "db.php";
$halaman = "pengaduan";

if (!isset($_SESSION["username"])) {
    header("location: login.php");
    exit;
}

$nik = $_SESSION['nik'];
$queryUser = "SELECT * FROM pengaduan ORDER BY tgl_pengaduan DESC";
$dataUser = mysqli_query($conn, $queryUser);

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

<div class="bg-light rounded h-100 p-4">
    <?php
    if (isset($_SESSION['flash'])) {
        $message = $_SESSION['flash'];
        unset($_SESSION['flash']);
        echo $message;
    }
    if (isset($_SESSION['sulap'])) {
        $message = $_SESSION['sulap'];
        unset($_SESSION['sulap']);
        echo $message;
    }
    ?>

    <br>
    <hr><br>
    <h3 class="text-center">Data Pengaduan</h3>
    <!-- BEGIN: Datatable -->
    <div class="intro-y datatable-wrapper box p-5 mt-5">
        <table class="table table-report table-report--bordered display datatable w-full">
            <thead>
                <tr>
                    <th class="border-b-2 whitespace-no-wrap">#</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">Tanggal Pengaduan</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">Isi Laporan</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">Foto</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">Status</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">Aksi</th>

                </tr>
            </thead>
            <tbody>
                <?php $no = 0 ?>
                <?php foreach ($dataUser as $aduan) { ?>
                    <?php $no++ ?>
                    <tr>
                        <td scope="row"><?= $no; ?></td>
                        <td><?= $aduan['tgl_pengaduan']; ?></td>
                        <td><?= $aduan['isi_laporan']; ?></td>
                        <td> <img src="img/<?= $aduan['foto']; ?>" alt="" srcset="" width="150"></td>
                        <td>
                            <?php
                            if ($aduan['status'] == 0) {
                                echo "Belum Di Proses";
                            } else if ($aduan['status'] == 'proses') {
                                echo "Sedang Diproses";
                            } else if ($aduan['status'] == 'selesai' ) {
                                echo "Selesai";
                            }
                            ?>


                        </td>
                        <td>
                            <!-- validasi -->
                            <?php if ($aduan['status'] == 0) { ?>
                                <div class="text-center">
                                    <a href="javascript:;" data-toggle="modal" data-target="#delete-modal-preview" class="button inline-block bg-theme-1 text-white">Validasi</a>
                                </div>
                                <div class="modal" id="delete-modal-preview">
                                    <div class="modal__content">
                                        <div class="p-5 text-center"> <i data-feather="check-circle" class="w-16 h-16 text-theme-9 mx-auto mt-3"></i>
                                            <div class="text-3xl mt-5">Validasi Pengaduan ?</div>
                                        </div>
                                        <div class="px-5 pb-8 text-center">
                                            <button type="button" data-dismiss="modal" class="button w-24 border text-gray-700 mr-1">Cancel</button>
                                            <a href="petugas_model.php?validasi=<?= $aduan['id_pengaduan']; ?>"><button type="submit" class="button w-24 bg-theme-1 text-white">Ok</button></a>
                                        </div>
                                    </div>
                                </div>
                            <?php } else if ($aduan['status'] == 'Proses') { ?>
                                <div class="text-center">
                                    <a href="javascript:;" data-toggle="modal" data-target="#delete-modal-preview" class="button inline-block bg-theme-1 text-white">Tanggapi</a>
                                </div>
                                <div class="modal" id="delete-modal-preview">
                                    <div class="modal__content">
                                        <div class="p-5 text-center"> <i data-feather="check-circle" class="w-16 h-16 text-theme-9 mx-auto mt-3"></i>
                                            <div class="text-3xl mt-5">Menanggapi Pengaduan ?</div>
                                        </div>
                                        <div class="px-5 pb-8 text-center">
                                            <button type="button" data-dismiss="modal" class="button w-24 border text-gray-700 mr-1">Cancel</button>
                                            <a href="berikan_tanggapan.php?tanggapan=<?= $aduan['id_pengaduan']; ?>"><button type="submit" class="button w-24 bg-theme-1 text-white">Ok</button></a>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <!-- END: Datatable -->

</div>
<!-- JavaScript -->
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

<body>

</body>

</html>