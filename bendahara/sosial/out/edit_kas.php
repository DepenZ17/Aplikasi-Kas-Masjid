<?php

// Mengecek apakah parameter 'kode' telah ada
if (isset($_GET['kode'])) {
    // Mengambil data kas_sosial berdasarkan id_ks yang diperoleh dari parameter 'kode'
    $sql_cek = "SELECT * FROM kas_sosial WHERE id_ks='" . $_GET['kode'] . "'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
}
?>

<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title"><i class="fa fa-edit"></i> Ubah Pengeluaran</h3>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="card-body">

            <input type='hidden' class="form-control" name="id_ks" value="<?php echo $data_cek['id_ks']; ?>" readonly />

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Uraian</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="uraian_ks" name="uraian_ks" value="<?php echo $data_cek['uraian_ks']; ?>" required />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Pengeluaran</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="keluar" name="keluar" value="<?php echo $data_cek['keluar']; ?>" required />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tanggal</label>
                <div class="col-sm-4">
                    <input type="date" class="form-control" id="tgl_ks" name="tgl_ks" value="<?php echo $data_cek['tgl_ks']; ?>" required />
                </div>
            </div>

        </div>
        <div class="card-footer">
            <input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
            <a href="?page=o_data_ks" title="Kembali" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>

<?php

// Mengecek apakah tombol 'Ubah' telah ditekan
if (isset($_POST['Ubah'])) {
    // Mengambil ID pengguna dari sesi
    $data_id_pengguna = $_SESSION["ses_id"];

    // Melakukan proses update data kas_sosial berdasarkan id_ks
    $sql_ubah = "UPDATE kas_sosial SET
        uraian_ks='" . $_POST['uraian_ks'] . "',
        keluar='" . preg_replace("/[^0-9]/", "", $_POST['keluar']) . "',  -- Membuang Rp dan Titik
        tgl_ks='" . $_POST['tgl_ks'] . "',
        id_pengguna='$data_id_pengguna'  -- Menyimpan ID pengguna sebagai pencatat
        WHERE id_ks='" . $_POST['id_ks'] . "'";
    
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    mysqli_close($koneksi);

    if ($query_ubah) {
        // Jika proses update berhasil, tampilkan pesan sukses menggunakan SweetAlert dan redirect ke halaman o_data_ks
        echo "<script>
        Swal.fire({title: 'Ubah Data Berhasil', text: '', icon: 'success', confirmButtonText: 'OK'
        }).then((result) => {if (result.value)
            {window.location = 'index.php?page=o_data_ks';
            }
        })</script>";
    } else {
        // Jika proses update gagal, tampilkan pesan error menggunakan SweetAlert dan redirect ke halaman o_data_ks
        echo "<script>
        Swal.fire({title: 'Ubah Data Gagal', text: '', icon: 'error', confirmButtonText: 'OK'
        }).then((result) => {if (result.value)
            {window.location = 'index.php?page=o_data_ks';
            }
        })</script>";
    }
}
?>

