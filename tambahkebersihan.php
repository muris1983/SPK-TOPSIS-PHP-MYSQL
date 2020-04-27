<?php
  include "header.php";
  ini_set("display_errors","Off");
  include("connect.php");
?>

<div class="content-wrapper">
        <div class="container">
              <div class="row">
                    <div class="col-lg-12 text-center">
                    <h1 class="mt-5">Tambah Kriteria Kebersihan</h1>
                    
                  </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                        
                        <div class="panel-body">


                             <form action="" method="post" enctype="multipart/form-data" id="frm-mhs">
                                           
                                          <div class="form-group">
                                            <label>Nama Kos</label>
                                            <?php
                                            echo "<select class='form-control' name='pemilik'>
                                            <option value=0 selected>- Pilih Pemilik Kos -</option>";
                                            $tampil=mysql_query("SELECT * FROM pemilik,kamar WHERE pemilik.id_pemilik=kamar.id_pemilik ORDER BY pemilik.id_pemilik DESC");
                                            while($r=mysql_fetch_array($tampil)){
                                            echo "<option value=$r[id_kamar]>$r[nama_kos]</option>";
                                            }
                                            echo "</select>";
                                            ?>
                                          </div>
                                          <div class="form-group">
                                            <label>Kebersihan</label>
                                            <?php
                                            echo "<select class='form-control' name='kebersihan'>
                                            <option value=0 selected>- Pilih -</option>";
                                            $tampil=mysql_query("SELECT * FROM kebersihan ORDER BY id_kebersihan DESC");
                                            while($r=mysql_fetch_array($tampil)){
                                            echo "<option value=$r[id_kebersihan]>$r[kebersihannya]-$r[id_kebersihan]</option>";
                                            }
                                            echo "</select>";
                                            ?>
                                          </div>
                                          
                                          
                                          <div class="form-group">
                                            <input class="btn btn-primary" type="submit" value="Simpan" />
                                            <a class="btn btn-warning" href="kebersihan.php">Kembali</a>
                                          </div>
                                          
                                        </form>

                              <?php
                                      

                                      $pemilik=$_POST['pemilik'];
                                      $kebersihan=$_POST['kebersihan'];
                                      

                                      if(isset($pemilik,$kebersihan)){
                                        if((!$pemilik)||(!$kebersihan)){
                                        print "<script>alert ('Harap semua data diisi...!!');</script>";
                                        print"<script> self.history.back('Gagal Menyimpan');</script>"; 
                                        exit();
                                        } 

                                     
                                      $add_kelas="INSERT INTO kebersihankos (id_kebersihan,id_kamar) VALUES 
                                      ('$kebersihan','$pemilik')";
                                      mysql_query($add_kelas,$koneksi);

                                      echo '
                                      <script type="text/javascript">
                                       
                                             alert ("Data Berhasil Ditambah!");
                                             
                                      </script>
                                      ';
                                      echo '<meta http-equiv="refresh" content="0; url=kebersihan.php" />';


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