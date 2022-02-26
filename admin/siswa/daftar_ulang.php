<?php 
    session_start();
    if(!isset($_SESSION['login'])){
        header('location:../index.php');
    }

    include "../../config/koneksi.php";
        
    if(isset($_POST['submit'])){

    $id_siswa = $_POST['id_siswa'];
    $nis_siswa = $_POST['nis_siswa'];
    $nama_siswa = $_POST['nama_siswa'];
    $kelas_siswa = $_POST['kelas_siswa'];
    $nama_jurusan = $_POST['nama_jurusan'];
    $tahun_ajaran = $_POST['tahun_ajaran'];
    $spp_bulan = $_POST['spp_bulan'];
    $total_tagihan_lama = $_POST['total_tagihan'];
    $tagihan_spp = $_POST['tagihan_spp'];
    $jumlah = $tagihan_spp * 12;
    $total_tagihan = $total_tagihan_lama + $jumlah;

    $sql = mysqli_query($koneksi, "UPDATE tbl_siswa inner join tbl_jurusan on tbl_siswa.id_jurusan = tbl_jurusan.id_jurusan SET nis_siswa='$nis_siswa',nama_siswa='$nama_siswa', kelas_siswa='$kelas_siswa', nama_jurusan='$nama_jurusan', tahun_ajaran='$tahun_ajaran', spp_bulan='$spp_bulan', total_tagihan='$total_tagihan' where id_siswa='$id_siswa'") or die(mysqli_error($koneksi));
    if($sql){
        echo '<script>alert("Berhasil di daftar ulang."); document.location="data_siswa.php";</script>';
        }else{
         '<script>alert("Gagal di daftar ulang."); document.location="data_siswa.php";</script>';
        }
    }
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Daftar Ulang</title>
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
                <li class="breadcrumb-item"><a href="a_index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="data_siswa.php">Data Siswa</a></li>
                <li class="breadcrumb-item active" aria-current="page">Daftar Ulang</li>
              </ol>
            </nav>

            <?php
        //jika sudah mendapatkan parameter GET id dari URL
        if(isset($_GET['id_siswa'])){
            //membuat variabel $id untuk menyimpan id dari GET id di URL
            $id_siswa = $_GET['id_siswa'];
            
            //query ke database SELECT tabel mahasiswa berdasarkan id = $id
            $select = mysqli_query($koneksi, "SELECT * FROM tbl_siswa inner join tbl_jurusan on tbl_siswa.id_jurusan = tbl_jurusan.id_jurusan where id_siswa='$id_siswa'") or die(mysqli_error($koneksi));
            
            //jika hasil query = 0 maka muncul pesan error
            if(mysqli_num_rows($select) == 0){
                echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
                exit();
            //jika hasil query > 0
            }else{
                //membuat variabel $data dan menyimpan data row dari query
                $data = mysqli_fetch_assoc($select);
            }

            $kelas_siswa = $data['kelas_siswa'];
        }
        ?>

             <form action="" method="POST">
                <input type="hidden" name="id_siswa" value="<?php echo $data['id_siswa']; ?>">
                <div class="form-group row">
                    <label for="nis" class="col-sm-2 col-form-label">NIS</label>
                    <div class="col-sm-10"><input type="text" readonly name="nis_siswa" id="nis" class="form-control" value="<?php echo $data['nis_siswa'] ?>"></div>
                </div>
                <div class="form-group row">
                    <label for="nama_siswa" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10"><input type="text" readonly name="nama_siswa" id="nama_siswa" class="form-control" value="<?php echo $data['nama_siswa'] ?>"></div>
                </div>
                <div class="form-group row">
                    <label for="kelas_siswa" class="col-sm-2 col-form-label">Kelas</label>
                    <div class="col">
                        <select name="kelas_siswa" class="form-control">
                        <option value="10" <?php if ($kelas_siswa == '10' ) echo 'selected' ; ?> >10</option>
                        <option value="11" <?php if ($kelas_siswa == '11' ) echo 'selected' ; ?> >11</option>
                        <option value="12" <?php if ($kelas_siswa == '12' ) echo 'selected' ; ?> >12</option>
                    </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama_jurusan" class="col-sm-2 col-form-label">Jurusan</label>
                    <div class="col-sm-10"><input type="text" readonly name="nama_jurusan" id="nama_jurusan" class="form-control" value="<?php echo $data['nama_jurusan'] ?>"></div>
                </div>
                <div class="form-group row">
                    <label for="tahun_ajaran" class="col-sm-2 col-form-label">Tahun Ajaram</label>
                    <div class="col-sm-10"><input type="text" name="tahun_ajaran" id="tahun_ajaran" class="form-control" value="<?php echo $data['tahun_ajaran'] ?>"></div>
                </div>
                <div class="form-group row">
                    <label for="spp_bulan" class="col-sm-2 col-form-label">Spp Bulanan Saat Ini</label>
                    <div class="col-sm-10">
                      <input type="text" readonly="" name="spp_bulan" class="form-control" id="spp_bulan" value="<?php echo $data['spp_bulan'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="total_tagihan" class="col-sm-2 col-form-label">Sisa Tagihan</label>
                    <div class="col-sm-10">
                      <input type="text" readonly="" name="total_tagihan" class="form-control" id="total_tagihan" value="<?php echo $data['total_tagihan'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tagihan_spp" class="col-sm-2 col-form-label">Tagihan SPP Bulanan Baru</label>
                    <div class="col-sm-10">
                      <input type="text" name="tagihan_spp" class="form-control" id="tagihan_spp" placeholder="Ketikan Tagihan SPP Bulanan Yang Baru" required="">
                    </div>
                </div>
                <div>
                    <input type="submit" name="submit" class="btn btn-info">
                    <a href="data_siswa.php" class="btn btn-warning">Kembali</a>
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