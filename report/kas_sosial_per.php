<?php
include "../inc/koneksi.php";
//FUNGSI RUPIAH
include "../inc/rupiah.php";

$dt1 = $_POST["tgl_1"];
$dt2 = $_POST["tgl_2"];
?>

<?php
// Menghitung total pemasukan dalam rentang tanggal tertentu
$sql = $koneksi->query("SELECT SUM(masuk) as tot_masuk from kas_sosial where jenis='Masuk' and tgl_ks BETWEEN '$dt1' AND '$dt2'");
while ($data = $sql->fetch_assoc()) {
    $masuk = $data['tot_masuk'];
}

// Menghitung total pengeluaran dalam rentang tanggal tertentu
$sql = $koneksi->query("SELECT SUM(keluar) as tot_keluar from kas_sosial where jenis='Keluar' and tgl_ks BETWEEN '$dt1' AND '$dt2'");
while ($data = $sql->fetch_assoc()) {
    $keluar = $data['tot_keluar'];
}

// Menghitung saldo
$saldo = $masuk - $keluar;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Laporan Kas Sosial</title>
</head>
<body>
<center>
<h2>Laporan Rekapitulasi Kas Sosial</h2>
<h3>Masjid Darul Ilmi</h3>
<p>Periode : <?php $a=$dt1; echo date("d-M-Y", strtotime($a))?> s/d <?php $b=$dt2; echo date("d-M-Y", strtotime($b))?>
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
    if (isset($_POST["btnCetak"])) {

        // Menampilkan data transaksi dalam rentang tanggal tertentu
        $sql_tampil = "SELECT ks.*, tp.nama_pengguna 
                    FROM kas_sosial ks 
                    JOIN tb_pengguna tp ON ks.id_pengguna = tp.id_pengguna 
                    WHERE tgl_ks BETWEEN '$dt1' AND '$dt2' 
                    ORDER BY tgl_ks ASC";
    }
    $query_tampil = mysqli_query($koneksi, $sql_tampil);
    $no = 1;
    while ($data = mysqli_fetch_array($query_tampil, MYSQLI_BOTH)) {
        ?>
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php $tgl = $data['tgl_ks']; echo date("d/M/Y", strtotime($tgl)) ?></td>
            <td><?php echo $data['uraian_ks']; ?></td>
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
        <td colspan="2"><?php echo rupiah($masuk); ?></td>
        <td></td> <!-- Kolom tambahan -->
    </tr>
    <tr>
        <td colspan="4">Total Pengeluaran</td>
        <td><?php echo rupiah($keluar); ?></td>
        <td></td> <!-- Kolom tambahan -->
    </tr>
    <tr>
        <td colspan="3">Saldo Kas Sosial</td>
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
