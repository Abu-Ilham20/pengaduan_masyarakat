<?php
session_start();
include "db.php";

if (isset($_POST['simpan_pengaduan'])) {

  $namaFile = date('YmdHis') . '.jpg';
  $namaSementara = $_FILES['foto']['tmp_name'];
  $dirUpload = "img/";
  //pindahkan file
  move_uploaded_file($namaSementara, $dirUpload . $namaFile);
  $tgl_pengaduan = date('Y/m/d');
  $nik = $_SESSION['nik'];
  $isi_laporan = $_POST['isi_laporan'];
  $query = "INSERT INTO pengaduan VALUES ('', '$tgl_pengaduan', '$nik', '$isi_laporan', '$namaFile', '0')";
  $execpengaduan = mysqli_query($conn, $query);
  if ($execpengaduan) {
    $_SESSION["flash"] = "<div class='text-white px-6 py-4 border-0 rounded relative mb-4 bg-blue-500'>
            <span class='text-xl inline-block mr-5 align-middle'>
              <i class='fas fa-bell'></i>
            </span>
            <span class='inline-block align-middle mr-8'>
              <b class='capitalize'>Terima Kasih sudah memberi Masukan. </b>
            </span>
            <button class='absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none' onclick='closeAlert(event)'>
              <span>×</span>
          
            </button>
          </div>";
    header("location: pengaduan.php");
  }
}
if (isset($_GET['hapus'])) {
  $foto = $_GET['hapus'];
  unlink('img/' . $foto);
  $querryDelete = "DELETE FROM `pengaduan` WHERE foto = '$foto' ";
  $execDelete = mysqli_query($conn, $querryDelete);
  if ($execDelete) {
    $_SESSION["flash"] = "<div class='text-white px-6 py-4 border-0 rounded relative mb-4 bg-red-500'>
            <span class='text-xl inline-block mr-5 align-middle'>
              <i class='fas fa-bell'></i>
            </span>
            <span class='inline-block align-middle mr-8'>
              <b class='capitalize'>Terima Kasih Data Pengaduan Anda Sudah Di hapus. </b>
            </span>
            <button class='absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none' onclick='closeAlert(event)'>
              <span>×</span>
          
            </button>
          </div>";
    header("location: pengaduan.php");
  }
}


