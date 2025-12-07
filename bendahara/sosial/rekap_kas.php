<?php
// Mengambil total pemasukan (masuk) dari tabel kas_sosial berdasarkan jenis='Masuk'
$sql = $koneksi->query("SELECT SUM(masuk) as tot_masuk FROM kas_sosial WHERE jenis='Masuk'");
$masuk = $sql->fetch_assoc()['tot_masuk'] ?? 0; // Jika tidak ada data, set 0

// Mengambil total pengeluaran (keluar) dari tabel kas_sosial berdasarkan jenis='Keluar'
$sql = $koneksi->query("SELECT SUM(keluar) as tot_keluar FROM kas_sosial WHERE jenis='Keluar'");
$keluar = $sql->fetch_assoc()['tot_keluar'] ?? 0; // Jika tidak ada data, set 0

// Menampilkan saldo kas sosial
?>
<div class="alert alert-info alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-info"></i> Saldo Kas Sosial</h5>
    <h5>Pemasukan: <?php echo rupiah($masuk); ?></h5>
    <h5>Pengeluaran: <?php echo rupiah($keluar); ?></h5>
    <hr>
    <h3>Saldo Akhir: <?php echo rupiah($masuk - $keluar); ?></h3>
</div>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title"><i class="fa fa-table"></i> Rekap Kas Sosial</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Uraian</th>
                        <th>Pemasukan</th>
                        <th>Pengeluaran</th>
                        <th>Pencatat</th> <!-- Kolom untuk pencatat -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    // Mengambil data dari tabel kas_sosial dan menampilkannya secara ascending berdasarkan tanggal (tgl_ks)
                    $sql = $koneksi->query("SELECT ks.*, tp.nama_pengguna FROM kas_sosial ks JOIN tb_pengguna tp ON ks.id_pengguna = tp.id_pengguna ORDER BY tgl_ks ASC");
                    while ($data = $sql->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo date("d/M/Y", strtotime($data['tgl_ks'])); ?></td>
                        <td><?php echo $data['uraian_ks']; ?></td>
                        <td align="right"><?php echo rupiah($data['masuk']); ?></td>
                        <td align="right"><?php echo rupiah($data['keluar']); ?></td>
                        <td><?php echo $data['nama_pengguna']; ?></td> <!-- Menampilkan nama pencatat -->
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>