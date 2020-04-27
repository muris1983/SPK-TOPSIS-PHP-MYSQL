<?php
  include "header.php";
  ini_set("display_errors","Off");
  include("connect.php");
?>

<div class="content-wrapper">
        <div class="container">
              <div class="row">
                    <div class="col-lg-12 text-center">
                    <h1 class="mt-5">Tambah Kamar Kos</h1>
                    
                  </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                        
                        <div class="panel-body">

                            <form action="" method="post" enctype="multipart/form-data">
                                          <div class="form-group">
                                            <label>Nama Pemilik</label>
                                            <?php
                                            echo "<select class='form-control' name='pemilik'>
                                            <option value=0 selected>- Pilih Pemilik Kos -</option>";
                                            $tampil=mysql_query("SELECT * FROM pemilik ORDER BY id_pemilik DESC");
                                            while($r=mysql_fetch_array($tampil)){
                                            echo "<option value=$r[id_pemilik]>$r[nama]</option>";
                                            }
                                            echo "</select>";
                                            ?>
                                            
                                          </div>
                                          <div class="form-group">
                                            <label>Jenis Hunian Kos</label>
                                            <select class="form-control" name="tipe">
                                                <option value="0" selected>- Pilih Tipe -</option>
                                                <option value="putra">Kos Putra</option>
                                                <option value="putri">Kos Putri</option>
                                                <option value="campur">Kos Campur</option>
                                            </select>
                                          </div>
                                          <div class="form-group">
                                            <label>Deskripsi Kamar</label>
                                            <textarea class="form-control" name="deskripsi" rows="5" cols="50"></textarea>
                                          </div>
                                          <div class="form-group">
                                            <label>Fasilitas Kamar</label>
                                            <ul class="fasilitas">
                                                <?php
                                                $q_fasilitas = mysql_query('SELECT * FROM fasilitas');
                                                while ($r_fasilitas = mysql_fetch_array($q_fasilitas)) {
                                                    echo '<li><input type="checkbox" name="fasilitas[]" value="' . $r_fasilitas['id_fasilitas'] . '"/>';
                                                    echo '<span>' . $r_fasilitas['nama_fasilitas'] . '</span></li>';
                                                }
                                                ?>
                                            </ul>
                                          </div>
                                          <div class="form-group">
                                            <label>Harga kamar</label>
                                            <input type="text" class="form-control" name="harga"/>
                                          </div>
                                          <div class="form-group">
                                            <label>Jenis Sewa Harga Kamar</label>
                                            <select class="form-control" name="type">
                                                <option value="0" selected>- Pilih -</option>
                                                <option value="bulan">Bulan</option>
                                                <option value="3bulan">3 Bulan</option>
                                                <option value="6bulan">6 Bulan</option>
                                                <option value="tahun">Tahun</option>
                                            </select>
                                          </div>
                                          <div class="form-group">
                                            <label>Jarak Kos Dari Kampus Ke Tempat Hunian Kos.Contoh:Jika 1KM Tulis:1000</label>
                                            <input type="text" class="form-control" name="jarak"/>
                                          </div>
                                          <div class="form-group">
                                            <label for="exampleInputFile">Gambar 1</label>
                                            <input type="file" name="fupload1">
                                          </div>
                                          <div class="form-group">
                                            <label for="exampleInputFile">Gambar 2</label>
                                            <input type="file" name="fupload2">
                                          </div>
                                          <div class="form-group">
                                            <label for="exampleInputFile">Gambar 3</label>
                                            <input type="file" name="fupload3">
                                          </div>
                                          <div class="form-group">
                                            <label for="exampleInputFile">Gambar 4</label>
                                            <input type="file" name="fupload4">
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

                                      $add_kelas="INSERT INTO kamar(id_pemilik,tipe,deskripsi,fasilitas,harga,tipeharga,gambar1,gambar2,gambar3,gambar4,status) VALUES 
                                      ('$pemilik','$tipe','$deskripsi','$fasilitas','$harga','$type','$nama_file1','$nama_file2','$nama_file3','$nama_file4','y')";
                                      mysql_query($add_kelas,$koneksi);

                                      $data = mysql_fetch_array(mysql_query('SELECT id_kamar FROM kamar ORDER BY id_kamar DESC LIMIT 1'));

                                      foreach ($_POST['fasilitas'] as $fasilitas) {
                                          mysql_query('INSERT INTO fasilitaskos(id_kamar,id_fasilitas) VALUES(' . $data['id_kamar'] . ',' . $fasilitas . ')');
                                      }

                                      

                                      echo '
                                      <script type="text/javascript">
                                       
                                             alert ("Data Berhasil Ditambah!");
                                             
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

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
      $('#frm-mhs').validate({
        rules: {
          nama_pemilik : {
            minlength:2,
            required:true
          },
          nama_kos : {
            minlength:2,
            required:true
          },
          alamat : {
            required:true
          },
          telepon : {
            digits: true,
            maxlength:15,
            required:true
          }
        },
        messages: {
          nama_pemilik: {
            required: "* Kolom nama pemilik harus diisi",
            minlength: "Kolom nama pemilik harus terdiri dari minimal 2 digit"
          },
          nama_kos: {
            required: "* Kolom nama kos harus diisi",
            minlength: "Kolom nama kos harus terdiri dari minimal 2 digit"
          },
          alamat: {
            required: "* Kolom alamat harus diisi"
          },
          telepon: {
            required: "* Kolom telepon harus diisi",
            minlength: "Kolom nama kos harus terdiri dari minimal 2 digit",
            maxlength: "Kolom telepon harus maximal 15 digit"
          }
        }
      });
    });
    
    
    </script>