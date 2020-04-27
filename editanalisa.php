<?php

ini_set("display_errors","Off");
include "header.php";

include("connect.php");

?>


    <?php
    
    $id=$_GET['idk'];
    $show_kelas="SELECT * FROM analisa WHERE id_analisa='$id'";
    $hasil_kelas=mysql_query($show_kelas,$koneksi);
    $view_kelas=mysql_fetch_row($hasil_kelas);

    ?>


<div class="content-wrapper">
        <div class="container">
              <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Ubah Data Analisa Topsis </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                        
                        <div class="panel-body">


                             <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                <label>Id Kriteria</label>
                                <input readonly type="text" class="form-control" name="id_kriteria" value="<?php print($view_kelas[0]);?>"/>
                              </div>
                              <div class="form-group">
                                <label>Nama Kos</label>
                                <select class="form-control" name="nama_kos">
                                <?php

                                $tampil=mysql_query("SELECT * FROM pemilik ORDER BY id_pemilik");
                                while($w=mysql_fetch_array($tampil)){
                                  if ($view_kelas[2]==$w[id_pemilik]){
                                    echo "<option value=$w[id_pemilik] selected>$w[nama_kos]</option>";
                                  }
                                  else{
                                    echo "<option value=$w[id_pemilik]>$w[nama_kos]</option>";
                                  }
                                }


                                ?>
                                </select>

                              </div>
                              <div class="form-group">
                                <label>Nama Kriteria</label>
                                <select class="form-control" name="kriteria">
                                <?php

                                $tampil=mysql_query("SELECT * FROM kriteria ORDER BY id_kriteria");
                                while($w=mysql_fetch_array($tampil)){
                                  if ($view_kelas[1]==$w[id_kriteria]){
                                    echo "<option value=$w[id_kriteria] selected>$w[nama_kriteria]</option>";
                                  }
                                  else{
                                    echo "<option value=$w[id_kriteria]>$w[nama_kriteria]</option>";
                                  }
                                }


                                ?>
                                </select>

                              </div>
                              
                              <div class="form-group">
                                <label>Nilainya</label>
                                <select class="form-control" name="nilai">
                                              <?php
                                              if ($view_kelas[2]=='1'){
                                                echo '
                                                <option value="1" selected>1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                ';
                                              } else if ($view_kelas[2]=='2') {

                                                echo '
                                                <option value="1">1</option>
                                                <option value="2" selected>2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                ';

                                              } else if ($view_kelas[2]=='3') {

                                                echo '
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3" selected>3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                ';

                                              } else if ($view_kelas[2]=='4') {

                                                echo '
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4" selected>4</option>
                                                <option value="5">5</option>
                                                ';

                                              } else {
                                                echo '
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5" selected>5</option>
                                                ';
                                              }
                                              ?>
                                                
                                            </select>
                                
                              </div>
                              
                              
                              <div class="form-group">
                                <input class="btn btn-success" type="submit" value="Simpan" />
                                <a class="btn btn-warning" href="analisa.php">Kembali</a>
                              </div>
                              
                            </form>

                            <?php
                                      

                                      $id_kriteria=$_POST['id_kriteria'];
                                      $nama_kos=$_POST['nama_kos'];
                                      $kriteria=$_POST['kriteria'];
                                      $nilai=$_POST['nilai'];


                                      if(isset($nama_kos,$kriteria,$nilai)){
                                        if((!$nama_kos)||(!$kriteria)||(!$nilai)){
                                        print "<script>alert ('Harap semua data diisi...!!');</script>";
                                        print"<script> self.history.back('Gagal Menyimpan');</script>"; 
                                        exit();
                                        } 

                                      $add_kelas="UPDATE analisa SET id_kriteria='$kriteria',id_pemilik='$nama_kos',nilainya='$nilai'
                                      WHERE id_analisa='$id_kriteria'";
                                      mysql_query($add_kelas,$koneksi);

                                      echo '
                                      <script type="text/javascript">
                                       
                                             alert ("Data Berhasil Diubah!");
                                             
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



