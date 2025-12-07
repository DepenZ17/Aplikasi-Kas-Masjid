<?php
  $data_nama = $_SESSION["ses_nama"]; // Mengambil data nama pengguna dari sesi
  $data_level = $_SESSION["ses_level"]; // Mengambil data level pengguna dari sesi
  $data_id_pengguna = $_SESSION["ses_id"]; // Mengambil id pengguna dari sesi


  // Menghitung jumlah pengurus dari tabel tb_pengurus
  $sql = $koneksi->query("SELECT COUNT(id_pengurus) as pengurus from tb_pengurus");
    while ($data= $sql->fetch_assoc()) {
      $jmlp=$data['pengurus']; // Menyimpan jumlah pengurus ke dalam variabel $jmlp
  }
?>



<?php

  // Menghitung total kas masuk dari tabel kas_masjid dengan jenis 'Masuk'
  $sql = $koneksi->query("SELECT SUM(masuk) as tot_masuk  from kas_masjid where jenis='Masuk'");
  while ($data= $sql->fetch_assoc()) {
    $masuk=$data['tot_masuk']; // Menyimpan total kas masuk ke dalam variabel $masuk
  }

  // Menghitung total kas keluar dari tabel kas_masjid dengan jenis 'Keluar'
  $sql = $koneksi->query("SELECT SUM(keluar) as tot_keluar  from kas_masjid where jenis='Keluar'");
  while ($data= $sql->fetch_assoc()) {
    $keluar=$data['tot_keluar']; // Menyimpan total kas keluar ke dalam variabel $keluar
  }

  $saldo= $masuk-$keluar; // Menghitung saldo kas masjid
?>

<?php

  // Menghitung total kas masuk dari tabel kas_sosial dengan jenis 'Masuk'
  $sql = $koneksi->query("SELECT SUM(masuk) as tot_masuk  from kas_sosial where jenis='Masuk'");
  while ($data= $sql->fetch_assoc()) {
    $smasuk=$data['tot_masuk']; // Menyimpan total kas masuk ke dalam variabel $smasuk
  }

  // Menghitung total kas keluar dari tabel kas_sosial dengan jenis 'Keluar'
  $sql = $koneksi->query("SELECT SUM(keluar) as tot_keluar  from kas_sosial where jenis='Keluar'");
  while ($data= $sql->fetch_assoc()) {
    $skeluar=$data['tot_keluar']; // Menyimpan total kas keluar ke dalam variabel $skeluar
  }

  $ssaldo= $smasuk-$skeluar; // Menghitung saldo kas sosial
?>
<div class="row">
	<div class="col-lg-4 col-6">
		<!-- small box -->
		<div class="small-box bg-info">
			<div class="inner">
				<h5>
					<?php echo rupiah($saldo); ?>
				</h5>

				<p>Saldo Kas Masjid</p>
			</div>
			<div class="icon">
				<i class="ion ion-stats-bars"></i>
			</div>
			<a href="?page=rekap_km" class="small-box-footer">selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- col -->
	<div class="col-lg-4 col-6">
		<!-- small box -->
		<div class="small-box bg-success">
			<div class="inner">
				<h5>
					<?php echo rupiah($ssaldo); ?>
				</h5>

				<p>Saldo Kas Sosial</p>
			</div>
			<div class="icon">
				<i class="ion ion-stats-bars"></i>
			</div>
			<a href="?page=rekap_ks" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-4 col-6">
		<!-- small box -->
		<div class="small-box bg-warning">
			<div class="inner">
				<h5>
					<?php echo $jmlp; ?>
				</h5>

				<p>Pengurus Masjid</p>
			</div>
			<div class="icon">
				<i class="ion ion-person-add"></i>
			</div>
			<a href="?page=MyApp/viewonly" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>