<?php
  include "header.php";
include "menu.php";
  include "connect.php";
?>

    <?php

    $id = $_SESSION[username];
    $show_kelas="SELECT * FROM pemilik WHERE user='$id'";
    $hasil_kelas=mysql_query($show_kelas,$koneksi);
    $view_kelas=mysql_fetch_row($hasil_kelas);

    ?>


<div class="page-wrapper">
            
            <div class="container-fluid">
                
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                   
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-block">
                                
                                
                                
    <div class="container">
      <div class="row">
        <div class="col-lg-12">

              <h1 class="mt-5">Biodata Pemilik Kos</h1>
              
              

              <?php 

            if (mysql_num_rows($hasil_kelas) > 0) {


              ?>

              <div class="table-responsive">
            <table class="table" align="left">
             <tr>
              <td>Nama Lengkap</td>
              <td><?php echo $view_kelas['2']; ?></td>
            </tr>
            <tr>
              <td>Nama Kos</td>
              <td><?php echo $view_kelas['3']; ?></td>
            </tr>
            <tr>
              <td>No. telepon</td>
              <td><?php echo $view_kelas['4']; ?></td>
            </tr>
            <tr>
              <td>Alamat</td>
              <td><?php echo $view_kelas['5']; ?></td>
            </tr>
            </table>
          </div>

              <?php 
            } else {
              ?>


<script src="js/jquery.js"></script>
<script src="js/validator.min.js"></script>
    
<script>
$(document).ready(function(){
    $('form').parsley();
});
</script>


              <div class="alert alert-info">
                <strong>Info!</strong> Sebelum anda dapat melakukan pengisian kamar kos, terlebih dahulu harus mengisi biodata pemilik kos,Terima kasih.
              </div>

<form action="" class="form-horizontal" data-toggle="validator" role="form" method="post">

                  <div class="form-group">
                      <label class="control-label" for="nama">Nama Lengkap</label>
                      <input class="form-control" data-error="Nama Lengkap Tidak Boleh Kosong." id="nama" placeholder="Nama Lengkap"  name="nama" type="text" required />
                      <div class="help-block with-errors"></div>
                  </div>

                  <div class="form-group">
                      <label class="control-label" for="nama">Nama Kos</label>
                      <input class="form-control" data-error="Nama Kos Tidak Boleh Kosong." id="namakos" placeholder="Nama Hunian Kos"  name="namakos" type="text" required />
                      <div class="help-block with-errors"></div>
                  </div>

                  <div class="form-group">
                      <label class="control-label" for="nama">Nomor Telepon</label>
                      <input class="form-control" data-error="Nomor Telepon Tidak Boleh Kosong." type="number" placeholder="Nomor telepon"  name="telepon" type="text" required />
                      <div class="help-block with-errors"></div>
                  </div>

                  <div class="form-group">
                      <label class="control-label" for="nama">Alamat</label>
                      <textarea class="form-control" data-error="Alamat Tidak Boleh Kosong." id="inputName" name="alamat" rows="5" cols="50" placeholder="Alamat" required></textarea>
                      <div class="help-block with-errors"></div>
                  </div>
                  
                  <div class="form-group">
                    <input id="btn-fblogin" class="btn btn-danger" type="submit" value="Input Data Pemilik Kos" />
                  </div>


            
          </form>
          

                                <?php                                      

                                      $nama=$_POST['nama'];
                                      $namakos=$_POST['namakos'];
                                      $telepon=$_POST['telepon'];
                                      $alamat=$_POST['alamat'];

                                     

                                      if(isset($nama,$telepon)){
                                        if((!$nama)||(!$telepon)){
                                        print "<script>alert ('Harap semua data diisi...!!');</script>";
                                        print"<script> self.history.back('Gagal Menyimpan');</script>"; 
                                        exit();
                                        } 

                                      $add_kelas="INSERT INTO pemilik(user,nama,nama_kos,telepon,alamat) VALUES 
                                      ('$id','$nama','$namakos','$telepon','$alamat')";
                                      mysql_query($add_kelas,$koneksi);

                                      echo '
                                      <script type="text/javascript">
                                       
                                             alert ("Data Berhasil Ditambah!");
                                             
                                      </script>
                                      ';
                                      echo '<meta http-equiv="refresh" content="1; url=biopemilikkos.php" />';


                                      } 

                                ?>

              <?php
            }

            ?>
                  

          
          
        </div>
      </div>
    </div>

                                </div>
                        </div>
                    </div>
                </div>
                
            </div>
    
    