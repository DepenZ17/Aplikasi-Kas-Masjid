# Aplikasi Kas Masjid

Aplikasi kas masjid berbasis web yang digunakan untuk mencatat pemasukan, pengeluaran, dan saldo kas secara teratur. Aplikasi ini dibuat untuk membantu pengurus masjid mengelola keuangan dengan lebih rapi, transparan, dan mudah dicek kembali saat dibutuhkan.

---

## ✨ Fitur Utama

- **Manajemen Pemasukan Kas**
  - Input data pemasukan (tanggal, keterangan, sumber, jumlah).
  - Daftar riwayat pemasukan.

- **Manajemen Pengeluaran Kas**
  - Input data pengeluaran (tanggal, keterangan, tujuan, jumlah).
  - Daftar riwayat pengeluaran.

- **Laporan & Rekap**
  - Rekap saldo kas (total pemasukan, total pengeluaran, dan saldo akhir).
  - Laporan dalam rentang tanggal tertentu (misal per bulan / per tahun).
  - Cetak / export laporan (jika tersedia di aplikasi).

- **Manajemen User (opsional)**
  - Hak akses admin / bendahara (sesuai menu `admin` dan `bendahara`).
  - Login dan logout untuk keamanan data.

---

## 🛠️ Teknologi yang Digunakan

- **Bahasa Pemrograman**: PHP
- **Database**: MySQL (file schema ada di folder `db/`)
- **Front-end**:
  - HTML, CSS, JavaScript
  - Bootstrap
  - jQuery, DataTables, Select2
  - Font Awesome

---

## 📦 Persyaratan Sistem

Untuk menjalankan aplikasi ini secara lokal:

- PHP 7.x atau lebih baru  
- MySQL / MariaDB  
- Web server (Apache)  
- Disarankan menggunakan:
  - [XAMPP](https://www.apachefriends.org/) atau
  - [Laragon](https://laragon.org/) atau
  - stack sejenis (LAMP/WAMP)

---

## 🚀 Cara Instalasi (Lokal)

1. **Clone / Download Project**
   - Clone dari GitHub:
     ```bash
     git clone https://github.com/DepenZ17/Aplikasi-Kas-Masjid.git
     ```
     atau download sebagai ZIP lalu extract ke folder `htdocs` (XAMPP) / `www` (Laragon).

2. **Buat Database MySQL**
   - Buka `phpMyAdmin`.
   - Buat database baru, misalnya: `kas_masjid`.
   - Import file SQL yang ada di folder:
     ```
     db/kas_masjid.sql
     ```

3. **Atur Konfigurasi Koneksi Database**
   - Buka file konfigurasi koneksi database (misalnya di dalam folder `inc/` atau file konfigurasi lain yang digunakan aplikasi).
   - Sesuaikan:
     - `hostname` (biasanya `localhost`)
     - `username` (misalnya `root`)
     - `password`
     - `nama_database` (misalnya `kas_masjid`)

4. **Jalankan Aplikasi**
   - Jalankan Apache dan MySQL (di XAMPP / Laragon).
   - Buka browser dan akses:
     ```text
     http://localhost/Aplikasi-Kas-Masjid
     ```
     (sesuaikan dengan nama folder tempat kamu menyimpan project)

---

## 🧑‍💻 Pengembangan

Jika ingin mengembangkan aplikasi ini:

- Perubahan tampilan dapat dilakukan di file HTML/PHP dalam folder:
  - `home/`, `admin/`, `bendahara/`, dll.
- Asset front-end (CSS, JS, plugin) berada di folder:
  - `plugins/`, dan file terkait lainnya.
