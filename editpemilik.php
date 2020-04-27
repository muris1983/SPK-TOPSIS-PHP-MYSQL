<?php

ini_set("display_errors","Off");
include "header.php";
include "menu.php";

include("connect.php");

?>


    <?php
    
    $id=$_GET['idk'];
    $show_kelas="SELECT * FROM pemilik WHERE id_pemilik='$id'";
    $hasil_kelas=mysql_query($show_kelas,$koneksi);
    $view_kelas=mysql_fetch_row($hasil_kelas);

    ?>


<div class="page-wrapper">
            
            <div class="container-fluid">
                
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">UBAH PEMILIK KOS</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Ubah Pemilik Kos</li>
                        </ol>
                    </div>
                   
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-block">
                  
                  
                                
                                <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                <label>Id Pemilik</label>
                                <input readonly type="text" class="form-control" name="id_pemilik" value="<?php print($view_kelas[0]);?>"/>
                              </div>
                              <div class="form-group">
                                <label>Nama Pemilik</label>
                                <input type="text" class="form-control" name="nama_pemilik" value="<?php print($view_kelas[2]);?>"/>
                              </div>
                              <div class="form-group">
                                <label>Nama Kos</label>
                                <input type="text" class="form-control" name="nama_kos" value="<?php print($view_kelas[3]);?>"/>
                              </div>
                              <div class="form-group">
                                <label>Nomor Telepon Pemilik</label>
                                <input type="text" class="form-control" name="telepon" value="<?php print($view_kelas[4]);?>"/>
                              </div>
                              <div class="form-group">
                                <label>Alamat Pemilik</label>
                                <textarea class="form-control" name="alamat" rows="5" cols="50"><?php print($view_kelas[5]);?></textarea>
                              </div>                              
                              <div class="form-group">
                                <label for="exampleInputFile">Foto Pemilik</label>
                                <input type="file" name="fupload">
                                <p>
                                  <?php 

                                              if (empty($view_kelas['8'])){
                                                echo '<img src="images/user.png" width="80">'; 
                                              } else {
                                                echo '<img src="images/pemilik/'.$view_kelas['8'].'" width="80">'; 
                                              }
                                                
                                              ?>
                                </p>
                              </div>
                              <div class="form-group">
                                <input class="btn btn-success" type="submit" value="Simpan" />
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

                                      $add_kelas="UPDATE pemilik SET nama='$nama',nama_kos='$namakos',telepon='$telepon',alamat='$alamat',foto='$nama_file'
                                      WHERE id_pemilik='$id'";
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

<?php
include 'footer.php';
?>

