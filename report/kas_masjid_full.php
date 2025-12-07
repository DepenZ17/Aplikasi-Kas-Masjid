<?php
include "../inc/koneksi.php";

//FUNGSI RUPIAH
include "../inc/rupiah.php";
?>

<?php
  // Menghitung total pemasukan
  $sql = $koneksi->query("SELECT SUM(masuk) as tot_masuk from kas_masjid where jenis='Masuk'");
  while ($data = $sql->fetch_assoc()) {
    $masuk = $data['tot_masuk'];
  }

  // Menghitung total pengeluaran
  $sql = $koneksi->query("SELECT SUM(keluar) as tot_keluar from kas_masjid where jenis='Keluar'");
  while ($data = $sql->fetch_assoc()) {
    $keluar = $data['tot_keluar'];
  }

  // Menghitung saldo
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
            $no = 1;

            // Mengambil data dari tabel kas_masjid dan tb_pengguna
            $sql_tampil = "SELECT km.*, tp.nama_pengguna FROM kas_masjid km 
                          JOIN tb_pengguna tp ON km.id_pengguna = tp.id_pengguna 
                          ORDER BY km.tgl_km ASC";
            $query_tampil = mysqli_query($koneksi, $sql_tampil);

            // Menampilkan data transaksi
            while ($data = mysqli_fetch_array($query_tampil, MYSQLI_BOTH)) {
        ?>
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php $tgl = $data['tgl_km']; echo date("d/M/Y", strtotime($tgl))?></td> 
            <td><?php echo $data['uraian_km']; ?></td>
            <td align="right"><?php echo rupiah($data['masuk']); ?></td>  
            <td align="right"><?php echo rupiah($data['keluar']); ?></td>
            <td><?php echo $data['nama_pengguna']; ?></td> <!-- Menampilkan nama pencatat -->
        </tr>
        <?php
            $no++;
            }
        ?>
    </tbody>
    <tr>
        <td colspan="3">Total Pemasukan</td>
        <td colspan="3"><?php echo rupiah($masuk); ?></td>
    </tr>
    <tr>
        <td colspan="4">Total Pengeluaran</td>
        <td colspan="2"><?php echo rupiah($keluar); ?></td>
    </tr>
    <tr>
        <td colspan="3">Saldo Kas Masjid</td>
        <td colspan="3"><?php echo rupiah($saldo); ?></td>
    </tr>
  </table>
</center>

<script>
    window.print();
</script>
</body>
</html>
