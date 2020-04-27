<?php
ini_set("display_errors","Off");
include("connect.php");
include "header.php";
?>

    <?php
    $id = $_SESSION[username];
    $show_kelas="SELECT * FROM pemilik WHERE user='$id'";
    $hasil_kelas=mysql_query($show_kelas,$koneksi);
    $view_kelas=mysql_fetch_row($hasil_kelas);
    $idpemilik=$view_kelas['0'];

    ?>

<div class="container contentAllCK">

        <div class="row">

            <div class="col-md-10 col-md-offset-1 listing-wrapper">
                <div>
                    
                </div>
                <h1 class="listingTitle">LIST KAMAR PEMILIK KOS</h1>
                
                
                <div class="col-md-12 removePadding showDesktop">
                    
                    <div style="margin-bottom:20px;">

                        <div class="table-responsive">

                <?php 

                if (mysql_num_rows($hasil_kelas) > 0) {

                $a="SELECT * FROM kamar WHERE id_pemilik='$idpemilik'";
                $b=mysql_query($a,$koneksi);

                if (mysql_num_rows($b) > 0) {

                

                ?>

              
              <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>gambar1</th>
                                            <th>Harga</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php

                                        $sql=mysql_query("SELECT * FROM kamar WHERE id_pemilik = '$idpemilik' GROUP BY id_pemilik DESC");

                                        $no=1;

                                        while ($row=mysql_fetch_array($sql)){

                                          $harga = number_format($row['harga'],2,",",".");

                                          ?>

                                          <tr class='td' bgcolor='#FFF'>


                                            <td><?php echo $no;?></td>
                                            <td><?php echo '<img src="images/kamar/'.$row['gambar1'].'" width="80">'; ?></td>
                                            <td>Rp.<?php echo $harga;?></td>

                                        <?php

                                              
                                              print("
                                                <td>
                                                 
                                                <a href=javascript:KonfirmasiHapus('deletekamarpemilik.php?idk','$row[id_kamar]')>
                                                Hapus
                                                </a> | 
                                                <a href=detailkamar.php?idk=$row[id_kamar]>
                                                Detail
                                                </a>
                                                </td>
                                              </tr>");
                                              

                                              $no++;

                                        ?>
                                        </tr>
                                        <?php }?>
                                        

                                    </tbody>
                                </table>
                            </div>




              <?php 
              } else {

                echo '
                <div class="table-responsive">
                <br>
                  <p align="center">
                    <img src="images/sr1-icon-noResult.png"><br><br>
                    <strong>Maaf!! Kamar masih kosong,silahkan isi kamar anda.</strong>
                  </p>
                  
                
                </div>
                ';

                

              }
              } else {
              ?>
              <div class="table-responsive">
              <div class="alert alert-danger">
                <strong>Maaf,Anda harus mengisi biodata pemilik kos terlebih dahulu</strong>
              </div>
              </div>
                                

              <?php
            }

            ?>
                      </div>
                        
                        
                    </div>
                    
                    
                    

                </div>
                
                <div class="clear"></div>
                

                
    
            </div>
        </div>
    </div>
