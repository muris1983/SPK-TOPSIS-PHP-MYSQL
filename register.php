<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Standard Meta -->
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- Site Properties -->
    <title>Login Administrator</title>

    <script src="js/jquery.js"></script>
    <script src="js/validator.min.js"></script>
        
    <script>
    $(document).ready(function(){
        $('form').parsley();
    });
    </script>

        <script src="js/jquery-1.10.2.min.js"></script>
        <script src="js/jquery.chained.min.js"></script>
        <script>
            $("#progdi").chained("#fakultas");
            $("#kecamatan").chained("#kota");
        </script>

    <link rel="stylesheet" href="css/vendor.css">
    
</head>
<body>
<?php
ini_set("display_errors","Off");
include("connect.php");
?>

<?php

if (empty($_SESSION[username])){
 

?>



<div class="container">
            <div>
              <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <h2>
                      <p align="center">REGISTRASI DATA
                        <br>
                        <img src="images/muris-studio.jpg" width="75">
                        
                      </p>



                    </h2>

                    <p align="center">Sudah punya akun!!silahkan <a href="login.php">login</a>.</p>

                    <hr>
                </div>
            </div>

              
              <div class="panel-body">

                <form action="" method="post" data-toggle="validator" role="form">

                  <div class="form-group">
                      <label class="control-label" for="nama">Nama Lengkap</label>
                      <input class="form-control" data-error="Nama Lengkap Tidak Boleh Kosong." id="inputName" placeholder="Nama Lengkap"  name="nama" type="text" required />
                      <div class="help-block with-errors"></div>
                  </div>

                  <div class="form-group">
                      <label class="control-label" for="nama">Fakultas</label>
                      
                      <select id="fakultas" class="selectpicker form-control" title="Pilih Fakultas" name="fakultas" required>
                        <option value="">Please Select</option>
                        <?php
                        $query = mysql_query("SELECT * FROM fakultas ORDER BY id_fakultas");
                        while ($row = mysql_fetch_array($query)) {
                        ?>
                            <option value="<?php echo $row['id_fakultas']; ?>">
                                <?php echo $row['nama_fakultas']; ?>
                            </option>
                        <?php
                        }
                        ?>
                    </select>
                      <div class="help-block with-errors"></div>
                  </div>

                  <div class="form-group">
                      <label class="control-label" for="nama">Program Studi</label>
                      
                      <select id="progdi" name="progdi" class="selectpicker form-control" title="Pilih Progdi" required>
                        <option value="">Please Select</option>
                        <?php
                        $query = mysql_query("SELECT
                                            *
                                          FROM
                                            progdi
                                            INNER JOIN fakultas ON progdi.id_fakultas = fakultas.id_fakultas ORDER BY nama_progdi");
                        while ($row = mysql_fetch_array($query)) {
                        ?>
                            <option id="progdi" class="<?php echo $row['id_fakultas']; ?>" value="<?php echo $row['id_progdi']; ?>">
                                <?php echo $row['nama_progdi']; ?>
                            </option>
                        <?php
                        }
                        ?>
                    </select>
                      <div class="help-block with-errors"></div>
                  </div>

                  <div class="form-group">
                      <label class="control-label" for="nama">Alamat</label>
                      <textarea class="form-control" data-error="Alamat Tidak Boleh Kosong." id="inputName" name="alamat" rows="5" cols="50" placeholder="Alamat" required></textarea>
                      <div class="help-block with-errors"></div>
                  </div>

                  <div class="form-group">
                      <label class="control-label" for="nama">Nomor Telepon</label>
                      <input class="form-control" data-error="Nomor Telepon Tidak Boleh Kosong." type="number" placeholder="Nomor telepon"  name="telepon" type="text" required />
                      <div class="help-block with-errors"></div>
                  </div>

                  <div class="form-group">
                    <label for="inputEmail" class="control-label">Email</label>
                    <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email" required>
                    <div class="help-block with-errors"></div>
                  </div>

                  <div class="form-group">
                      <label class="control-label" for="nama">Login Sebagai</label>
                      <select class="selectpicker form-control" title="Please Select" id="select" name="tipe" required>
                                                <option value="" selected>- Pilih Level -</option>
                                                <option value="user">Pencari Kos</option>
                                                <option value="pemilik">Pemilik Kos</option>
                                            </select>
                      <div class="help-block with-errors"></div>
                  </div>

                  <div class="form-group">
                      <label class="control-label" for="nama">Username</label>
                      <input class="form-control" data-error="Username Tidak Boleh Kosong." id="inputName" placeholder="Username"  name="username" type="text" required />
                      <div class="help-block with-errors"></div>
                  </div>

                  <div class="form-group">
                    <label for="inputPassword" class="control-label">Password</label>
                    <div class="form-group">
                      <input type="password" data-minlength="8" class="form-control" id="inputPassword" data-error="Password Minimal 8 Karakter" placeholder="Password" name="password" required>
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputPassword" class="control-label">Konfirmasi Password</label>
                    <div class="form-group">
                      <input type="password" class="form-control" id="inputPasswordConfirm" data-match="#inputPassword" data-match-error="Password Tidak Sama" placeholder="Confirm" required>
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>

                  <div class="form-group">
                      <input id="btn-fblogin" class="btn btn-primary" type="submit" value="Registrasi Data" />
                      <a class="btn btn-warning" href="login.php">Kembali</a>
                  </div>
                </form>

              </div>
            </div>
        </div>

                                <?php                                      

                                      $nama=$_POST['nama'];
                                      $alamat=$_POST['alamat'];
                                      $telepon=$_POST['telepon'];
                                      $email=$_POST['email'];
                                      $tipe=$_POST['tipe'];
                                      $username=$_POST['username'];
                                      $password=$_POST['password'];

                                     

                                      if(isset($nama,$telepon)){
                                        if((!$nama)||(!$telepon)){
                                        print "<script>alert ('Harap semua data diisi...!!');</script>";
                                        print"<script> self.history.back('Gagal Menyimpan');</script>"; 
                                        exit();
                                        } 

                                      $add_kelas="INSERT INTO login(nama,alamat,no_telepon,email,status,user,password) VALUES 
                                      ('$nama','$alamat','$telepon','$email','$tipe','$username',md5('$password'))";
                                      mysql_query($add_kelas,$koneksi);

                                        if (! $add_kelas) {
                                            echo '<div class="alert alert-danger"><strong>Registrasi Gagal,silahkan Cek Kembali!</strong></div>';
                                        } else {
                                            echo "
                                            <script>alert('Registrasi Berhasil, Silahkan Login'); window.location.href = 'login.php';</script>
                                            ";
                                        }

                                      } 

                                ?>


   
<?php

}else{
 echo '
 <br>
 <div class="container"> 

 <div class="alert alert-danger">
  <p><strong>Anda tidak bisa mengakses halaman ini,dikarenakan
  ANDA SUDAH LOGIN DENGAN USERNAME: <b>'.$_SESSION[username].'</b> Silahkan Logout terlebih dahulu <a href="logout.php">Logout</a>!</strong></p>
 </div>
 
 </div>
 ';
}

 ?> 

