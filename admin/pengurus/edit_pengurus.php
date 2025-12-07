<?php
include "inc/koneksi.php";

if (isset($_GET['kode'])) {
    // Query untuk mengambil data pengurus berdasarkan id_pengurus
    $sql_cek = "SELECT * FROM tb_pengurus WHERE id_pengurus='" . $_GET['kode'] . "'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
}
?>

<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title"><i class="fa fa-edit"></i> Ubah Data</h3>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="card-body">

            <!-- Menampilkan id_pengguna sebagai readonly -->
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">ID Pengguna</label>
                <div class="col-sm-6">
                    <input type='text' class="form-control" name="id_pengguna" value="<?php echo $data_cek['id_pengguna']; ?>" readonly/>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama pengurus</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="nama_pengurus" name="nama_pengurus" value="<?php echo $data_cek['nama_pengurus']; ?>"/>
                </div>
            </div>

            <div class="form-group row">
    <label class="col-sm-2 col-form-label">Jabatan</label>
    <div class="col-sm-4">
        <select name="jabatan" id="jabatan" class="form-control">
            <option value="">-- Pilih Jabatan --</option>
            <?php
            // Array pilihan jabatan
            $jabatans = ["Administrator", "Bendahara"];

            // Loop untuk membuat opsi jabatan
            foreach ($jabatans as $jabatan) {
                $selected = ($data_cek['jabatan'] == $jabatan) ? "selected" : "";
                echo "<option value='$jabatan' $selected>$jabatan</option>";
            }
            ?>
        </select>
    </div>
</div>


        </div>
        <div class="card-footer">
            <input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
            <a href="?page=MyApp/data_pengurus" title="Kembali" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>

<?php
if (isset($_POST['Ubah'])) {
    // Query untuk mengubah data pengurus berdasarkan id_pengurus
    $sql_ubah = "UPDATE tb_pengurus SET
        nama_pengurus='".$_POST['nama_pengurus'] . "',
        jabatan='".$_POST['jabatan'] . "'
        WHERE id_pengguna='".$_POST['id_pengguna']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    mysqli_close($koneksi);

    if ($query_ubah) {
        // Jika pengubahan data berhasil, tampilkan pesan sukses menggunakan SweetAlert dan redirect ke halaman data_pengurus
        echo "<script>
            Swal.fire({title: 'Ubah Data Berhasil', text: '', icon: 'success', confirmButtonText: 'OK'
            }).then((result) => {if (result.value) {
                window.location = 'index.php?page=MyApp/data_pengurus';
            }})</script>";
    } else {
        // Jika pengubahan data gagal, tampilkan pesan error menggunakan SweetAlert dan redirect ke halaman data_pengurus
        echo "<script>
            Swal.fire({title: 'Ubah Data Gagal', text: '', icon: 'error', confirmButtonText: 'OK'
            }).then((result) => {if (result.value) {
                window.location = 'index.php?page=MyApp/data_pengurus';
            }})</script>";
    }
}
?>

