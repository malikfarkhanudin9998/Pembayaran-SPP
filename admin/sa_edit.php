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
	<title>Edit Admin</title>
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
              <li class="breadcrumb-item"><a href="sa_da.php">Daftar Admin</a></li>
              <li class="breadcrumb-item active" aria-current="page">Edit Admin</li>
            </ol>
          </nav>
            <?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['id_admin'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$id_admin = $_GET['id_admin'];
			
			//query ke database SELECT tabel mahasiswa berdasarkan id = $id
			$select = mysqli_query($koneksi, "SELECT * FROM tbl_admin WHERE id_admin='$id_admin'") or die(mysqli_error($koneksi));
			
			//jika hasil query = 0 maka muncul pesan error
			if(mysqli_num_rows($select) == 0){
				echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
				exit();
			//jika hasil query > 0
			}else{
				//membuat variabel $data dan menyimpan data row dari query
				$data = mysqli_fetch_assoc($select);
			}

			$level = $data['level'];
		}
		?>
		
		<?php
		//jika tombol simpan di tekan/klik
		if(isset($_POST['submit'])){
			$id_admin			= $_POST['id_admin'];
			$nama			= $_POST['nama'];
			$username	= $_POST['username'];
			$password		= $_POST['password'];
			$level		= $_POST['level'];
			
			$sql = mysqli_query($koneksi, "UPDATE tbl_admin SET nama='$nama', username='$username', password='$password',level='$level' WHERE id_admin ='$id_admin'") or die(mysqli_error($koneksi));
			
			if($sql){
				echo '<script>alert("Berhasil melakukan edit data."); document.location="sa_da.php";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>
		<form action="" method="post">
			<input type="hidden" name="id_admin" class="form-control" size="4" value="<?php echo $data['id_admin']; ?>">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama</label>
				<div class="col-sm-10">
					<input type="text" name="nama" class="form-control" size="4" value="<?php echo $data['nama']; ?>" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Username</label>
				<div class="col-sm-10">
					<input type="username" name="username" class="form-control" value="<?php echo $data['username']; ?>" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Password</label>
				<div class="col-sm-10">
					<input type="password" name="password" class="form-control" value="<?php echo $data['password']; ?>" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Level</label>
				<div class="col-sm-10">
					
	              <div class="radio">
	                <!-- <label><input type="radio" name="level" value="admin" 
	                <?php if ($level == 'admin') { echo "checked"; }?>> Admin</label> -->
	                <div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="level" id="admin" value="admin" 
	                	<?php if ($level == 'admin') { echo "checked"; }?>>
					  <label class="form-check-label" for="admin">Admin</label>
					</div>
					<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="level" id="super_admin" value="super_admin"
		                <?php if ($level == 'super_admin') { echo "checked"; }?>>
					  <label class="form-check-label" for="super_admin">Super Admin</label>
					</div>
	              </div>
		             <!-- <div class="radio">
		                <label><input type="radio" name="level" value="super_admin"
		                <?php if ($level == 'super_admin') { echo "checked"; }?>> Super Admin</label>
		             </div> -->
				</div>
			</div>
			<div class="form-group">
					<input type="submit" name="submit" class="btn btn-info" value="Simpan">
					<a href="sa_da.php" class="btn btn-warning">Kembali</a>
			</div>
		</form>
        </div>
        <!-- End Page Content -->
    </div>

    <div class="overlay"></div>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
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