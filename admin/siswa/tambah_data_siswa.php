<?php 
    session_start();
    if(!isset($_SESSION['login'])){
        header('location:../index.php');
    }

    include "../../config/koneksi.php";
        
    if(isset($_POST['submit'])){

    $nis_siswa = $_POST['nis_siswa'];
    $nama_siswa = $_POST['nama_siswa'];
    $kelas_siswa = $_POST['kelas_siswa'];
    $nama_jurusan = $_POST['nama_jurusan'];
    $tahun_ajaran = $_POST['tahun_ajaran'];
    $spp_bulan = $_POST['spp_bulan'];
    $total_tagihan = $spp_bulan * 12;

    // $sql = "SELECT id_siswa as maxid FROM tbl_siswa order by id_siswa desc";    
    // $hasil = mysqli_query($koneksi,$sql);
    // $data  = mysqli_fetch_array($hasil);
    // $id_siswa = $data['maxid'];
    // $noUrut = (int) substr($id_siswa, 2);
    // $noUrut++;

    // $char = "Sw_";
    // $newID = $char . sprintf("%03s", $noUrut);

    $cek = mysqli_query($koneksi, "SELECT * FROM tbl_siswa WHERE nis_siswa = '$nis_siswa'") or die(mysqli_error($koneksi));

    if (mysqli_num_rows($cek) == 0) {

    $sql = mysqli_query($koneksi, "INSERT into tbl_siswa values ('','$nis_siswa','$nama_siswa','$kelas_siswa','$nama_jurusan','$tahun_ajaran', '$spp_bulan', '$total_tagihan')") or die(mysqli_error($koneksi));
    if($sql){
        echo '<script>alert("Berhasil menambahkan data siswa.");
        document.location="data_siswa.php";</script>';
        }else{
         echo '<script>alert("Gagal menambahkan data siswa.");
         document.location="data_siswa.php";</script>';
        }
    } else{
        echo '<script>alert("Nis Sudah Terdaftar.");
         document.location="data_siswa.php";</script>';
    }
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Tambah Data Siswa</title>
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
                <li class="breadcrumb-item active" aria-current="page">Tambah Data Siswa</li>
              </ol>
            </nav>
<!--             <h3>Tambah Data Siswa</h3>
            <hr> -->

             <form action="" method="POST">
                <div class="form-group">
                    <input type="text" name="nis_siswa" class="form-control"placeholder="NIS">
                </div>
                  <div class="form-group">
                    <input type="text" name="nama_siswa" class="form-control" placeholder="Nama" required="">
                  </div>
                <div class="form-row">    
                <div class="form-group col">
                    <select name="kelas_siswa" class="form-control" required="">
                        <option>- Kelas -</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>
                </div>
                <div class="form-group col">
                  <select name="nama_jurusan" class="form-control" required="">
                    <option value="" selected>- Pilih Jurusan -</option>
                      <?php
                    $data = mysqli_query($koneksi,"select * from tbl_jurusan order by nama_jurusan ASC");
                    while($d = mysqli_fetch_array($data)){
                        ?>
                        <option value="<?php echo $d['id_jurusan']; ?>"><?php echo $d['nama_jurusan']; ?></option>
                        <?php } ?>
                  </select>
                </div>
                </div>
                <div class="form-group">
                  <input type="text" name="tahun_ajaran" class="form-control" value="<?php echo date("Y") . "/".date("Y", strtotime("+1 year")) ?>" readonly>
                </div>
                <div class="form-group">
                    <input type="text" name="spp_bulan" class="form-control" placeholder="Tagihan SPP Bulanan" required="">
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                      <input type="submit" name="submit" class="btn btn-info">
                      <a href="data_siswa.php" class="btn btn-warning">Kembali</a>
                    </div>
                </div>
                <!-- <div>
                    <input type="submit" name="submit" class="btn btn-info">
                </div> -->
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