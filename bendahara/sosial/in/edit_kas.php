<?php
// Memeriksa apakah parameter 'kode' tersedia dalam URL
if (isset($_GET['kode'])) {
    // Mengambil data kas sosial berdasarkan id_ks yang diterima dari parameter GET
    $sql_cek = "SELECT * FROM kas_sosial WHERE id_ks='" . $_GET['kode'] . "'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
}
?>

<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title"><i class="fa fa-edit"></i> Ubah Pemasukan</h3>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="card-body">

            <input type='hidden' class="form-control" name="id_ks" value="<?php echo $data_cek['id_ks']; ?>" readonly/>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Uraian</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="uraian_ks" name="uraian_ks" value="<?php echo $data_cek['uraian_ks']; ?>"/>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Pemasukan</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="masuk" name="masuk" value="<?php echo $data_cek['masuk']; ?>"/>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tanggal</label>
                <div class="col-sm-4">
                    <input type="date" class="form-control" id="tgl_ks" name="tgl_ks" value="<?php echo $data_cek['tgl_ks']; ?>"/>
                </div>
            </div>

        </div>
        <div class="card-footer">
            <input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
            <a href="?page=i_data_ks" title="Kembali" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>

<?php
// Menangani aksi pengubahan data
if (isset($_POST['Ubah'])) {
    // Ambil ID pengguna dari sesi
    $data_id_pengguna = $_SESSION["ses_id"]; // Sesuaikan dengan nama variabel sesi yang digunakan untuk ID pengguna

    // Mengubah data kas sosial berdasarkan id_ks yang diterima dari input form
    $sql_ubah = "UPDATE kas_sosial SET
        uraian_ks='" . $_POST['uraian_ks'] . "',
        masuk='" . $_POST['masuk'] . "',
        tgl_ks='" . $_POST['tgl_ks'] . "',
        id_pengguna='$data_id_pengguna'  -- Menyimpan ID pengguna sebagai pencatat
        WHERE id_ks='" . $_POST['id_ks'] . "'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    mysqli_close($koneksi);

    if ($query_ubah) {
        // Menampilkan pesan berhasil jika data berhasil diubah
        echo "<script>
        Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {if (result.value)
            {window.location = 'index.php?page=i_data_ks';
            }
        })</script>";
    } else {
        // Menampilkan pesan gagal jika data gagal diubah
        echo "<script>
        Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {if (result.value)
            {window.location = 'index.php?page=i_data_ks';
            }
        })</script>";
    }
}
?>
