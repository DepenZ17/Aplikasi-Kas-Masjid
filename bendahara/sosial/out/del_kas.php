<?php

            // Cek apakah parameter 'kode' telah ada
            if(isset($_GET['kode'])){

            // Menghapus data dari tabel kas_sosial berdasarkan id_ks
            $sql_hapus = "DELETE FROM kas_sosial WHERE id_ks='".$_GET['kode']."'";
            $query_hapus = mysqli_query($koneksi, $sql_hapus);

            if ($query_hapus) {

            // Jika penghapusan berhasil, tampilkan pesan sukses menggunakan SweetAlert dan redirect ke halaman o_data_ks
                echo "<script>
                Swal.fire({title: 'Hapus Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'index.php?page=o_data_ks';
                    }
                })</script>";
                }else{

            // Jika penghapusan gagal, tampilkan pesan error menggunakan SweetAlert dan redirect ke halaman o_data_ks
                echo "<script>
                Swal.fire({title: 'Hapus Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'index.php?page=o_data_ks';
                    }
                })</script>";
            }
        }

?>