<?php
include '../../config/koneksi.php';
include '../../assets/excel_reader2.php';
?>

<?php
// upload file xls
$target = basename($_FILES['filesiswa']['name']) ;
move_uploaded_file($_FILES['filesiswa']['tmp_name'], $target);
 
// beri permisi agar file xls dapat di baca
chmod($_FILES['filesiswa']['name'],0777);
 
// mengambil isi file xls
$data = new Spreadsheet_Excel_Reader($_FILES['filesiswa']['name'],false);
// menghitung jumlah baris data yang ada
$jumlah_baris = $data->rowcount($sheet_index=0);
 
// jumlah default data yang berhasil di import
$berhasil = 0;
for ($i=2; $i<=$jumlah_baris; $i++){
 
  // menangkap data dan memasukkan ke variabel sesuai dengan kolumnya masing-masing
  $nis_siswa      = $data->val($i, 1);
  $nama_siswa     = $data->val($i, 2);
  $kelas_siswa    = $data->val($i, 3);
  $nama_jurusan   = $data->val($i, 4);
  $tahun_ajaran   = $data->val($i, 5);
  $spp_bulan      = $data->val($i, 6);
  $total_tagihan  = $data->val($i, 7);


  if($nis_siswa != "" && $nama_siswa != "" && $kelas_siswa != "" && $nama_jurusan != "" && $tahun_ajaran != "" && $spp_bulan != ""){
      $cek = mysqli_query($koneksi, "SELECT * FROM tbl_siswa WHERE nis_siswa = '$nis_siswa'") or die(mysqli_error($koneksi));

      if (mysqli_num_rows($cek) == 0) {
        // input data ke database (table data_pegawai)
        $sql = mysqli_query($koneksi, "INSERT into tbl_siswa values ('','$nis_siswa','$nama_siswa','$kelas_siswa','$nama_jurusan','$tahun_ajaran', '$spp_bulan', '$total_tagihan')") or die(mysqli_error($koneksi));
        $berhasil++;

        if ($sql) {
          header("location:data_siswa.php?berhasil=$berhasil");
        } else {
          echo '<script>alert("Gagal Menambahkan Data!"); document.location="s_imp_data.php";</script>';
        }
      } else{
        echo '<script>alert("Nis Telah Terdaftar!"); document.location="s_imp_data.php";</script>';
      }
  }
}
 
// hapus kembali file .xls yang di upload tadi
//unlink($_FILES['filesiswa']['name']);
 
// alihkan halaman ke index.php
// header("location:data_siswa.php?berhasil=$berhasil");
