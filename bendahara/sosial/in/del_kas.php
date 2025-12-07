<?php

    // Mengecek apakah parameter kode tersedia pada URL
    if(isset($_GET['kode'])){

        // Menyiapkan query untuk menghapus data dari tabel kas_sosial berdasarkan kode
            $sql_hapus = "DELETE FROM kas_sosial WHERE id_ks='".$_GET['kode']."'";

        // Menjalankan query hapus data
            $query_hapus = mysqli_query($koneksi, $sql_hapus);

        // Memeriksa apakah query berhasil dijalankan
            if ($query_hapus) {

        // Menampilkan pesan berhasil jika data berhasil dihapus
                echo "<script>
                Swal.fire({title: 'Hapus Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'index.php?page=i_data_ks';
                    }
                })</script>";
                }else{

        // Menampilkan pesan gagal jika data gagal dihapus
                echo "<script>
                Swal.fire({title: 'Hapus Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'index.php?page=i_data_ks';
                    }
                })</script>";
            }
        }

?>