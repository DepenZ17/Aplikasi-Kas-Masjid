<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title"><i class="fa fa-edit"></i> Tambah Data</h3>
  </div>
  <form action="" method="post" enctype="multipart/form-data">
    <div class="card-body">

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Nama User</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="nama_pengguna" name="nama_pengguna" placeholder="Nama user" required>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Username</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="username" name="username" placeholder="Username">
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-6">
          <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        </div>
      </div>

      <div class="form-group row">
      <label class="col-sm-2 col-form-label">Level</label>
      <div class="col-sm-4">
          <select name="level" id="level" class="form-control">
              <option>- Pilih -</option>
              <option>Administrator</option>
              <option>Bendahara</option>
          </select>
      </div>
      </div>

    </div>
    <div class="card-footer">
      <input type="submit" name="Simpan" value="Simpan" class="btn btn-info" >
      <a href="?page=MyApp/data_pengguna" title="Kembali" class="btn btn-secondary">Batal</a>
    </div>
  </form>
</div>

<?php
    // Cek jika tombol "Simpan" ditekan
    if (isset ($_POST['Simpan'])){

    //mulai proses simpan data
        $sql_simpan = "INSERT INTO tb_pengguna (nama_pengguna,username,password,level) VALUES (
        '".$_POST['nama_pengguna']."',
        '".$_POST['username']."',
        '".$_POST['password']."',
        '".$_POST['level']."')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);

    // Cek apakah proses simpan data berhasil      
    if ($query_simpan) {

    // Jika berhasil, tampilkan pesan sukses menggunakan SweetAlert dan redirect ke halaman data_pengguna
      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=MyApp/data_pengguna';
          }
      })</script>";
      }else{

    // Jika gagal, tampilkan pesan error menggunakan SweetAlert dan redirect kembali ke halaman add_pengguna
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=MyApp/add_pengguna';
          }
      })</script>";
    }}
     //selesai proses simpan data
?>