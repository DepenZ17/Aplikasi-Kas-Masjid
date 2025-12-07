<?php
if(isset($_GET['kode'])){

    // Menghapus data berdasarkan kode yang diterima
            $sql_hapus = "DELETE FROM kas_masjid WHERE id_km='".$_GET['kode']."'";
            $query_hapus = mysqli_query($koneksi, $sql_hapus);

            if ($query_hapus) {

    // Menampilkan pesan sukses jika data berhasil dihapus
                echo "<script>
                Swal.fire({title: 'Hapus Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'index.php?page=i_data_km';
                    }
                })</script>";
                }else{

    // Menampilkan pesan gagal jika data gagal dihapus
                echo "<script>
                Swal.fire({title: 'Hapus Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'index.php?page=i_data_km';
                    }
                })</script>";
            }
        }

