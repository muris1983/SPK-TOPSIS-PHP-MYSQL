<?php
  include "header.php";
  include "connect.php";
?>

    <?php
    $id=$_GET['idk'];
    $show_kelas="SELECT * FROM kamar WHERE id_pemilik='$id'";
    $hasil_kelas=mysql_query($show_kelas,$koneksi);
    $view_kelas=mysql_fetch_row($hasil_kelas);

    ?>

    <script src="js/jquery.js"></script>
    <script src="js/validator.min.js"></script>
        
    <script>
    $(document).ready(function(){
        $('form').parsley();
    });
    </script>

    <div class="container">

      <h1 class="mt-5">Input Kamar Pemilik Kos</h1>
      <div class="row">
        <div class="col-lg-12">

          


              <?php 

                if (mysql_num_rows($hasil_kelas) > 0) {

              ?>

              <div class="table-responsive">
              <br>
                <p align="center">
                  <img src="images/sr1-icon-noResult.png"><br><br>
                  <strong>Maaf!! Kamar Sudah Terisi</strong>
                </p>
                
              
              </div>

              




              <?php 
              } else {
                  $q="SELECT * FROM pemilik WHERE id_pemilik='$id'";
                  $a=mysql_query($q,$koneksi);
                  $b=mysql_fetch_array($a);
                  $idpemilik=$b['id_pemilik'];
              ?>



              <div class="table-responsive">
                <form action="" class="form-horizontal" data-toggle="validator" role="form" method="post" enctype="multipart/form-data">
            <table class="table" align="left">
              <tr>
              <td>ID Pemilik Kos</td>
              <td><input readonly type="text" class="form-control" name="idpemilik" value="<?php echo $idpemilik; ?>"></td>
            </tr>
            <?php
            $q = mysql_query("select * from kriteria ORDER BY id_kriteria");
            while ($r = mysql_fetch_array($q)) 
            { 
            ?>        
            <tr>
              <td width="200"> 
                <?php echo $r['nama_kriteria']; ?> (<?php echo $r['atribut']; ?>)
              </td>
                <td width="200"> 
                    <div class="form-group">
                              <?php
                                                $querykriteria = mysql_query("SELECT * FROM kriteria,t_kriteria WHERE kriteria.id_kriteria = t_kriteria.id_kriteria AND t_kriteria.id_kriteria='$r[id_kriteria]'");
                                                while ($datakriteria = mysql_fetch_array($querykriteria))
                                                {
                                                  ?>

                                                  <div class="radio">
                                                    <label><input required type="radio" name="kepentingan<?php echo $datakriteria['id_kriteria']; ?>" value="<?php echo $datakriteria['nkriteria']; ?>"> <?php echo $datakriteria['keterangan']; ?></label>
                                                  </div>
                                                    
                                                  <?php
                                                }
                              ?>
                              <div class="help-block with-errors"></div>
                    </div>
                </td>
            </tr>
            <?php } ?>
            
             <tr>
              <td>Deskripsi Kamar</td>
              <td><textarea class="form-control" name="deskripsi" rows="5" cols="50" ></textarea></td>
              </tr>
            <tr>
              <td>Tipe Kos</td>
              <td><select class="form-control" name="tipe">
                                                <option value="0" selected>- Pilih Tipe -</option>
                                                <option value="putra">Kos Putra</option>
                                                <option value="putri">Kos Putri</option>
                                                <option value="campur">Kos Campur</option>
                                            </select></td>
            </tr>
            <tr>
              <td>Jenis Sewa Kamar</td>
              <td>

                                                <select class="form-control" name="type">
                                                <option value="0" selected>- Pilih -</option>
                                                <option value="bulan">Bulan</option>
                                                <option value="3bulan">3 Bulan</option>
                                                <option value="6bulan">6 Bulan</option>
                                                <option value="tahun">Tahun</option>
                                        
              </td>
            </tr>
            <tr>
              <td>Harga Kamar</td>
              <td><input type="text" class="form-control" name="harga" ></td>
            </tr>
            
                     
            
            
            <tr>
              <td>Gambar1</td>
              <td><input type="file" name="fupload1"></td>
            </tr>
            <tr>
              <td>Gambar2</td>
              <td><input type="file" name="fupload2"></td>
            </tr>
            <tr>
              <td>Gambar3</td>
              <td><input type="file" name="fupload3"></td>
            </tr>
            <tr>
              <td>Gambar4</td>
              <td><input type="file" name="fupload4"></td>
            </tr>
            <tr>
              <td colspan="2"><input id="btn-fblogin" class="btn btn-primary" type="submit" value="Input Data Kamar Kos" /></td>
            </tr>
            </table>
          </form>
          </div>


                                <?php
                                      

                                      $deskripsi=$_POST['deskripsi'];
                                      $harga=$_POST['harga'];
                                      $tipe=$_POST['tipe'];
                                      $type=$_POST['type'];
                                      $idpemilik=$_POST['idpemilik'];



                                        $lokasi_file1 = $_FILES['fupload1']['tmp_name'];
                                        $nama_file1   = $_FILES['fupload1']['name'];

                                        $lokasi_file2 = $_FILES['fupload2']['tmp_name'];
                                        $nama_file2   = $_FILES['fupload2']['name'];

                                        $lokasi_file3 = $_FILES['fupload3']['tmp_name'];
                                        $nama_file3   = $_FILES['fupload3']['name'];

                                        $lokasi_file4 = $_FILES['fupload4']['tmp_name'];
                                        $nama_file4   = $_FILES['fupload4']['name'];

                                      if(isset($deskripsi,$harga)){
                                        

                                      move_uploaded_file($lokasi_file1,"images/kamar/$nama_file1");

                                      move_uploaded_file($lokasi_file2,"images/kamar/$nama_file2");

                                      move_uploaded_file($lokasi_file3,"images/kamar/$nama_file3");

                                      move_uploaded_file($lokasi_file4,"images/kamar/$nama_file4");

                                      for ($i=1; $i<=6; $i++)
                                      {
                                          $kepentinganku = $_POST['kepentingan'.$i];

                                          if ((!empty($kepentinganku)))
                                          {
                                             $query = "INSERT INTO analisa (id_kriteria, id_pemilik, nilainya) VALUES ('$i', '$idpemilik', '$kepentinganku')";
                                             $hasil = mysql_query($query);

                                          }
                                      }

                                      $add_kelas="INSERT INTO kamar(id_pemilik,tipe,deskripsi,harga,tipeharga,gambar1,gambar2,gambar3,gambar4,status) VALUES 
                                      ('$idpemilik','$tipe','$deskripsi','$harga','$type','$nama_file1','$nama_file2','$nama_file3','$nama_file4','y')";
                                      mysql_query($add_kelas,$koneksi);

                                      echo '
                                      <script type="text/javascript">
                                       
                                             alert ("Data Berhasil Ditambah!");
                                             
                                      </script>
                                      ';
                                      echo '<meta http-equiv="refresh" content="1; url=pemilik.php" />';

                                      
                                      
                                      } 

                                ?>
                                

              <?php
              }
              ?>
              
          
        </div>
        
      </div>
    </div>
 