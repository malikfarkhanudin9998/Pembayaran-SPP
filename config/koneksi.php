<?php 
//variabel koneksi
$koneksi = mysqli_connect("localhost","root","","spp");

if (mysqli_connect_errno()){
	echo "Koneksi database gagal" . mysqli_connect_error();
}
 ?>