<?php 
    session_start();
    if(!isset($_SESSION['login'])){
        header('location:../index.php');
    }

    include "../../config/koneksi.php";

    // melakukan pengecekan koneksi
    if ($koneksi->connect_error) {
        die("Connection failed: " . $koneksi->connect_error);
    } 
 
    if($_POST['rowid']) {
        $id_siswa = $_POST['rowid'];
        // mengambil data berdasarkan id
        $sql = "SELECT * FROM tbl_siswa inner join tbl_jurusan on tbl_siswa.id_jurusan = tbl_jurusan.id_jurusan where id_siswa='$id_siswa'";
        $result = $koneksi->query($sql);
        foreach ($result as $baris) { ?>
            <!-- coba jadi 1 form -->
            <p>
              <button class="btn btn-outline-info" type="button" data-toggle="collapse" data-target="#bln_1" aria-expanded="false" aria-controls="bln_1">1 Bulan</button>
              <button class="btn btn-outline-info" type="button" data-toggle="collapse" data-target="#bln_2" aria-expanded="false" aria-controls="bln_2">2 Bulan</button>
              <button class="btn btn-outline-info" type="button" data-toggle="collapse" data-target="#bln_3" aria-expanded="false" aria-controls="bln_3">3 Bulan</button>
            </p>


            <form action="bayara.php" method="POST">
            <input type="hidden" name="id_siswa" value="<?php echo $baris['id_siswa']; ?>">
            <input type="hidden" name="nis_siswa" value="<?php echo $baris['nis_siswa']; ?>">
            <input type="hidden" name="nama_siswa" value="<?php echo $baris['nama_siswa']; ?>">
            <input type="hidden" name="kelas_siswa" value="<?php echo $baris['kelas_siswa']; ?>">
            <input type="hidden" name="nama_jurusan" value="<?php echo $baris['nama_jurusan']; ?>">
            <input type="hidden" name="tahun_ajaran" value="<?php echo $baris['tahun_ajaran']; ?>">
            <input type="hidden" name="spp_bulan" value="<?php echo $baris['spp_bulan']; ?>">
            <input type="hidden" name="total_tagihan" value="<?php echo $baris['total_tagihan']; ?>">


            <!-- bayar 1 bulan -->
            <div class="collapse" id="bln_1">
              <div class="form-group">
                <input type="hidden" name="jumlah_bulan" value="1">
                <label for="input_bulan">Bulan</label>
                <select class="form-control" name="bulan1" required oninvalid="this.setCustomValidity('Pilih bulan yang akan dibayar.')" oninput="setCustomValidity('')">
                    <option value="">- Pilih Bulan -</option>
                    <option value="Januari">Januari</option>        <option value="Febuari">Febuari</option>
                    <option value="Maret">Maret</option>            <option value="April">April</option>
                    <option value="Mei">Mei</option>                <option value="Juni">Juni</option>
                    <option value="Juli">Juli</option>              <option value="Agustus">Agustus</option>
                    <option value="September">September</option>    <option value="Oktober">Oktober</option>
                    <option value="November">November</option>      <option value="Desember">Desember</option>
                </select>
            </div>
            <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-outline-info" value="Bayar">
            </div>
            </div>
            </form>
            <!-- bayar 2 bulan -->
            <form action="bayara.php" method="POST">
            <input type="hidden" name="id_siswa" value="<?php echo $baris['id_siswa']; ?>">
            <input type="hidden" name="nis_siswa" value="<?php echo $baris['nis_siswa']; ?>">
            <input type="hidden" name="nama_siswa" value="<?php echo $baris['nama_siswa']; ?>">
            <input type="hidden" name="kelas_siswa" value="<?php echo $baris['kelas_siswa']; ?>">
            <input type="hidden" name="nama_jurusan" value="<?php echo $baris['nama_jurusan']; ?>">
            <input type="hidden" name="tahun_ajaran" value="<?php echo $baris['tahun_ajaran']; ?>">
            <input type="hidden" name="spp_bulan" value="<?php echo $baris['spp_bulan']; ?>">
            <input type="hidden" name="total_tagihan" value="<?php echo $baris['total_tagihan']; ?>">
            <!-- bayar 2 bulan -->
            <div class="collapse" id="bln_2">
              <div class="form-group">
                <input type="hidden" name="jumlah_bulan" value="2">
                <label for="input_bulan">Bulan</label>
                <select class="form-control" name="bulan1" required oninvalid="this.setCustomValidity('Pilih bulan yang akan dibayar.')" oninput="setCustomValidity('')">
                    <option value="">- Pilih Bulan -</option>
                    <option value="Januari">Januari</option>        <option value="Febuari">Febuari</option>
                    <option value="Maret">Maret</option>            <option value="April">April</option>
                    <option value="Mei">Mei</option>                <option value="Juni">Juni</option>
                    <option value="Juli">Juli</option>              <option value="Agustus">Agustus</option>
                    <option value="September">September</option>    <option value="Oktober">Oktober</option>
                    <option value="November">November</option>      <option value="Desember">Desember</option>
                </select>
            </div>
            <div class="form-group">
                <select class="form-control" name="bulan2" required oninvalid="this.setCustomValidity('Pilih bulan yang akan dibayar.')" oninput="setCustomValidity('')">
                    <option value="">- Pilih Bulan -</option>
                    <option value="Januari">Januari</option>        <option value="Febuari">Febuari</option>
                    <option value="Maret">Maret</option>            <option value="April">April</option>
                    <option value="Mei">Mei</option>                <option value="Juni">Juni</option>
                    <option value="Juli">Juli</option>              <option value="Agustus">Agustus</option>
                    <option value="September">September</option>    <option value="Oktober">Oktober</option>
                    <option value="November">November</option>      <option value="Desember">Desember</option>
                </select>
            </div>
            <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-outline-info" value="Bayar">
            </div>
            </div>
            </form>

            <!-- bayar 3 bulan -->
            <form action="bayara.php" method="POST">
            <input type="hidden" name="id_siswa" value="<?php echo $baris['id_siswa']; ?>">
            <input type="hidden" name="nis_siswa" value="<?php echo $baris['nis_siswa']; ?>">
            <input type="hidden" name="nama_siswa" value="<?php echo $baris['nama_siswa']; ?>">
            <input type="hidden" name="kelas_siswa" value="<?php echo $baris['kelas_siswa']; ?>">
            <input type="hidden" name="nama_jurusan" value="<?php echo $baris['nama_jurusan']; ?>">
            <input type="hidden" name="tahun_ajaran" value="<?php echo $baris['tahun_ajaran']; ?>">
            <input type="hidden" name="spp_bulan" value="<?php echo $baris['spp_bulan']; ?>">
            <input type="hidden" name="total_tagihan" value="<?php echo $baris['total_tagihan']; ?>">
            <!-- bayar 3 bulan -->
            <div class="collapse" id="bln_3">
              <div class="form-group">
                <input type="hidden" name="jumlah_bulan" value="3">
                <label for="input_bulan">Bulan</label>
                <select class="form-control" name="bulan1" required oninvalid="this.setCustomValidity('Pilih bulan yang akan dibayar.')" oninput="setCustomValidity('')">
                    <option value="">- Pilih Bulan -</option>
                    <option value="Januari">Januari</option>        <option value="Febuari">Febuari</option>
                    <option value="Maret">Maret</option>            <option value="April">April</option>
                    <option value="Mei">Mei</option>                <option value="Juni">Juni</option>
                    <option value="Juli">Juli</option>              <option value="Agustus">Agustus</option>
                    <option value="September">September</option>    <option value="Oktober">Oktober</option>
                    <option value="November">November</option>      <option value="Desember">Desember</option>
                </select>
            </div>
            <div class="form-group">
                <select class="form-control" name="bulan2" required oninvalid="this.setCustomValidity('Pilih bulan yang akan dibayar.')" oninput="setCustomValidity('')">
                    <option value="">- Pilih Bulan -</option>
                    <option value="Januari">Januari</option>        <option value="Febuari">Febuari</option>
                    <option value="Maret">Maret</option>            <option value="April">April</option>
                    <option value="Mei">Mei</option>                <option value="Juni">Juni</option>
                    <option value="Juli">Juli</option>              <option value="Agustus">Agustus</option>
                    <option value="September">September</option>    <option value="Oktober">Oktober</option>
                    <option value="November">November</option>      <option value="Desember">Desember</option>
                </select>
            </div>
            <div class="form-group">
                <select class="form-control" name="bulan3" required oninvalid="this.setCustomValidity('Pilih bulan yang akan dibayar.')" oninput="setCustomValidity('')">
                    <option value="">- Pilih Bulan -</option>
                    <option value="Januari">Januari</option>        <option value="Febuari">Febuari</option>
                    <option value="Maret">Maret</option>            <option value="April">April</option>
                    <option value="Mei">Mei</option>                <option value="Juni">Juni</option>
                    <option value="Juli">Juli</option>              <option value="Agustus">Agustus</option>
                    <option value="September">September</option>    <option value="Oktober">Oktober</option>
                    <option value="November">November</option>      <option value="Desember">Desember</option>
                </select>
            </div>
            <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-outline-info" value="Bayar">
            </div>
            </div>
            </form>
        <?php 
 
        }
    }
    $koneksi->close();
 ?>