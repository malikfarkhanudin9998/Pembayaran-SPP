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
	<title>Laporan</title>
	<?php 
        include '../layout/lap_head.php';
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
                <li class="breadcrumb-item active" aria-current="page">Laporan Pembayaran</li>
              </ol>
            </nav>

            <div>
            <table id="tb_transaksi" class="table table-bordered">
              <thead class="thead-light">
                <tr>
                 <th scope="col">Id Transaksi</th>
                  <th scope="col">Tanggal Transaksi</th>
                  <th scope="col">Jumlah Bulan</th>
                  <th scope="col">Bulan Transaksi</th>
                  <th scope="col">Nis</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Kelas</th>
                  <th scope="col">Jurusan</th>
                </tr>
            </thead>
            <tbody> 
              <tr>
                <?php
                    $data = mysqli_query($koneksi, "SELECT id_transaksi, tgl_transaksi, jumlah_bulan, bulan_transaksi, bulan_transaksi, nis_siswa, nama_siswa, kelas_siswa, nama_jurusan from tbl_transaksi");
                    while ($d = mysqli_fetch_array($data)) {
                ?>
                <td><?php echo $d['id_transaksi']; ?></td>
                <td><?php echo $d['tgl_transaksi']; ?></td>
                <td><?php echo $d['jumlah_bulan']; ?></td>
                <td><?php echo $d['bulan_transaksi']; ?></td>
                <td><?php echo $d['nis_siswa']; ?></td>
                <td><?php echo $d['nama_siswa']; ?></td>
                <td><?php echo $d['kelas_siswa']; ?></td>
                <td><?php echo $d['nama_jurusan']; ?></td>
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

<!--     <script type="text/javascript">
    $('#tb_transaksi').dataTable( {
    "order": [ 0, 'desc' ]
    } );
    </script> -->
<script type="text/javascript">
    $(document).ready(function() {
    //filter
    $('#tb_transaksi thead tr').clone(true).appendTo( '#tb_transaksi thead' );
    $('#tb_transaksi thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Filter" size="7"/>' );
 
        $( 'input', this ).on( 'keyup change', function () {
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
    } );
    //export
    var printCounter = 0; 
    var table = $('#tb_transaksi').DataTable( {
        "order": [ 0, 'desc' ],
        orderCellsTop: true,
        fixedHeader: true,
        dom: 'Bfrtip',
        buttons: [
            'copy',
            {
                extend: 'excel',
                title: 'Laporan Pembayaran SPP',
                messageTop: 'SMK Negeri 1 Gunung Putri',
            },
            {
                extend: 'pdf',
                title: 'Laporan Pembayaran SPPt',
                messageTop: 'SMK Negeri 1 Gunung Putri',
                messageBottom: null
            },
            {
                extend: 'print',
                title: 'Laporan Pembayaran SPP',
                messageTop: function () {
                    printCounter++;
 
                    if ( printCounter === 1 ) {
                        return 'This is the first time you have printed this document.';
                    }
                    else {
                        return 'You have printed this document '+printCounter+' times';
                    }
                },
                messageBottom: null
            }
        ]
    } );
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