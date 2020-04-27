<?php

ini_set("display_errors","Off");
include "header.php";

include("connect.php");

?>


    <?php
    
    $id=$_GET['idk'];
    $show_kelas="SELECT * FROM kamar WHERE id_kamar='$id'";
    $hasil_kelas=mysql_query($show_kelas,$koneksi);
    $view_kelas=mysql_fetch_row($hasil_kelas);

    ?>


<div class="content-wrapper">
        <div class="container">
              <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Ubah Data Kamar Kos </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                        
                        <div class="panel-body">


                             <form action="" method="post" enctype="multipart/form-data">
                                          <div class="form-group">
                                            <label>Nama Pemilik</label>
                                            <select class="form-control" name="pemilik">
                                            <?php

                                            $tampil=mysql_query("SELECT * FROM pemilik ORDER BY id_pemilik");
                                            while($w=mysql_fetch_array($tampil)){
                                              if ($view_kelas[1]==$w[id_pemilik]){
                                                echo "<option value=$w[id_pemilik] selected>$w[nama]</option>";
                                              }
                                              else{
                                                echo "<option value=$w[id_pemilik]>$w[nama]</option>";
                                              }
                                            }


                                            ?>
                                            </select>
                                            
                                          </div>
                                          <div class="form-group">
                                            <label>Jenis Hunian Kos</label>
                                            <select class="form-control" name="tipe">
                                              <?php
                                              if ($view_kelas[2]=='putra'){
                                                echo '
                                                <option value="putra" selected>Kos Putra</option>
                                                <option value="putri">Kos Putri</option>
                                                <option value="campur">Kos Campur</option>
                                                ';
                                              } else if ($view_kelas[2]=='putri'){
                                                echo '
                                                <option value="putri" selected>Kos Putri</option>
                                                <option value="putra">Kos Putra</option>
                                                <option value="campur">Kos Campur</option>
                                                ';
                                              } else {
                                                echo '
                                                <option value="campur" selected>Kos Campur</option>
                                                <option value="putra">Kos Putra</option>
                                                <option value="putri">Kos Putri</option>
                                                ';
                                              }
                                              ?>
                                                
                                            </select>
                                          </div>
                                          <div class="form-group">
                                            <label>Deskripsi Kamar</label>
                                            <textarea class="form-control" name="deskripsi" rows="5" cols="50"><?php print($view_kelas[3]);?></textarea>
                                          </div>
                                          <div class="form-group">
                                            <label>Fasilitas Kamar</label>
                                            <ul class="fasilitas">
                                              <?php
                                              $fasilitas_kost = mysql_query('SELECT * FROM fasilitaskos WHERE id_kamar='.$id);
                                              while ($r_fasilitas_kost = mysql_fetch_array($fasilitas_kost)){
                                                  $check[] = $r_fasilitas_kost['id_fasilitas'];
                                              }
                                              
                                              $q_fasilitas = mysql_query('SELECT * FROM fasilitas');
                                              while ($r_fasilitas = mysql_fetch_array($q_fasilitas)) {
                                                  if(in_array($r_fasilitas[id_fasilitas],$check)){
                                                      echo '<li><input type="checkbox" name="fasilitas[]" value="' . $r_fasilitas['id_fasilitas'] . '" checked="checked"/>';
                                                      echo '<span>' . $r_fasilitas['nama_fasilitas'] . '</span></li>';
                                                  }else{
                                                      echo '<li><input type="checkbox" name="fasilitas[]" value="' . $r_fasilitas['id_fasilitas'] . '"/>';
                                                      echo '<span>' . $r_fasilitas['nama_fasilitas'] . '</span></li>';
                                                  }
                                              }
                                              ?>
                                          </ul>
                                          </div>
                                          <div class="form-group">
                                            <label>Harga kamar</label>
                                            <input type="text" class="form-control" name="harga" value="<?php print($view_kelas[5]);?>"/>
                                          </div>
                                          <div class="form-group">
                                            <label>Type Harga kamar</label>
                                            <select name="type" class="form-control">
                                            <option value="bulan" <?php if($view_kelas['6'] == 'bulan') echo 'selected="selected"'; ?> >Bulan</option>
                                            <option value="3bulan" <?php if($view_kelas['6'] == '3bulan') echo 'selected="selected"'; ?> >3 Bulan</option>
                                            <option value="6bulan" <?php if($view_kelas['6'] == '6bulan') echo 'selected="selected"'; ?> >6 Bulan</option>
                                            <option value="tahun" <?php if($view_kelas['6'] == 'tahun') echo 'selected="selected"'; ?> >Tahun</option>
                                            </select>
                                          </div>
                                          <div class="form-group">
                                            <label for="exampleInputFile">Gambar 1</label>
                                            <input type="file" name="fupload1">
                                            <p>
                                            <?php 

                                              if (empty($view_kelas['7'])){
                                                echo '<img src="images/photo_not_available.png" width="80">'; 
                                              } else {
                                                echo '<img src="images/kamar/'.$view_kelas['7'].'" width="80">'; 
                                              }
                                                
                                              ?>
                                            </p>
                                          </div>
                                          <div class="form-group">
                                            <label for="exampleInputFile">Gambar 2</label>
                                            <input type="file" name="fupload2">
                                            <p>
                                            <?php 

                                              if (empty($view_kelas['8'])){
                                                echo '<img src="images/photo_not_available.png" width="80">'; 
                                              } else {
                                                echo '<img src="images/kamar/'.$view_kelas['8'].'" width="80">'; 
                                              }
                                                
                                              ?>
                                            </p>
                                          </div>
                                          <div class="form-group">
                                            <label for="exampleInputFile">Gambar 3</label>
                                            <input type="file" name="fupload3">
                                            <p>
                                            <?php 

                                              if (empty($view_kelas['9'])){
                                                echo '<img src="images/photo_not_available.png" width="80">'; 
                                              } else {
                                                echo '<img src="images/kamar/'.$view_kelas['9'].'" width="80">'; 
                                              }
                                                
                                              ?>
                                            </p>
                                          </div>
                                          <div class="form-group">
                                            <label for="exampleInputFile">Gambar 4</label>
                                            <input type="file" name="fupload4">
                                            <p>
                                            <?php 

                                              if (empty($view_kelas['10'])){
                                                echo '<img src="images/photo_not_available.png" width="80">'; 
                                              } else {
                                                echo '<img src="images/kamar/'.$view_kelas['10'].'" width="80">'; 
                                              }
                                                
                                              ?>
                                            </p>
                                          </div>
                                          <div class="form-group">
                                            <input class="btn btn-primary" type="submit" value="Simpan" />
                                            <a class="btn btn-warning" href="kamar.php">Kembali</a>
                                          </div>
                                          
                                        </form>

                                        <?php
                                      

                                      $pemilik=$_POST['pemilik'];
                                      $deskripsi=$_POST['deskripsi'];
                                      $fasilitas=$_POST['fasilitas'];
                                      $harga=$_POST['harga'];
                                      $tipe=$_POST['tipe'];
                                      $type=$_POST['type'];

                                        $lokasi_file1 = $_FILES['fupload1']['tmp_name'];
                                        $nama_file1   = $_FILES['fupload1']['name'];

                                        $lokasi_file2 = $_FILES['fupload2']['tmp_name'];
                                        $nama_file2   = $_FILES['fupload2']['name'];

                                        $lokasi_file3 = $_FILES['fupload3']['tmp_name'];
                                        $nama_file3   = $_FILES['fupload3']['name'];

                                        $lokasi_file4 = $_FILES['fupload4']['tmp_name'];
                                        $nama_file4   = $_FILES['fupload4']['name'];



                                      if(isset($deskripsi,$fasilitas,$harga)){
                                        if((!$deskripsi)||(!$fasilitas)||(!$harga)){
                                        print "<script>alert ('Harap semua data diisi...!!');</script>";
                                        print"<script> self.history.back('Gagal Menyimpan');</script>"; 
                                        exit();
                                        } 

                                      move_uploaded_file($lokasi_file1,"images/kamar/$nama_file1");

                                      move_uploaded_file($lokasi_file2,"images/kamar/$nama_file2");

                                      move_uploaded_file($lokasi_file3,"images/kamar/$nama_file3");

                                      move_uploaded_file($lokasi_file4,"images/kamar/$nama_file4");

                                      $edit_kelas="UPDATE kamar SET id_pemilik='$pemilik',tipe='$tipe',deskripsi='$deskripsi',fasilitas='$fasilitas',harga='$harga',tipeharga='$type',gambar1='$nama_file1',gambar2='$nama_file2',gambar3='$nama_file3',gambar4='$nama_file4' 
                                      WHERE id_kamar='$id'";
                                      mysql_query($edit_kelas,$koneksi);

                                      $delete = mysql_query('DELETE FROM fasilitaskos WHERE id_kamar=' . $id);
                                      if ($delete && isset($_POST['fasilitas'])) {
                                          foreach ($_POST['fasilitas'] as $fasilitas) {
                                            mysql_query('INSERT INTO fasilitaskos(id_kamar,id_fasilitas) VALUES(' . $id . ',' . $fasilitas . ')');
                                              
                                          }
                                      }

                                      echo '
                                      <script type="text/javascript">
                                       
                                             alert ("Data Berhasil Diubah!");
                                             
                                      </script>
                                      ';
                                      echo '<meta http-equiv="refresh" content="1; url=kamar.php" />';
                                      
                                      } 

                                ?>
  
                            </div>
                            </div>
                    </div>
 
                </div>
        </div>
    </div>



