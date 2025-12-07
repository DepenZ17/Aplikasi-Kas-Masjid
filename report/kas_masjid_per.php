<?php
    include "../inc/koneksi.php";
    //FUNGSI RUPIAH
    include "../inc/rupiah.php";

    $dt1 = $_POST["tgl_1"];
    $dt2 = $_POST["tgl_2"];
?>

<?php
  // Menghitung total pemasukan dalam rentang tanggal yang dipilih
  $sql = $koneksi->query("SELECT SUM(masuk) as tot_masuk FROM kas_masjid WHERE jenis='Masuk' AND tgl_km BETWEEN '$dt1' AND '$dt2'");
  while ($data= $sql->fetch_assoc()) {
    $masuk = $data['tot_masuk'];
  }

  // Menghitung total pengeluaran dalam rentang tanggal yang dipilih
  $sql = $koneksi->query("SELECT SUM(keluar) as tot_keluar FROM kas_masjid WHERE jenis='Keluar' AND tgl_km BETWEEN '$dt1' AND '$dt2'");
  while ($data= $sql->fetch_assoc()) {
    $keluar = $data['tot_keluar'];
  }

  // Menghitung saldo kas masjid
  $saldo = $masuk - $keluar;
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Laporan Kas Masjid</title>
</head>
<body>
<center>
<h2>Laporan Rekapitulasi Kas Masjid</h2>
<h3>Masjid Darul Ilmi</h3>
<p>Periode : <?php echo date("d-M-Y", strtotime($dt1)); ?> s/d <?php echo date("d-M-Y", strtotime($dt2)); ?></p>
<p>________________________________________________________________________</p>

  <table border="1" cellspacing="0">
    <thead>
      <tr>
            <th>No.</th>
            <th>Tanggal</th>
            <th>Uraian</th>
            <th>Pemasukan</th>
            <th>Pengeluaran</th>
            <th>Pencatat</th> 
      </tr>
    </thead>
    <tbody>
        <?php
        if(isset($_POST["btnCetak"])){
            // Query untuk menampilkan data dengan informasi pencatat
            $sql_tampil = "SELECT km.*, tp.nama_pengguna 
                          FROM kas_masjid km 
                          JOIN tb_pengguna tp ON km.id_pengguna = tp.id_pengguna 
                          WHERE tgl_km BETWEEN '$dt1' AND '$dt2' 
                          ORDER BY tgl_km ASC";
            }
            
            $query_tampil = mysqli_query($koneksi, $sql_tampil);
            $no = 1;
            
            // Loop untuk menampilkan data
            while ($data = mysqli_fetch_array($query_tampil, MYSQLI_BOTH)) {
        ?>
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo date("d/M/Y", strtotime($data['tgl_km'])); ?></td> 
            <td><?php echo $data['uraian_km']; ?></td>
            <td align="right"><?php echo rupiah($data['masuk']); ?></td>  
            <td align="right"><?php echo rupiah($data['keluar']); ?></td>   
            <td><?php echo $data['nama_pengguna']; ?></td> 
        </tr>
        <?php
            $no++;
            }
        ?>
    </tbody>
    <tr>
        <td colspan="3">Total Pemasukan</td>
        <td colspan="2"><?php echo rupiah($masuk); ?></td>
        <td></td> <!-- Kolom tambahan -->
    </tr>
    <tr>
        <td colspan="4">Total Pengeluaran</td>
        <td><?php echo rupiah($keluar); ?></td>
        <td></td> <!-- Kolom tambahan -->
    </tr>
    <tr>
        <td colspan="3">Saldo Kas Masjid</td>
        <td colspan="2"><?php echo rupiah($saldo); ?></td>
        <td></td> <!-- Kolom tambahan -->
    </tr>
  </table>
</center>

<script>
    window.print();
</script>
</body>
</html>
