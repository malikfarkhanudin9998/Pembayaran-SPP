<?php 
    session_start();
    if(!isset($_SESSION['login'])){
        header('location:../index.php');
    }

    include "../config/koneksi.php";
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Data Transaksi Siswa</title>
	<?php 
        include 'layout/sa_head.php';
     ?>
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <?php 
            include 'layout/sa_nav.php';
         ?>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Toggle Sidebar</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="logout_admin.php">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="sa_index.php">Home</a></li>
              <li class="breadcrumb-item"><a href="sa_dt.php">Transaksi</a></li>
              <li class="breadcrumb-item active" aria-current="page">Cek Transaksi Siswa</li>
            </ol>
          </nav>
            <div>
            <table id="tb_cek" class="table table-bordered">
              <thead class="thead-light">
                <tr>
                 <th scope="col">Id</th>
                  <th scope="col">Tanggal Transaksi</th>
                  <th scope="col">Jumlah Bulan</th>
                  <th scope="col">Bulan Transaksi</th>
                  <th scope="col">Nis</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Kelas</th>
                  <th scope="col">Jurusan</th>
                  <th scope="col">Tahun Ajaran</th>
                  <th scope="col">SPP Per Bulan</th>
                  <th scope="col">Sisa Tagihan</th>
                </tr>
            </thead>
            <tbody> 
              <tr>
                <?php
                if(isset($_GET['nis_siswa'])){
                        $nis_siswa = $_GET['nis_siswa'];
                //query ke database SELECT tabel mahasiswa urut berdasarkan id yang paling besar
                    $sql = mysqli_query($koneksi,"SELECT * FROM tbl_transaksi where nis_siswa='$nis_siswa'") or die(mysqli_error($koneksi));
                }
                //jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
                if(mysqli_num_rows($sql) > 0){
                    //membuat variabel $no untuk menyimpan nomor urut
                    $no = 1;
                    //melakukan perulangan while dengan dari dari query $sql
                    while($data = mysqli_fetch_assoc($sql)){
                        //menampilkan data perulangan
                ?>
                <td><?php echo $data['id_transaksi']; ?></td>
                <td><?php echo $data['tgl_transaksi']; ?></td>
                <td><?php echo $data['jumlah_bulan']; ?></td>
                <td><?php echo $data['bulan_transaksi']; ?></td>
                <td><?php echo $data['nis_siswa']; ?></td>
                <td><?php echo $data['nama_siswa']; ?></td>
                <td><?php echo $data['kelas_siswa']; ?></td>
                <td><?php echo $data['nama_jurusan']; ?></td>
                <td><?php echo $data['tahun_ajaran']; ?></td>
                <td>Rp.<?php echo $data['spp_bulan']; ?></td>
                <td>Rp.<?php echo $data['total_tagihan']; ?></td>
              </tr>
          <?php 
                }
                } else{
                    echo '
                    <tr>
                        <td colspan="11">Belum melakukan pembayaran.</td>
                    </tr>
                    ';
                }
           ?>
            </tbody>
            </table>
    
        <!-- End Page Content -->
    </div>
</div>
<script type="text/javascript">
    $(document).ready( function () {
        $('#tb_cek').dataTable( {
        "order": [ 0, 'desc' ]
            } );
    } );
</script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
</body>
</html>