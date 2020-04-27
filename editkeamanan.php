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
                                                        LEFT JOIN keamanankos ON kamar.id_kamar = keamanankos.id_kamar
                                                        LEFT JOIN keamanan ON keamanan.id_keamanan = keamanankos.id_keamanan WHERE keamanankos.id_keamanankos='$id'";
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
                                <input readonly type="text" class="form-control" name="id_keamanankos" value="<?php print($view_kelas[id_keamanankos]);?>"/>
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
                                <label>Keamanan</label>
                                <select class="form-control" name="keamanan">
                                              <?php

                                              $tampil=mysql_query("SELECT * FROM keamanan ORDER BY id_keamanan");
                                              while($w=mysql_fetch_array($tampil)){
                                                if ($view_kelas[id_keamanan]==$w[id_keamanan]){
                                                  echo "<option value=$w[id_keamanan] selected>$w[keamanannya]-$w[id_keamanan]</option>";
                                                }
                                                else{
                                                  echo "<option value=$w[id_keamanan]>$w[keamanannya]-$w[id_keamanan]</option>";
                                                }
                                              }


                                              ?>
                                                
                                  </select>
                                
                                </select>
                                
                              </div>
                              

                              
                              <div class="form-group">
                                <input class="btn btn-success" type="submit" value="Simpan" />
                                <a class="btn btn-warning" href="keamanan.php">Kembali</a>
                              </div>
                              
                            </form>

                            <?php
                                      

                                      $id_keamanankos=$_POST['id_keamanankos'];
                                      $pemilik=$_POST['pemilik'];
                                      $keamanan=$_POST['keamanan'];


                                      if(isset($id_keamanankos,$pemilik,$keamanan)){
                                        if((!$id_keamanankos)||(!$pemilik)||(!$keamanan)){
                                        print "<script>alert ('Harap semua data diisi...!!');</script>";
                                        print"<script> self.history.back('Gagal Menyimpan');</script>"; 
                                        exit();
                                        } 

                                      $add_kelas="UPDATE keamanankos SET id_keamanan='$keamanan',id_kamar='$pemilik'
                                      WHERE id_keamanankos='$id_keamanankos'";
                                      mysql_query($add_kelas,$koneksi);

                                      echo '
                                      <script type="text/javascript">
                                       
                                             alert ("Data Berhasil Diubah!");
                                             
                                      </script>
                                      ';
                                      echo '<meta http-equiv="refresh" content="1; url=Keamanan.php" />';


                                      } 

                                ?>
  
                            </div>
                            </div>
                    </div>
 
                </div>
        </div>
    </div>
