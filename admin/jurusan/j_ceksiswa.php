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
    <title>Daftar Kelas</title>
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
                <li class="breadcrumb-item active" aria-current="page">Data Siswa</li>
              </ol>
            </nav>

            <div>
            <table id="tb_kelas" class="table table-bordered">
              <thead class="thead-light">
                <tr>
                 <th scope="col">Id</th>
                  <th scope="col">Nis</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Kelas</th>
                  <th scope="col">Jurusan</th>
                  <th scope="col">Tahun Ajaran</th>
                  <th scope="col">Spp Bulan</th>
                  <th scope="col">Sisa Tagihan</th>
                  <!-- <th scope="col">Aksi</th> -->
                </tr>
                </tr>
            </thead>
            <tbody> 
              <tr>
                <?php
                if(isset($_GET['nama_jurusan'])){
                        $nama_jurusan = $_GET['nama_jurusan'];
                    $sql = mysqli_query($koneksi,"SELECT * from tbl_siswa INNER JOIN tbl_jurusan ON tbl_siswa.id_jurusan = tbl_jurusan.id_jurusan where nama_jurusan='$nama_jurusan'") or die(mysqli_error($koneksi));
                }
                //jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
                if(mysqli_num_rows($sql) > 0){
                    //membuat variabel $no untuk menyimpan nomor urut
                    $no = 1;
                    //melakukan perulangan while dengan dari dari query $sql
                    while($data = mysqli_fetch_assoc($sql)){
                        //menampilkan data perulangan
                ?>
                <td><?php echo $data['id_siswa']; ?></td>
                <td><?php echo $data['nis_siswa']; ?></td>
                <td><?php echo $data['nama_siswa']; ?></td>
                <td><?php echo $data['kelas_siswa']; ?></td>
                <td><?php echo $data['nama_jurusan']; ?></td>
                <td><?php echo $data['tahun_ajaran']; ?></td>
                <td>RP.<?php echo $data['spp_bulan']; ?></td>
                <td>Rp.<?php echo $data['total_tagihan']; ?></td>
                <!-- <td><a href="j_cekt.php?nis_siswa=<?php echo $d['nis_siswa'];?>" class="badge badge-info">Cek</a></td> -->
              </tr>
          <?php 
                }
                } else{
                    echo '
                    <tr>
                        <td colspan="8">Tidak Ada Data Siswa.</td>
                    </tr>
                    ';
                }
           ?>
            </tbody>
            </table>
            </div>
        <!-- End Page Content -->
        </div>
    </div>

    <div class="overlay"></div>
    <!-- Popper.JS -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script> -->
    <script type="text/javascript" src="../../assets/js/jquery.mCustomScrollbar.concat.min.js"></script>

     <script type="text/javascript">
  $(document).ready( function () {
    $('#tb_kelas').DataTable();
} );

</script>
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