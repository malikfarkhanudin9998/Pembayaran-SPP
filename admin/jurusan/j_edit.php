<?php 
    session_start();
    if(!isset($_SESSION['login'])){
        header('location:../index.php');
    }

    include "../../config/koneksi.php";
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Jurusan</title>
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
                <li class="breadcrumb-item active" aria-current="page">Edit Jurusan</li>
              </ol>
            </nav>
            <?php
        //jika sudah mendapatkan parameter GET id dari URL
        if(isset($_GET['id_jurusan'])){
            //membuat variabel $id untuk menyimpan id dari GET id di URL
            $id_jurusan = $_GET['id_jurusan'];
            
            //query ke database SELECT tabel mahasiswa berdasarkan id = $id
            $select = mysqli_query($koneksi, "SELECT * FROM tbl_jurusan where id_jurusan='$id_jurusan'") or die(mysqli_error($koneksi));
            
            //jika hasil query = 0 maka muncul pesan error
            if(mysqli_num_rows($select) == 0){
                echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
                exit();
            //jika hasil query > 0
            }else{
                //membuat variabel $data dan menyimpan data row dari query
                $data = mysqli_fetch_assoc($select);
            }
        }
        ?>

        <?php
        //jika tombol simpan di tekan/klik
        if(isset($_POST['submit'])){
            $id_jurusans           = $_POST['id_jurusan'];
            $nama_jurusan           = $_POST['nama_jurusan'];
            
            $sql = mysqli_query($koneksi, "UPDATE tbl_jurusan SET id_jurusan='$id_jurusans', nama_jurusan='$nama_jurusan' WHERE tbl_jurusan.id_jurusan ='$id_jurusans'") or die(mysqli_error($koneksi));
            
            if($sql){
                echo '<script>alert("Berhasil mengubah jursan."); document.location="daftar_jurusan.php";</script>';
            }else{
                echo '<script>alert("Gagal mengubah jurusan."); document.location="daftar_jurusan.php";</script>';
            }
        }
        ?>

             <form action="" method="POST">
                
                <div class="form-group row">
                    <label for="id_jurusan" class="col-sm-2 col-form-label">ID Kelas</label>
                    <div class="col-sm-10"><input type="text" name="id_jurusan" id="id_jurusan" class="form-control" value="<?php echo $data['id_jurusan'] ?>"></div>
                </div>
                <div class="form-group row">
                    <label for="nama_jurusan" class="col-sm-2 col-form-label">Nama Kelas</label>
                    <div class="col-sm-10"><input type="text" name="nama_jurusan" id="nama_jurusan" class="form-control" value="<?php echo $data['nama_jurusan'] ?>"></div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                      <input type="submit" name="submit" class="btn btn-info">
                      <a href="daftar_jurusan.php" class="btn btn-warning">Kembali</a>
                    </div>
                </div>
            </form>
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