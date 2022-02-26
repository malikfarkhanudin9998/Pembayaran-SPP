<?php
include "../../config/koneksi.php";
require_once("../../assets/dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();
if(isset($_GET['id_transaksi'])){
    $id_transaksi = $_GET['id_transaksi'];
     $data = mysqli_query($koneksi,"SELECT * FROM tbl_transaksi where id_transaksi='$id_transaksi'");
            }
$html = '<center>
        <p style="font-size: 19px;">Tanda Bukti Pembayaran SPP<br>
        SMK Negeri 1 Gunung Putri</p>
        <hr>
        </center>';
$html .= '<center><table width="60%">';
while ($d = mysqli_fetch_array($data)) {
    $html .= "
        <tr>
            <td>Id transaksi</td>
            <td>: ".$d['id_transaksi']."</td>
        </tr>
        <tr>
            <td>Tanggal transaksi</td>
            <td>: ".$d['tgl_transaksi']."</td>
        </tr>
        <tr>
            <td>Jumlah Bulan</td>
            <td>: ".$d['jumlah_bulan']."</td>
        </tr>
        <tr>
            <td>Bulan transaksi</td>
            <td>: ".$d['bulan_transaksi']."</td>
        </tr>
        <tr>
            <td>Nis</td>
            <td>: ".$d['nis_siswa']."</td>
        </tr>
         <tr>
            <td>Nama</td>
            <td>: ".$d['nama_siswa']."</td>
        </tr>
        <tr>
            <td>Kelas</td>
            <td>: ".$d['kelas_siswa']."</td>
        </tr>
        <tr>
            <td>Jurusan</td>
            <td>: ".$d['nama_jurusan']."</td>
        </tr>
        <tr>
            <td>Tahun Ajaran</td>
            <td>: ".$d['tahun_ajaran']."</td>
        </tr>
        <tr>
            <td>Spp Per Bulan</td>
            <td>: ".$d['spp_bulan']."</td>
        </tr>
        <tr>
            <td>Sisa Tagihan</td>
            <td>: ".$d['total_tagihan']."</td>
        </tr>
    ";
}
$html .= '</table></center>
    <p>*Harap Disimpan Sebagai Bukti Pembayaran Yang Sah</p>
    <p style="float: right;">';
$html .= "Wanaherang, " . date("d/m/Y");
$html .= '<br>Tata Usaha</p>
    <br><br><br><br>
    <p style="float: right;">(__________________)</p</html>';
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('transaksi_'.$id_transaksi.'.pdf');
?>