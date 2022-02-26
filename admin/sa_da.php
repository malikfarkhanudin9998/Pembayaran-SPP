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
	<title>Data Admin</title>
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
              <li class="breadcrumb-item active" aria-current="page">Daftar Admin</li>
            </ol>
          </nav>
          <div>
              <a href="sa_tambah.php" class="btn btn-outline-secondary btn-sm">Tambah Admin</a>
            </div>
            <br>
            <div>
            <table id="tb_transaksi" class="table table-bordered">
              <thead class="thead-light">
                <tr>
                    <th>NO.</th>
                    <th>ID Admin </th>
                    <th>Nama </th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Level</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //query ke database SELECT tabel mahasiswa urut berdasarkan id yang paling besar
                $sql = mysqli_query($koneksi, "SELECT * FROM tbl_admin ORDER BY id_admin ASC") or die(mysqli_error($koneksi));
                //jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
                if(mysqli_num_rows($sql) > 0){
                    //membuat variabel $no untuk menyimpan nomor urut
                    $no = 1;
                    //melakukan perulangan while dengan dari dari query $sql
                    while($data = mysqli_fetch_assoc($sql)){
                        //menampilkan data perulangan
                        echo '
                        <tr>
                            <td>'.$no.'</td>
                            <td>'.$data['id_admin'].'</td>
                            <td>'.$data['nama'].'</td>
                            <td>'.$data['username'].'</td>
                            <td>'.$data['password'].'</td>
                            <td>'.$data['level'].'</td>
                            <td>
                                <a href="sa_edit.php?id_admin='.$data['id_admin'].'" class="badge badge-warning">Edit</a>
                                <a href="sa_delete.php?id_admin='.$data['id_admin'].'" class="badge badge-danger" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
                            </td>
                        </tr>
                        ';
                        $no++;
                    }
                //jika query menghasilkan nilai 0
                }else{
                    echo '
                    <tr>
                        <td colspan="6">Tidak ada data.</td>
                    </tr>
                    ';
                }
                ?>
            <tbody>
        </table>
            </div>
        </div>
        <!-- End Page Content -->
    </div>

    <div class="overlay"></div>
    <!-- Popper.JS -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script> -->
    <script type="text/javascript" src="../assets/js/jquery.mCustomScrollbar.concat.min.js"></script>

  <script type="text/javascript">
  $(document).ready( function () {
    $('#tb_transaksi').DataTable();
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