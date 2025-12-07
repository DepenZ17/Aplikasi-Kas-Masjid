<?php
include "inc/koneksi.php";
?>

<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Pengurus</h3>
    </div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<!-- tombol "tambah data" mengarahkan ke halaman add_pengurus  -->
				<a href="?page=MyApp/add_pengurus" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Pengurus</th>
						<th>Jabatan</th>
						<th>ID Pengguna</th> <!-- Tambahkan kolom ID Pengguna -->
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
            $no = 1;
			  // Query untuk mengambil data dari tabel tb_pengurus dan tb_pengguna
            $sql = $koneksi->query("SELECT tb_pengurus.*, tb_pengguna.id_pengguna 
									FROM tb_pengurus 
									JOIN tb_pengguna ON tb_pengurus.id_pengguna = tb_pengguna.id_pengguna");
            while ($data = $sql->fetch_assoc()) {
            ?>

					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $data['nama_pengurus']; ?></td>
						<td><?php echo $data['jabatan']; ?></td>
						<td><?php echo $data['id_pengguna']; ?></td> <!-- Menampilkan ID Pengguna -->
						<td>
							<!-- Tombol "Ubah" mengarahkan ke halaman edit_pengurus dengan parameter kode -->
							<a href="?page=MyApp/edit_pengurus&kode=<?php echo $data['id_pengurus']; ?>" title="Ubah" class="btn btn-success btn-sm">
								<i class="fa fa-edit"></i>
							</a>
							<!-- Tombol "Hapus" mengarahkan ke halaman del_pengurus dengan parameter kode dan menampilkan konfirmasi -->
							<a href="?page=MyApp/del_pengurus&kode=<?php echo $data['id_pengurus']; ?>"
							onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
								<i class="fa fa-trash"></i>
							</a>
						</td>
					</tr>

					<?php
              }
            ?>
				</tbody>
				</tfoot>
			</table>
		</div>
	</div>
	<!-- /.card-body -->
