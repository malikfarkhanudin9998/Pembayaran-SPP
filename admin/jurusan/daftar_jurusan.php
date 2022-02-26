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
                <li class="breadcrumb-item active" aria-current="page">Jurusan</li>
              </ol>
            </nav>

            <div>
              <a href="tambah_jurusan.php" class="btn btn-outline-secondary btn-sm">Tambah Jurusan</a>
            </div>
            <br>

            <div>
            <table id="tb_kelas" class="table table-bordered">
              <thead class="thead-light">
                <tr>
                 <!-- <th scope="col">No.</th> -->
                  <th scope="col">ID</th>
                  <th scope="col">Nama Jurusan</th>
                  <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                  $data = mysqli_query($koneksi,"SELECT * from tbl_jurusan");
                  while($d = mysqli_fetch_array($data)){
                 ?>
              <tr>
                <td><?php echo $d['id_jurusan']; ?></td>
                  <td><?php echo $d['nama_jurusan']; ?></td>
                  <td><a href="j_edit.php?id_jurusan=<?php echo $d['id_jurusan'];?>" class="badge badge-warning">Edit</a>
                      | <a href="j_ceksiswa.php?nama_jurusan=<?php echo $d['nama_jurusan'];?>" class="badge badge-info">Cek Siswa</a>
                    <!-- |
                    <a onclick="return confirm('Yakin ingin menghapus data ini?')" href="k_delete.php?id_jurusan=<?php echo $d['id_jurusan']; ?>"> Hapus </a> -->
                </td>
              </tr>
        <?php } ?>
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