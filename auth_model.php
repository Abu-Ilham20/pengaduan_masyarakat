<?php
session_start();
include "db.php";

// //update profile
// if (isset($_POST['updateprof'])) {
//   $nik = $_POST['nik'];
//   $nama = $_POST['updtnm'];
//   $username = $_POST['updtuser'];
//   $telp = $_POST['updttlp'];

//   $queryupdate = "UPDATE `masyarakat` SET `nama` = '$nama', `username` = '$username', `telp` = '$telp' WHERE `nik` = $nik";
//   $execupdate = mysqli_query($conn, $queryupdate);
//   if ($execupdate) {
//     $_SESSION["flash"] = "<div class='text-white px-6 py-4 border-0 rounded relative mb-4 bg-blue-500'>
//       <span class='text-xl inline-block mr-5 align-middle'>
//         <i class='fas fa-bell'></i>
//       </span>
//       <span class='inline-block align-middle mr-8'>
//         <b class='capitalize'>Selamat!</b> Anda Berhasil Registrasi Akun!
//       </span>
//       <button class='absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none' onclick='closeAlert(event)'>
//         <span>×</span>

//       </button>
//     </div>";
//     header("location: profile.php");
//   }
// }

if (isset($_POST['register'])) {
  $nik = $_POST['nik'];
  $nama = $_POST['nama'];
  $username = $_POST['username'];
  $password = md5($_POST['password']);
  $telp = $_POST['telp'];

  $querytambah = "INSERT INTO `masyarakat` (`nik`, `nama`, `username`, `password`, `telp`) VALUES ('$nik', '$nama' , '$username', '$password', '$telp')";
  $exectambah = mysqli_query($conn, $querytambah);
  if ($exectambah) {
    $_SESSION["flash"] = "<div class='text-white px-6 py-4 border-0 rounded relative mb-4 bg-blue-500'>
        <span class='text-xl inline-block mr-5 align-middle'>
          <i class='fas fa-bell'></i>
        </span>
        <span class='inline-block align-middle mr-8'>
          <b class='capitalize'>Selamat!</b> Anda Berhasil Registrasi Akun!
        </span>
        <button class='absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none' onclick='closeAlert(event)'>
          <span>×</span>
      
        </button>
      </div>";
    header("location: login.php");
  }
}


//login level
if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = md5($_POST['password']);
  $level = $_POST['level'];

  if ($level == "rakyat") {
    //login sebagai Rakyat -> dari table Masyarakat
    $query = "SELECT * FROM masyarakat WHERE username='$username'";
    $hasil = mysqli_query($conn, $query);
    $masyarakat = mysqli_fetch_array($hasil);

    if ($password == $masyarakat['password']) {
      //membuat variabel session berdasarkan data masyarakat
      session_start();
      $_SESSION['username'] = $masyarakat['username'];
      $_SESSION['nama'] = $masyarakat['nama'];
      $_SESSION['username'] = $masyarakat['username'];
      $_SESSION['nik'] = $masyarakat['nik'];
      $_SESSION['telp'] = $masyarakat['telp'];
      $_SESSION['level'] = "rakyat";
      header("Location: index.php");
    } else {
      session_start();
      $_SESSION["silau"] = "<div class='text-white px-6 py-4 border-0 rounded relative mb-4 bg-red-500'>
            <span class='text-xl inline-block mr-5 align-middle'>
              <i class='fas fa-bell'></i>
            </span>
            <span class='inline-block align-middle mr-8'>
              <b class='capitalize'>Peringatan!</b> Password/Username Salah!
            </span>
            <button class='absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none' onclick='closeAlert(event)'>
              <span>×</span>
          
            </button>
          </div>";
      header("location: login.php");
    }
  } else {
    //login sebagai Petugas -> dari table petugas
    $query = "SELECT * FROM petugas WHERE username='$username'";
    $hasil = mysqli_query($conn, $query);
    $petugas = mysqli_fetch_array($hasil);

    if ($password == $petugas['password']) {
      //membuat variabel session berdasarkan data petugaas
      session_start();
      $_SESSION['username'] = $petugas['username'];
      $_SESSION['nama'] = $petugas['nama_petugas'];
      $_SESSION['nik'] = $petugas['nik'];
      $_SESSION['telp'] = $petugas['telp'];
      $_SESSION['level'] = $petugas['level'];
      header("Location: index.php");
    } else {
      session_start();
      $_SESSION["silau"] = "<div class='text-white px-6 py-4 border-0 rounded relative mb-4 bg-red-500'>
            <span class='text-xl inline-block mr-5 align-middle'>
              <i class='fas fa-bell'></i>
            </span>
            <span class='inline-block align-middle mr-8'>
              <b class='capitalize'>Peringatan!</b> Password/Username Salah!
            </span>
            <button class='absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none' onclick='closeAlert(event)'>
              <span>×</span>
          
            </button>
          </div>";
      header("location: login.php");
    }
  }
}
