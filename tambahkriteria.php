<?php
  include "header.php";
include "menu.php";
  ini_set("display_errors","Off");
  include("../connect.php");
?>



<div class="page-wrapper">
            
            <div class="container-fluid">
                
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">TAMBAH KRITERIA TOPSIS</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Tambah Kriteria</li>
                        </ol>
                    </div>
                   
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-block">
                  
                  <form action="" method="post" enctype="multipart/form-data" id="frm-mhs">
                                           
                                          <div class="form-group">
                                            <label>Nama Kriteria</label>
                                            <input type="text" class="form-control" name="nama_kriteria"/>
                                          </div>
                                          <div class="form-group">
                                            <label>Atribut</label>
                                            <select class="form-control" name="atribut">
                                                <option value="benefit">benefit</option>
                                                <option value="benefit">cost</option>
                                            </select>
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
                                            <a class="btn btn-warning" href="kriteria.php">Kembali</a>
                                          </div>
                                          
                                        </form>

                              <?php
                                      

                                      $kode_kriteria=$_POST['kode_kriteria'];
                                      $nama_kriteria=$_POST['nama_kriteria'];
                                      $atribut=$_POST['atribut'];
                                      $nilai=$_POST['nilai'];
                                      

                                      if(isset($nilai,$atribut)){
                                        if((!$nilai)||(!$atribut)){
                                        print "<script>alert ('Harap semua data diisi...!!');</script>";
                                        print"<script> self.history.back('Gagal Menyimpan');</script>"; 
                                        exit();
                                        } 

                                     
                                      $add_kelas="INSERT INTO kriteria(atribut,bobot_nilai,nama_kriteria) VALUES 
                                      ('$atribut','$nilai','$nama_kriteria')";
                                      mysql_query($add_kelas,$koneksi);

                                      echo '
                                      <script type="text/javascript">
                                       
                                             alert ("Data Berhasil Ditambah!");
                                             
                                      </script>
                                      ';
                                      echo '<meta http-equiv="refresh" content="1; url=kriteria.php" />';


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

<?php
  include "footer.php";
?>