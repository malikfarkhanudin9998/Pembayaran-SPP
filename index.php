<!DOCTYPE html>
<html>
<head>
	<title>Pencarian Data SPP</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="assets/css/head.css">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<script src='assets/js/bootstrap.min.js'></script>
	<script src='assets/js/jquery.min.js'></script>
	<!-- datatables
	<link rel="stylesheet" type="text/css" href="../assets/css/dataTables.bootstrap4.css">
    <script type="text/javascript" src="../assets/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../assets/js/dataTables.bootstrap4.min.js"></script> -->
</head>
<body>
	
	<!-- Header -->
	<div class="banner">
		<div class="container">
			<div class="banner-text">
				<div class="banner-heading">
					<h1>SMK N 1 Gunung Putri</h1>
					<hr id="head">
				</div>
			<div class="row">
				<div class="col-sm-8 mx-auto">
					<form action="index.php" method="GET">
						<div class="input-group mb-3">
							<input type="text" name="cari" class="form-control" placeholder="Masukan NIS atau Nama" aria-label="Masukan NIS atau Nama" aria-describedby="button-addon2">
							<div class="input-group-append">
								<button class="btn btn-light" type="submit" id="button-addon2" value="Cari">Cari</button>
							</div>
						</div>
					</form>
					</div>
				</div>
			</div>
		</div>
	</div>

		<br><br>

		<!-- Content -->

		<div class="container">
		<div class="row">
		<table id="tb_siswa" class="table table-bordered">
		<thead class="thead-light">
		<tr>
			<th scope="col">NIS</th>
            <th scope="col">Nama</th>
            <th scope="col">Kelas</th>
            <th scope="col">Jurusan</th>
            <th scope="col">Tahun Ajaran</th>
            <th scope="col">SPP Per Bulan</th>
            <th scope="col">Sisa Tagihan</th>
		</tr>
		</thead>
		<tbody>
		<?php
			include "config/koneksi.php";
			if(isset($_GET['cari'])){
			  $cari = $_GET['cari'];
			  $sql = mysqli_query($koneksi, "SELECT * from tbl_siswa where nama_siswa like '%".$cari."%'") or die(mysqli_error($koneksi));
				if(mysqli_num_rows($sql) > 0){
					while($data = mysqli_fetch_assoc($sql)){
						echo '
						<tr>
							<td>'.$data['nis_siswa'].'</td>
							<td>'.$data['nama_siswa'].'</td>
							<td>'.$data['kelas_siswa'].'</td>
							<td>'.$data['id_jurusan'].'</td>
							<td>'.$data['tahun_ajaran'].'</td>
							<td>'.$data['spp_bulan'].'</td>
							<td>'.$data['total_tagihan'].'</td>
						</tr>
						';
					}
				//jika query menghasilkan nilai 0
				}else{
					echo '
					<tr>
						<td colspan="6">Tidak ada data.</td>
					</tr>
					';
				}
			}
		?>
		</tbody>
		</table>
		</div>
		</div>
		<br>
		<br>

	<!-- Footer -->
		<footer class="footer" style="background-color: #1D1D1D; padding: 5px;">
		<div class="container">
			<span>
					<div class="text-center" >
					<h5 style="color: #ffff; padding-top: 3px;">&copy; SMK N 1 Gunung Putri 2019</h5>
					</div>
				</span>
		</div>
		</footer>
	<script type="text/javascript">
      $(document).ready( function () {
        $('#tb_siswa').dataTable( {
          "order": [ 1, 'asc' ]
        } );
      } );
    </script>
</body>
</html>