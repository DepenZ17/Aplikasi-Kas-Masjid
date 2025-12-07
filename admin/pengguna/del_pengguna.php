<?php
if(isset($_GET['kode'])){ // Mendapatkan kode pengguna dari parameter URL

        // Query untuk menghapus data pengguna berdasarkan kode pengguna
            $sql_hapus = "DELETE FROM tb_pengguna WHERE id_pengguna='".$_GET['kode']."'";
            $query_hapus = mysqli_query($koneksi, $sql_hapus);

            if ($query_hapus) { 
        // Jika penghapusan berhasil, tampilkan pesan sukses menggunakan SweetAlert dan redirect ke halaman data_pengguna
                echo "<script>
                Swal.fire({title: 'Hapus Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'index.php?page=MyApp/data_pengguna';
                    }
                })</script>";
                }else{
        // Jika penghapusan gagal, tampilkan pesan error menggunakan SweetAlert dan redirect ke halaman data_pengguna
                echo "<script>
                Swal.fire({title: 'Hapus Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'index.php?page=MyApp/data_pengguna';
                    }
                })</script>";
            }
        }

?>