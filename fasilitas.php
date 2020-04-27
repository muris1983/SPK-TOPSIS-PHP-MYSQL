<?php

ini_set("display_errors","Off");
include "header.php";
include "menu.php";

include("../connect.php");

?>


<div id="content">
            <table border="0" width="100%" cellpadding="0" cellspacing="0">
                <tr valign="top">
                    <td width="75%" style="padding-right:20px;">
                        <div id="body">
                            <div class="title">Master Kamar</div>
                            <div class="body">
                                <form action="" method="post" enctype="multipart/form-data">
                                <table>
                                    <tr>
                                        <td><b>Nama Pemilik Kos</b><div class="desc">Pilih pemilik Kos</div></td>
                                        <td>:</td>
                                        <td>
                                            <?php
                                            echo "<select name=pemilik>
                                            <option value=0 selected>- Pilih Pemilik Kos -</option>";
                                            $tampil=mysql_query("SELECT * FROM pemilik ORDER BY id_pemilik");
                                            while($r=mysql_fetch_array($tampil)){
                                            echo "<option value=$r[id_pemilik]>$r[nama]</option>";
                                            }
                                            echo "</select>";
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Deskripsi Kamar Kos</b><div class="desc">Masukkan deskrispi Kamar Kos</div></td>
                                        <td>:</td>
                                        <td><textarea name="deskripsi" rows="5" cols="50"></textarea></td>
                                    </tr>
                                    <tr>
                                        <td><b>Fasilitas Kamar Kos</b><div class="desc">Masukkan Fasilitas Kamar Kos</div></td>
                                        <td>:</td>
                                        <td><textarea name="fasilitas" rows="5" cols="50"></textarea></td>
                                    </tr>
                                    <tr>
                                        <td><b>Status Kamar</b><div class="desc">Masukan Status Kamar</div></td>
                                        <td>:</td>
                                        <td><select class="form-control" name="status" id="status">
                                                <option value="kosong">Kamar Tersedia</option>
                                                <option value="booking">Kamar Booking</option>
                                            </select></td>
                                    </tr>
                                    <tr>
                                        <td><b>Harga Kamar</b><div class="desc">Masukan Harga Kamar</div></td>
                                        <td>:</td>
                                        <td><input type="text" name="harga" required /></td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td><input type="submit" value="Simpan" />
                                        </td>
                                    </tr>
                                </table>
                                </form>

                                <?php
                                      

                                      $pemilik=$_POST['pemilik'];
                                      $deskripsi=$_POST['deskripsi'];
                                      $fasilitas=$_POST['fasilitas'];
                                      $status=$_POST['status'];
                                      $harga=$_POST['harga'];

                                       

                                      if(isset($pemilik,$deskripsi)){
                                        if((!$pemilik)||(!$deskripsi)){
                                        print "<script>alert ('Harap semua data diisi...!!');</script>";
                                        print"<script> self.history.back('Gagal Menyimpan');</script>"; 
                                        exit();
                                        } 

                                      $add_kelas="INSERT INTO fasilitas(id_pemilik,deskripsi,fasilitasnya,status,harga) VALUES 
                                      ('$pemilik','$deskripsi','$fasilitas','$status','$harga')";
                                      mysql_query($add_kelas,$koneksi);
                                      } 

                                ?>



                        <table class="table" width="100%">


                            <tr class="th">
                                <th>No.</th>
                                <th>Nama Pemilik</th>
                                <th>Deskripsi</th>
                                <th>Fasilitas</th>
                                <th>Status</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>


                            <?php

                            $sql=mysql_query("SELECT * FROM pemilik, fasilitas WHERE pemilik.id_pemilik = fasilitas.id_pemilik ORDER BY fasilitas.id_fasilitas DESC");

                            $no=1;

                            while ($row=mysql_fetch_array($sql)){

                                $harga = $row['harga'];

                                $nilai = number_format($harga,2,",",".");


                                ?>

                              <tr class='td' bgcolor='#FFF'>

                                <td><?php echo $no;?></td>
                                <td><?php echo $row['nama'];?></td>
                                <td><?php echo $row['deskripsi'];?></td>
                                <td><?php echo $row['fasilitasnya'];?></td>
                                <td><?php echo $row['status'];?></td>
                                <td><?php echo $nilai;?></td>

                            <?php

                                  if($pilih_user[status]==admin){
                                  print("
                                    <td>

                                    <a href=editpemilik.php?idk=$row[id_pemilik]>
                                    <img src='images/edit.png'>
                                    </a>
                                    <a href=javascript:KonfirmasiHapus('deletepemilik.php?idk','$row[id_pemilik]')>
                                    <img src='images/delete.png'>
                                    </a>
                                    </td>
                                  </tr>");
                                  }

                                  $no++;

                            ?>
                            </tr>
                            <?php }?>

                        </table>



                            </div>
                        </div>
                    </td>
                    
                </tr>
            </table>
        </div>






<?php
	include "footer.php";
?>


