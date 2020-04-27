<?php
ini_set("display_errors","Off");
include("connect.php");
include "header.php";
?>

<style>

.portfolio-item {
  margin-bottom: 30px;
}

</style>

<div class="container">

      <!-- Page Heading -->
      <h1 class="my-4">
        HASIL PENCARIAN
      </h1>

      <div class="row">

      <?php
                  
                  $option = array();
                  
                   if (isset($_POST['keamanan']) && !empty($_POST['keamanan'])) {
                      $option[] = 'keamanankos.id_keamanan = "'.$_POST['keamanan'].'"';
                  }  

                  if (isset($_POST['kenyamanan']) && !empty($_POST['kenyamanan'])) {
                      $option[] = 'kenyamanankos.id_kenyamanan = "'.$_POST['kenyamanan'].'"';
                  } 

                  if (isset($_POST['kebersihan']) && !empty($_POST['kebersihan'])) {
                      $option[] = 'kebersihankos.id_kebersihan = "'.$_POST['kebersihan'].'"';
                  }

                  if (isset($_POST['nama']) && !empty($_POST['nama'])) {
                      $option[] = 'pemilik.nama_kos LIKE "%' . $_POST['nama'] . '%"';
                  }

                  if (isset($_POST['jenis'])) {

                      $jenis = implode(',', $_POST['jenis']);
                      if ($jenis == 'putra') {
                        $option[] = "kamar.tipe = 'putra'";                    
                      }

                      if ($jenis == 'putri') {
                        $option[] = "kamar.tipe = 'putri'";                    
                      }

                      if ($jenis == 'campur') {
                        $option[] = "kamar.tipe = 'campur'";                    
                      }
                  }

                  

                  if (isset($_POST['fasilitas'])) {
                      $in_fasilitas = implode(',', $_POST['fasilitas']);
                      $option[] = 'fasilitaskos.id_fasilitas IN (' . $in_fasilitas . ')';
                  }
                  
                  if(isset($_POST['type_sewa']) && isset($_POST['harga_sewa']) && $_POST['type_sewa'] != '0' && $_POST['harga_sewa'] != '0'){                                         
                      
                      $harga = explode('-', $_POST['harga_sewa']);

                      if(isset($harga[1])){

                          $option[] = 'kamar.harga >='.$harga[0].' AND kamar.harga <='.$harga[1]. ' AND kamar.tipeharga="'.$_POST['type_sewa'].'"';

                      }else{

                          $option[] = 'kamar.harga >='.$harga[0]. ' AND kamar.tipeharga="'.$_POST['type_sewa'].'"';

                      }
                  } 



                  $conditions = '';

                  if(count($option) > 0){
                      $conditions = '';
                       $conditions = implode($option, ' AND ');
                  }
                  ?>


                    <?php
                    $kolom = 3;
                    $i = 0;
                    $sql = mysql_query("
                    SELECT DISTINCT nama_kos,kamar.*,
                    (SELECT kamar.status
                        FROM kamar
                        ORDER BY kamar.status DESC LIMIT 1),
                    (SELECT kamar.harga
                        FROM kamar
                        ORDER BY kamar.tipeharga DESC LIMIT 1),
                    (SELECT kamar.tipeharga
                        FROM kamar
                        ORDER BY kamar.tipeharga DESC LIMIT 1),
                    (SELECT COUNT(status)
                        FROM kamar
                        WHERE kamar.status= 'y'),
                   (SELECT COUNT(tipe)
                        FROM kamar
                        WHERE kamar.tipe = 'putra'),
                    (SELECT COUNT(tipe)
                        FROM kamar
                        WHERE kamar.tipe = 'putri'),
                    (SELECT COUNT(tipe)
                        FROM kamar
                        WHERE kamar.tipe = 'campur')
                    FROM kamar
                    LEFT JOIN pemilik ON kamar.id_pemilik = pemilik.id_pemilik
                    LEFT JOIN keamanankos ON kamar.id_kamar = keamanankos.id_kamar
                    LEFT JOIN kenyamanankos ON kamar.id_kamar = kenyamanankos.id_kamar
                    LEFT JOIN kebersihankos ON kamar.id_kamar = kebersihankos.id_kamar
                    LEFT JOIN fasilitaskos ON kamar.id_kamar = fasilitaskos.id_kamar WHERE
                    ".$conditions);

                    if (mysql_num_rows($sql) > 0)
                                      {


                    while($data = mysql_fetch_array($sql)){
                        if ($i >= $kolom) {
                            echo "";
                            $i = 0;
                        }
                        $i++;
                        $nominal = $data['harga'];
                        $harga = number_format($nominal,2,",",".");
                    ?>

        
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="detailkamar.php?idk=<?php echo $data[id_kamar]; ?>"><img class="card-img-top" src="images/kamar/<?php echo $data['gambar1']; ?>" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="detailkamar.php?idk=<?php echo $data[id_kamar]; ?>"><?php echo $data['nama_kos']; ?></a>
              </h4>
              <div>
                                      <?php 
                                      if ($data['tipe']=='putra'){
                                        echo '<img src="images/avatar-male2.png" alt="male" style="width:20px; height:20px;"> Putra';
                                      } else if ($data['tipe']=='putri') {
                                        echo '<img src="images/avatar-female.png" alt="male" style="width:20px; height:20px;"> Putri';
                                      } else {
                                        echo '<img src="images/avatar-male2.png" alt="male" style="width:20px; height:20px;"><img src="images/avatar-female.png" alt="male" style="width:20px; height:20px;"> Campur';
                                      }
                                      
                                      ?>
                                    
              </div>
              <div>
                <span>Rp. <?php echo $harga; ?>/ bulan</span>
              </div>
              <br>
              <p class="card-text"><?php echo substr($data['deskripsi'], 0,80);?></p>
            </div>
          </div>
        </div>


        <?php
                    }
                    ?>



                    <?php
                    }
                    else
                    {
                        //print error message
                        echo '
                        <div class="col-lg-12 text-center">
                        <h3><strong>Maaf!</strong> Pencarian Anda Tidak Bisa Kami Temukan.</h3>
                                                
                          <p align="center"><img src="images/error-icon-notebook-design-template-website-white-background-graphic-98813130.jpg"></p>
                        
                        </div>';
                    }
                    ?>


      </div>
      <!-- /.row -->


     
    </div>