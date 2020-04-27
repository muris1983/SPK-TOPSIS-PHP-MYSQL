<?php
  include "header.php";
include "menu.php";
  ini_set("display_errors","Off");
  include("connect.php");
?>


<div class="page-wrapper">
            
            <div class="container-fluid">
                
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">TAMBAH PEMILIK KOS</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Tambah Pemilik KOS</li>
                        </ol>
                    </div>
                   
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-block">
                  
                  
                  <form action="" method="post" enctype="multipart/form-data" id="frm-mhs">
                              <div class="form-group">
                                <label>Nama Pemilik</label>
                                <input type="text" id="nama_pemilik" class="form-control" name="nama_pemilik" class="required"/>
                              </div>
                              <div class="form-group">
                                <label>Nama Kos</label>
                                <input type="text" id="nama_kos" class="form-control" name="nama_kos" class="required"/>
                              </div>
                              <div class="form-group">
                                <label>Nomor Telepon Pemilik</label>
                                <input type="text" id="telepon" class="form-control" name="telepon" class="required"/>
                              </div>
                              <div class="form-group">
                                <label>Alamat Pemilik</label>
                                <textarea id="alamat" class="form-control" name="alamat" rows="5" cols="50" class="required"></textarea>
                              </div>                              
                              <div class="form-group">
                                <label for="exampleInputFile">Foto Pemilik</label>
                                <input type="file" name="fupload">
                              </div>
                              <div class="form-group">
                                <input class="btn btn-primary" type="submit" value="Simpan" />
                                <a class="btn btn-warning" href="pemilik.php">Kembali</a>
                              </div>
                              
                            </form>

                            <?php
                                      

                                      $nama=$_POST['nama_pemilik'];
                                      $namakos=$_POST['nama_kos'];
                                      $telepon=$_POST['telepon'];
                                      $alamat=$_POST['alamat'];

                                        $lokasi_file = $_FILES['fupload']['tmp_name'];
                                        $nama_file   = $_FILES['fupload']['name'];

                                      if(isset($nama,$namakos,$telepon)){
                                        if((!$nama)||(!$namakos)||(!$telepon)){
                                        print "<script>alert ('Harap semua data diisi...!!');</script>";
                                        print"<script> self.history.back('Gagal Menyimpan');</script>"; 
                                        exit();
                                        } 

                                      move_uploaded_file($lokasi_file,"images/pemilik/$nama_file");

                                      $add_kelas="INSERT INTO pemilik(nama,nama_kos,telepon,alamat,foto,status) VALUES 
                                      ('$nama','$namakos','$telepon','$alamat','$nama_file','y')";
                                      mysql_query($add_kelas,$koneksi);

                                      echo '
                                      <script type="text/javascript">
                                       
                                             alert ("Data Berhasil Ditambah!");
                                             
                                      </script>
                                      ';
                                      echo '<meta http-equiv="refresh" content="1; url=pemilik.php" />';


                                      } 

                                ?>
                  
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
          nama_pemilik : {
            minlength:2,
            required:true
          },
          nama_kos : {
            minlength:2,
            required:true
          },
          alamat : {
            required:true
          },
          telepon : {
            digits: true,
            maxlength:15,
            required:true
          }
        },
        messages: {
          nama_pemilik: {
            required: "* Kolom nama pemilik harus diisi",
            minlength: "Kolom nama pemilik harus terdiri dari minimal 2 digit"
          },
          nama_kos: {
            required: "* Kolom nama kos harus diisi",
            minlength: "Kolom nama kos harus terdiri dari minimal 2 digit"
          },
          alamat: {
            required: "* Kolom alamat harus diisi"
          },
          telepon: {
            required: "* Kolom telepon harus diisi",
            minlength: "Kolom nama kos harus terdiri dari minimal 2 digit",
            maxlength: "Kolom telepon harus maximal 15 digit"
          }
        }
      });
    });
    
    
    </script>

<?php
  include "footer.php";
?>