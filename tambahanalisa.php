<?php
  include "header.php";
  ini_set("display_errors","Off");
  include("../connect.php");
?>

<div class="content-wrapper">
        <div class="container">
              <div class="row">
                    <div class="col-lg-12 text-center">
                    <h1 class="mt-5">Tambah Analisa</h1>
                    
                  </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                        
                        <div class="panel-body">


                             <form action="" method="post" enctype="multipart/form-data">
                                          <div class="form-group">
                                            <label>Nama Kos</label>
                                            <?php
                                            echo "<select class='form-control' name=nama_kos>
                                            <option value=0 selected>- Pilih Kos -</option>";
                                            $tampil=mysql_query("SELECT * FROM pemilik ORDER BY id_pemilik");
                                            while($r=mysql_fetch_array($tampil)){
                                            echo "<option value=$r[id_pemilik]>$r[nama_kos]</option>";
                                            }
                                            echo "</select>";
                                            ?>
                                            
                                          </div>
                                          <div class="form-group">
                                            <label>Kriteria</label>
                                            <?php
                                            echo "<select class='form-control' name=kriteria>
                                            <option value=0 selected>- Pilih Kriteria -</option>";
                                            $tampil=mysql_query("SELECT * FROM kriteria ORDER BY id_kriteria");
                                            while($r=mysql_fetch_array($tampil)){
                                            echo "<option value=$r[id_kriteria]>$r[nama_kriteria]</option>";
                                            }
                                            echo "</select>";
                                            ?>
                                          </div>
                                          
                                          <div class="form-group">
                                            <label>Nilai Bobot</label>
                                            <select class="form-control" name="nilai">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                            
                                          </div>
                                          
                                          <div class="form-group">
                                            <input class="btn btn-primary" type="submit" value="Simpan" />
                                            <a class="btn btn-warning" href="analisa.php">Kembali</a>
                                          </div>
                                          
                                        </form>

                              <?php
                                      

                                      $kriteria=$_POST['kriteria'];
                                      $nama_kos=$_POST['nama_kos'];
                                      $nilai=$_POST['nilai'];
                                      

                                      if(isset($nilai,$kriteria)){
                                        if((!$nilai)||(!$kriteria)){
                                        print "<script>alert ('Harap semua data diisi...!!');</script>";
                                        print"<script> self.history.back('Gagal Menyimpan');</script>"; 
                                        exit();
                                        } 

                                     
                                      $add_kelas="INSERT INTO analisa(id_kriteria,id_pemilik,nilainya) VALUES 
                                      ('$kriteria','$nama_kos','$nilai')";
                                      mysql_query($add_kelas,$koneksi);

                                      echo '
                                      <script type="text/javascript">
                                       
                                             alert ("Data Berhasil Ditambah!");
                                             
                                      </script>
                                      ';
                                      echo '<meta http-equiv="refresh" content="1; url=analisa.php" />';


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