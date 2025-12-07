<?php

// Mengimpor file koneksi.php
include "inc/koneksi.php";
?>

<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data pengurus</h3>
            </div>
	<!-- /.card-header -->
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Pengurus</th>
						<th>Jabatan</th>
					</tr>
				</thead>
				<tbody>

					<?php
              $no = 1;

		// Melakukan query untuk mengambil data pengurus dari tabel tb_pengurus
              $sql_pengurus = $koneksi->query("select * from tb_pengurus");
              while ($data= $sql_pengurus->fetch_assoc()) {
            ?>

					<tr>
						<td>
							<?php echo $no++; ?>
						</td>
						<td>
							<?php echo $data['nama_pengurus']; ?>
						</td>
						<td>
							<?php echo $data['jabatan']; ?>
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