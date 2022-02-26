<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<?php 
        include 'layout/sa_head.php';
     ?>
</head>
<body>
	<div id="login-admin">
	<div class="container">
        <div class="row justify-content-center align-items-center" style="height:100vh">
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                    	<div class="d-flex justify-content-center">
                    	<img src="../assets/image/1.png">
                    	<br>
                        </div>
                        <br>
                    	<!-- <h4 class="text-center">Administrator</h4> -->
                    	<?php
					            if(isset($_GET['pesan']) ) {
					                if($_GET['pesan']=="gagal"){
					                    echo '<script>alert("Username & Password Tidak Sesuai."); document.location="index.php";</script>';
					                }
					            }
					    ?>
                        <form action="cek_login.php" method="POST">
  						<div class="form-group">
						<input type="text" name="username" class="form-control" placeholder="Username">
				  		</div>
		  				<div class="form-group">
						<input type="password" name="password" class="form-control" placeholder="Password">
			  			</div>
				  		<div class="text-center">
				  		<button type="submit" class="btn btn-info btn-block">Login</button>
	  					</div>
						</form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src='js/bootstrap.min.js'></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>