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
  <title>Transaksi</title>
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
              <li class="breadcrumb-item active" aria-current="page">Transaksi</li>
            </ol>
          </nav>
          <div>
              <!-- <a href="t_cek.php" class="btn btn-outline-secondary btn-sm">Cek Data Transaksi Siswa</a> -->
              <a href="data_transaksi.php" class="btn btn-outline-secondary btn-sm">Data Transaksi</a>
          </div>
          <br>

            <div>
            <table id="tb_transaksi" class="table table-bordered">
              <thead class="thead-light">
                <tr>
                  <th scope="col">NIS</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Kelas</th>
                  <th scope="col">Jurusan</th>
                  <th scope="col">Tahun Ajaran</th>
                  <th scope="col">Spp Bulanan</th>
                  <th scope="col">Sisa Tagihan</th>
                  <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody> 
              <tr>

                <?php

                    $sql = "SELECT * from tbl_siswa INNER JOIN tbl_jurusan ON tbl_siswa.id_jurusan = tbl_jurusan.id_jurusan"; 
                    $hasil = $koneksi->query($sql);
                    if ($hasil->num_rows > 0) {
                        foreach ($hasil as $row) {
                ?>

              <td><?php echo $row['nis_siswa']; ?></td>
              <td><?php echo $row['nama_siswa']; ?></td>
              <td><?php echo $row['kelas_siswa']; ?></td>
              <td><?php echo $row['nama_jurusan']; ?></td>
              <td><?php echo $row['tahun_ajaran']; ?></td>
              <td><?php echo $row['spp_bulan']; ?></td>
              <td>Rp.<?php echo $row['total_tagihan']; ?></td>
                <?php echo "<td><a href='#myModalBayar' class='badge badge-info' id='custId' data-toggle='modal' data-id=".$row['id_siswa'].">Bayar</a>
                <a href='cek.php?nis_siswa=".$row['nis_siswa']."' class='badge badge-info'>Cek</a>
                </td>"; ?>
              </tr>

              <?php 
                  }
                      } else { 
                            echo "0 results"; 
                      }
                $koneksi->close();
            ?>
            
            </tbody>
            </table>
            </div>

        <!-- modal bayar  -->

        <div class="modal fade" id="myModalBayar" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Pembayaran SPP</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="fetched-data">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                </div>
            </div>
        </div>
    </div>

        <!-- modal cek  -->

        <div class="modal fade" id="myModalCek" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Data Transaksi</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="fetched-data">
                        <?php include 'bayar.php' ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                </div>
            </div>
        </div>
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
    $('#tb_transaksi').DataTable();
} );

</script>
    <script type="text/javascript">
    $(document).ready(function(){
        $('#myModalBayar').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'bayar.php',
                data :  'rowid='+ rowid,
                success : function(data){
                $('.fetched-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });
  </script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

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