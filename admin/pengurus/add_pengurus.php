<?php
include "inc/koneksi.php"; // Koneksi ke database


// Mengambil data pengguna dari tabel tb_pengguna untuk ditampilkan dalam dropdown
$query_pengguna = mysqli_query($koneksi, "SELECT id_pengguna, nama_pengguna FROM tb_pengguna");
?>

<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title"><i class="fa fa-edit"></i> Tambah Data Pengurus</h3>
  </div>

  <!-- Form untuk menambah data pengurus -->
  <form action="" method="post" enctype="multipart/form-data">
    <div class="card-body">

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Nama Pengurus</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="nama_pengurus" name="nama_pengurus" placeholder="Nama Pengurus" required>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Jabatan</label>
        <div class="col-sm-4">
          <select name="jabatan" id="jabatan" class="form-control">
            <option value="">- Pilih Jabatan -</option>
            <option>Administrator</option>
            <option>Bendahara</option>
          </select>
        </div>
      </div>

      <!-- Dropdown untuk memilih id_pengguna dari tb_pengguna -->
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Pilih Pengguna</label>
        <div class="col-sm-6">
          <select name="id_pengguna" id="id_pengguna" class="form-control" required>
            <option value="">- Pilih User -</option>
            <?php
            // Loop untuk menampilkan pengguna dalam dropdown
            while ($data_pengguna = mysqli_fetch_array($query_pengguna)) {
              echo "<option value='".$data_pengguna['id_pengguna']."'>".$data_pengguna['id_pengguna']."</option>"; // Hanya menampilkan id_pengguna
            }
            ?>
          </select>
        </div>
      </div>

    </div>

    <!-- Tombol Simpan dan Batal -->
    <div class="card-footer">
      <input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
      <a href="?page=MyApp/data_pengurus" title="Kembali" class="btn btn-secondary">Batal</a>
    </div>
  </form>
</div>

<?php
// Proses penyimpanan data ke dalam tabel tb_pengurus
if (isset($_POST['Simpan'])) {

  // Ambil data dari form
  $nama_pengurus = $_POST['nama_pengurus'];
  $jabatan = $_POST['jabatan'];
  $id_pengguna = $_POST['id_pengguna']; // Ambil id_pengguna dari dropdown

  // SQL untuk menyimpan data ke tabel tb_pengurus
  $sql_simpan = "INSERT INTO tb_pengurus (nama_pengurus, jabatan, id_pengguna) VALUES (
    '$nama_pengurus',
    '$jabatan',
    '$id_pengguna')"; // Hanya id_pengguna yang disimpan ke dalam database

  // Eksekusi query
  $query_simpan = mysqli_query($koneksi, $sql_simpan);

  // Tutup koneksi ke database
  mysqli_close($koneksi);

  // Cek apakah query berhasil atau gagal
  if ($query_simpan) {
    // Jika berhasil, tampilkan pesan sukses dan redirect ke halaman data_pengurus
    echo "<script>
    Swal.fire({title: 'Tambah Data Berhasil', text: '', icon: 'success', confirmButtonText: 'OK'})
    .then((result) => {if (result.value) {
      window.location = 'index.php?page=MyApp/data_pengurus';
    }})
    </script>";
  } else {
    // Jika gagal, tampilkan pesan error dan redirect ke halaman add_pengurus
    echo "<script>
    Swal.fire({title: 'Tambah Data Gagal', text: '', icon: 'error', confirmButtonText: 'OK'})
    .then((result) => {if (result.value) {
      window.location = 'index.php?page=MyApp/add_pengurus';
    }})
    </script>";
  }
}
?>
