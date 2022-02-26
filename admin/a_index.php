<?php 
    session_start();
if(!isset($_SESSION['login'])){
    header('location:index.php');
}

include "../config/koneksi.php";
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Index Admin</title>
	<?php 
        include 'layout/sa_head.php';
     ?>
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div id="dismiss">
                <i class="fas fa-arrow-left"></i>
            </div>

            <div class="sidebar-header">
                <h4>Pembayaran</h4>
                <h4>SPP Sekolah</h4>
            </div>

            <ul class="list-unstyled components">
                <li>
                    <a href="a_index.php">Home</a>
                </li>
                <li>
                    <a href="siswa/data_siswa.php">Siswa</a>
                </li>
                <li>
                    <a href="transaksi/transaksi.php">Transaksi</a>
                </li>
                <li>
                    <a href="jurusan/daftar_jurusan.php">Jurusan</a>
                </li>
                <li>
                    <a href="laporan/l_laporan.php">Laporan</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <!-- <span>Toggle Sidebar</span> -->
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

            <div>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Home</li>
                  </ol>
                </nav>
            <h4>Selamat Datang di Beranda Administrator.</h4>
            <p>Hari ini tanggal <?php echo date('d-F-Y'); ?></p>
            <hr>
            <div class="container">
              <div class="row">
                <div class="col-sm">
                  <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Siswa</h5>
                    <p class="card-text">Digunakan untuk melihat data siswa atau daftar ulang.</p>
                    <a href="siswa/data_siswa.php" class="btn btn-info">Data Siswa</a>
<!--                     <a href="siswa/s_imp_data.php" class="btn btn-info">Import Data Siswa</a>
                    <a href="siswa/tambah_data_siswa.php" class="btn btn-info">Tambah Data Siswa</a> -->
                  </div>
                </div>
                </div>
                <div class="col-sm">
                  <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Transaksi</h5>
                    <p class="card-text">Digunakan untuk melakukan transaksi.</p>
                    <a href="transaksi/transaksi.php" class="btn btn-info">Transaksi</a>
                    <a href="transaksi/data_transaksi.php" class="btn btn-info">Data Transaksi</a>
                  </div>
                </div>
                </div>
                <div class="col-sm">
                  <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Laporan</h5>
                    <p class="card-text">Digunakan untuk mengexport data transaksi.</p>
                    <a href="laporan/l_laporan.php" class="btn btn-info">Laporan</a>
                  </div>
                </div>
                </div>
              </div>
            </div>
            
            </div>
        </div>
        <!-- End Page Content -->
    </div>

    <div class="overlay"></div>
    <!-- Popper.JS -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script> -->
    <script type="text/javascript" src="../assets/js/jquery.mCustomScrollbar.concat.min.js"></script>


    <script type="text/javascript">
        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#dismiss, .overlay').on('click', function () {
                $('#sidebar').removeClass('active');
                $('.overlay').removeClass('active');
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').addClass('active');
                $('.overlay').addClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
    </script>
</body>
</html>