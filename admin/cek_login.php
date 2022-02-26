<?php 
// mengaktifkan session pada php
 
// menghubungkan php dengan koneksi database
include '../config/koneksi.php';
 
// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];
 
 
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
 
// cek apakah username dan password di temukan pada database
if($cek > 0){
 
    $data = mysqli_fetch_assoc($login);

    // mengaktifkan session pada php
    session_start();
 
    // cek jika user login sebagai admin
    if($data['level']=="admin"){
 
        // buat session login dan username
        $_SESSION['login'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['level'] = "admin";
        // alihkan ke halaman dashboard
        // header("location:a_index.php");
        echo '<script>alert("Anda Telah Login Sebagai Admin.");
        document.location="a_index.php";</script>';
 
    // cek jika user login sebagai
    }else if($data['level']=="super_admin"){
        // buat session login dan username
        $_SESSION['login'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['level'] = "super_admin";
        // alihkan ke halaman dashboard
        // header("location:sa_index.php");
        echo '<script>alert("Anda Telah Login Sebagai Super Admin."); document.location="sa_index.php";</script>';
    
 
    }else{
 
        // alihkan ke halaman login kembali
        header("location:index.php?pesan=gagal");
    }   
}else{
    header("location:index.php?pesan=gagal");
}
 
?>