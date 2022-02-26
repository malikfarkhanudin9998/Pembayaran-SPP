
<table id="tbl_dtsiswa" class="table table-bordered">
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
				<?php

				include "../../config/koneksi.php";
				
				 $action = $_REQUEST['action'];
     			 if($action == "show-all"){

     				  $sql = mysqli_query($koneksi,"SELECT * from tbl_siswa INNER JOIN tbl_jurusan ON tbl_siswa.id_jurusan = tbl_jurusan.id_jurusan where nama_jurusan='$nama_jurusan'") or die(mysqli_error($koneksi));
      
        			}
      				else{

     			 $sql =  mysqli_query($koneksi,"SELECT * FROM tbl_siswa INNER JOIN tbl_jurusan ON tbl_siswa.id_jurusan = tbl_jurusan.id_jurusan WHERE kelas_siswa='$action' order by nis_siswa DESC");
     
       				 }
       				 
					$no = 1;
					//melakukan perulangan while dengan dari dari query $sql
					while($data = mysqli_fetch_assoc($sql)){

						
						?>

					
						
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $data['nis_siswa']; ?></td>
							<td><?php echo $data['nama_siswa']; ?></td>
							<td><?php echo $data['kelas_siswa']; ?></td>
							<td><?php echo $data['nama_jurusan']; ?></td>
			                <td><?php echo $data['tahun_ajaran']; ?></td>
			                <td>RP.<?php echo $data['spp_bulan']; ?></td>
			                <td>Rp.<?php echo $data['total_tagihan']; ?></td>
						</tr>
						
						<?php
						$no++;
						}
			
						?>
			
			</tbody>
		</table>

		<script type="text/javascript">

		$(document).ready(function(){

		$('#tbl_dtsiswa').DataTable();         

         });

		</script>