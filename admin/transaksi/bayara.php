<?php 
    session_start();
    if(!isset($_SESSION['login'])){
        header('location:../index.php');
    }

    include "../../config/koneksi.php";

    if (isset($_POST['submit'])) {
        if (!empty($_POST['jumlah_bulan'])) {
                $id_siswa = $_POST['id_siswa'];
                $tgl_transaksi = date("Y-m-d");
                $jumlah_bulan = $_POST['jumlah_bulan'];
                $nis_siswa = $_POST['nis_siswa'];
                $nama_siswa = $_POST['nama_siswa'];
                $kelas_siswa = $_POST['kelas_siswa'];
                $nama_jurusan = $_POST['nama_jurusan'];
                $tahun_ajaran = $_POST['tahun_ajaran'];
                $spp_bulan = $_POST['spp_bulan'];


                switch ($jumlah_bulan) {
                    case '1':
                        $bulan_transaksi = $_POST['bulan1'];
                        $bayar = $spp_bulan * $jumlah_bulan;
                        $total_tagihan = $_POST['total_tagihan'] - $bayar;
                        break;

                    case '2':
                        $bulan1 = $_POST['bulan1'];
                        $bulan2 = $_POST['bulan2'];
                        $bulan_transaksi = $bulan1 . ', ' . $bulan2;
                        $bayar = $spp_bulan * $jumlah_bulan;
                        $total_tagihan = $_POST['total_tagihan'] - $bayar;
                        break;

                    case '3':
                        $bulan1 = $_POST['bulan1'];
                        $bulan2 = $_POST['bulan2'];
                        $bulan3 = $_POST['bulan3'];
                        $bulan_transaksi = $bulan1 . ', ' . $bulan2 . ', ' . $bulan3;
                        $bayar = $spp_bulan * $jumlah_bulan;
                        $total_tagihan = $_POST['total_tagihan'] - $bayar;
                        break;

                    default:
                        echo "Isi variabel tidak di temukan";
                        break;
                }
                        
                $sql = "SELECT id_transaksi as maxid FROM tbl_transaksi order by id_transaksi desc";    
                $hasil = mysqli_query($koneksi,$sql);
                $data  = mysqli_fetch_array($hasil);
                $id_transaksi = $data['maxid'];
                $noUrut = (int) substr($id_transaksi, 3);
                $noUrut++;

                $char = "Tr_";
                $newID = $char . sprintf("%03s", $noUrut);           

                $proses = mysqli_query($koneksi, "INSERT INTO tbl_transaksi VALUES ('$newID','$tgl_transaksi','$jumlah_bulan','$bulan_transaksi','$nis_siswa','$nama_siswa','$kelas_siswa','$nama_jurusan','$tahun_ajaran','$spp_bulan','$total_tagihan')") or die(mysqli_error($koneksi));

            if($proses){
                    $proses2 = mysqli_query($koneksi, "UPDATE tbl_siswa inner join tbl_jurusan on tbl_siswa.id_jurusan = tbl_jurusan.id_jurusan SET total_tagihan='$total_tagihan' where id_siswa='$id_siswa'");
                if ($proses2) {
                echo '<script>alert("Berhasil Dibayar."); document.location="data_transaksi.php";</script>';
                    }
                }
            }
                else{
                echo '<div class="alert alert-warning">Gagal melakukan pembayaran.</div>';
              }
             }
?>