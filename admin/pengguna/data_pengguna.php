<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data User</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>

	<!-- tombol "tambah data" mengarahkan ke halaman add_pengguna  -->
				<a href="?page=MyApp/add_pengguna" class="btn btn-primary"> 
					<i class="fa fa-edit"></i> Tambah Data</a>
			</div>
			
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama User</th>
						<th>Username</th>
						<th>Password</th> <!-- Kolom Password ditambahkan di sini -->
						<th>Level</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
              $no = 1; 
			  // Mengambil data pengguna dari tabel tb_pengguna
              $sql = $koneksi->query("select * from tb_pengguna");
              while ($data= $sql->fetch_assoc()) {
            ?>

					<tr>
						<td>
							<?php echo $no++; ?>
						</td>
						<td>
							<?php echo $data['nama_pengguna']; ?>
						</td>
						<td>
							<?php echo $data['username']; ?>
						</td>
						<td>
							<?php echo $data['password']; ?> <!-- Menampilkan data Password -->
						</td>
						<td>
							<?php echo $data['level']; ?>
						</td>
						<td>
							<!-- Tombol "Ubah" mengarahkan ke halaman edit_pengguna dengan parameter kode -->
							<a href="?page=MyApp/edit_pengguna&kode=<?php echo $data['id_pengguna']; ?>"
							 title="Ubah" class="btn btn-success btn-sm">
								<i class="fa fa-edit"></i>
							</a>
							<!-- Tombol "Hapus" mengarahkan ke halaman del_pengguna dengan parameter kode dan menampilkan konfirmasi -->
							<a href="?page=MyApp/del_pengguna&kode=<?php echo $data['id_pengguna']; ?>"
							 onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
								<i class="fa fa-trash"></i>
								</>
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
