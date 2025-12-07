<?php
include "inc/koneksi.php";

if(isset($_GET['kode'])){
    // Query untuk menghapus data pengurus berdasarkan id_pengurus
            $sql_hapus = "DELETE FROM tb_pengurus WHERE id_pengurus='".$_GET['kode']."'";
            $query_hapus = mysqli_query($koneksi, $sql_hapus);

            if ($query_hapus) {
    // Jika penghapusan data berhasil, tampilkan pesan sukses menggunakan SweetAlert dan redirect ke halaman data_pengurus
                echo "<script>
                Swal.fire({title: 'Hapus Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'index.php?page=MyApp/data_pengurus';
                    }
                })</script>";
                }else{
    // Jika penghapusan data gagal, tampilkan pesan error menggunakan SweetAlert dan redirect ke halaman data_pengurus
                echo "<script>
                Swal.fire({title: 'Hapus Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'index.php?page=MyApp/data_pengurus';
                    }
                })</script>";
            }
        }

?>