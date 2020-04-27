<?php

ini_set("display_errors","Off");
include "header.php";

include("connect.php");

?>


    <?php
    
    $id=$_GET['idk'];
    $show_kelas="                                       SELECT * 
                                                        FROM kamar
                                                        LEFT JOIN pemilik ON kamar.id_pemilik = pemilik.id_pemilik
                                                        LEFT JOIN kenyamanankos ON kamar.id_kamar = kenyamanankos.id_kamar
                                                        LEFT JOIN kenyamanan ON kenyamanan.id_kenyamanan = kenyamanankos.id_kenyamanan WHERE kenyamanankos.id_kenyamanankos='$id'";
    $hasil_kelas=mysql_query($show_kelas,$koneksi);
    $view_kelas=mysql_fetch_array($hasil_kelas);

    ?>


<div class="content-wrapper">
        <div class="container">
              <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Ubah Data Kriteria </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                        
                        <div class="panel-body">


                             <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                <label>Id</label>
                                <input readonly type="text" class="form-control" name="id_kenyamanankos" value="<?php print($view_kelas[id_kenyamanankos]);?>"/>
                              </div>
                              <div class="form-group">
                                <label>Nama Kos</label>
                                <select class="form-control" name="pemilik">
                                            <?php

                                            $tampil=mysql_query("SELECT * FROM pemilik,kamar WHERE pemilik.id_pemilik=kamar.id_pemilik ORDER BY pemilik.id_pemilik");
                                            while($w=mysql_fetch_array($tampil)){
                                              if ($view_kelas[id_pemilik]==$w[id_pemilik]){
                                                echo "<option value=$w[id_kamar] selected>$w[nama_kos]</option>";
                                              }
                                              else{
                                                echo "<option value=$w[id_kamar]>$w[nama_kos]</option>";
                                              }
                                            }


                                            ?>
                                            </select>
                              </div>
                              <div class="form-group">
                                <label>Kenyamanan</label>
                                <select class="form-control" name="kenyamanan">
                                              <?php

                                              $tampil=mysql_query("SELECT * FROM kenyamanan ORDER BY id_kenyamanan");
                                              while($w=mysql_fetch_array($tampil)){
                                                if ($view_kelas[id_kenyamanan]==$w[id_kenyamanan]){
                                                  echo "<option value=$w[id_kenyamanan] selected>$w[kenyamanannya]-$w[id_kenyamanan]</option>";
                                                }
                                                else{
                                                  echo "<option value=$w[id_kenyamanan]>$w[kenyamanannya]-$w[id_kenyamanan]</option>";
                                                }
                                              }


                                              ?>
                                                
                                  </select>
                                
                                </select>
                                
                              </div>
                              

                              
                              <div class="form-group">
                                <input class="btn btn-success" type="submit" value="Simpan" />
                                <a class="btn btn-warning" href="kenyamanan.php">Kembali</a>
                              </div>
                              
                            </form>

                            <?php
                                      

                                      $id_kenyamanankos=$_POST['id_kenyamanankos'];
                                      $pemilik=$_POST['pemilik'];
                                      $kenyamanan=$_POST['kenyamanan'];


                                      if(isset($id_kenyamanankos,$pemilik,$kenyamanan)){
                                        if((!$id_kenyamanankos)||(!$pemilik)||(!$kenyamanan)){
                                        print "<script>alert ('Harap semua data diisi...!!');</script>";
                                        print"<script> self.history.back('Gagal Menyimpan');</script>"; 
                                        exit();
                                        } 

                                      $add_kelas="UPDATE kenyamanankos SET id_kenyamanan='$kenyamanan',id_kamar='$pemilik'
                                      WHERE id_kenyamanankos='$id_kenyamanankos'";
                                      mysql_query($add_kelas,$koneksi);

                                      echo '
                                      <script type="text/javascript">
                                       
                                             alert ("Data Berhasil Diubah!");
                                             
                                      </script>
                                      ';
                                      echo '<meta http-equiv="refresh" content="0; url=kenyamanan.php" />';


                                      } 

                                ?>
  
                            </div>
                            </div>
                    </div>
 
                </div>
        </div>
    </div>
