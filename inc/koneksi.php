<?php
// Membuat koneksi ke database
$koneksi = new mysqli ("localhost","root","","kas_masjid");

// Memeriksa apakah koneksi berhasil
if ($koneksi->connect_error) {
    
// Jika koneksi gagal, tampilkan pesan error dan hentikan eksekusi script
    die("Connection failed: " . $koneksi->connect_error);
}
?>