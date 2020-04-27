<?php
  include "header.php";
  ini_set("display_errors","Off");
  include("../connect.php");
?>

<div class="content-wrapper">
        <div class="container">
              <div class="row">
                    <div class="col-lg-12 text-center">
                    <h1 class="mt-5">Tambah User</h1>
                    
                  </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                        
                        <div class="panel-body">


                             <form action="" class="form-horizontal" role="form" method="post">
                                    
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="login-username" type="text" class="form-control" name="nama" value="" placeholder="Nama Lengkap">                                        
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <textarea class="form-control" name="alamat" rows="5" cols="50" placeholder="Alamat"></textarea>
                                                                               
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="login-username" type="text" class="form-control" name="telepon" value="" placeholder="Nomor Telepon">                                        
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="login-username" type="text" class="form-control" name="email" value="" placeholder="Alamat Email">                                        
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <select class="form-control" name="tipe">
                                                <option value="0" selected>- Pilih Level -</option>
                                                <option value="user">Pencari Kos</option>
                                                <option value="pemilik">Pemilik Kos</option>
                                            </select>
                                                                               
                            </div>
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="login-password" type="text" class="form-control" name="username" placeholder="username">
                                    </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="login-password" type="password" class="form-control" name="password" placeholder="password">
                                    </div>
                                    



                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                    <div class="col-sm-12 controls">
                                      
                                      <input id="btn-fblogin" class="btn btn-primary" type="submit" value="Tambah User" />
                                      <a class="btn btn-warning" href="user.php">Kembali</a>
                                    </div>
                                </div>

                                
                                 
                            </form>

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

                                        echo '
                                      <script type="text/javascript">
                                       
                                             alert ("Data Berhasil Ditambah!");
                                             
                                      </script>
                                      ';
                                      echo '<meta http-equiv="refresh" content="1; url=user.php" />';

                                      } 

                                ?>
  
                            </div>
                            </div>
                    </div>
 
                </div>
        </div>
    </div>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
      $('#frm-mhs').validate({
        rules: {
          nama_kriteria : {
            minlength:2,
            required:true
          }
        },
        messages: {
          nama_kriteria: {
            required: "* Kolom nama kriteria harus diisi",
            minlength: "* Kolom nama kriteria harus terdiri dari minimal 2 digit"
          }
        }
      });
    });
    
    
    </script>