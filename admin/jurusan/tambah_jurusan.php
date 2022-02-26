<?php 
    session_start();
    if(!isset($_SESSION['login'])){
        header('location:index.php');
    }

    include "../../config/koneksi.php";
    if (isset($_POST['submit'])) {
        $id_jurusan = $_POST['id_jurusan'];
        $nama_jurusan = $_POST['nama_jurusan'];

        $sql = mysqli_query($koneksi, "INSERT into tbl_jurusan values ('$id_jurusan','$nama_jurusan')") or die(mysqli_error($koneksi));
        if ($sql) {
            echo '<script>alert("Berhasil menambah jurusan."); document.location="daftar_jurusan.php";</script>';
        }else{
         '<script>alert("Gagal menambah jursan."); document.location="daftar_jurusan.php";</script>';
        }
    }
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambah Kelas</title>
	<?php 
        include '../layout/a_head.php';
     ?>
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <?php 
            include '../layout/a_nav.php';
         ?>

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
                                <a class="nav-link" href="../logout_admin.php">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../a_index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="daftar_jurusan.php">Jurusan</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Jurusan</li>
              </ol>
            </nav>

            <form action="" method="POST">
                
                <!-- <div class="form-group">
                    <select class="form-control" name="kelas">
                    <option>- Pilih Kelas -</option>
                    <option value="x">X</option>
                    <option value="xi">XI</option>
                    <option value="xii">XII</option>
                </select> -->
                <div class="form-group">
                    <input type="text" name="id_jurusan" class="form-control" placeholder="Kode Kelas ex : K1 untuk Kimia 1">
                </div>
                  <div class="form-group">
                    <input type="text" name="nama_jurusan" class="form-control" placeholder="Nama Kelas">
                  </div>
                    <input type="submit" name="submit" class="btn btn-info">
                    <a href="daftar_jurusan.php" class="btn btn-warning">Kembali</a>
                </form>
                <!-- </div> -->
        </div>
        <!-- End Page Content -->
    </div>

        <div class="overlay"></div>
    <!-- Popper.JS -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script> -->
    <script type="text/javascript" src="../../assets/js/jquery.mCustomScrollbar.concat.min.js"></script>

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