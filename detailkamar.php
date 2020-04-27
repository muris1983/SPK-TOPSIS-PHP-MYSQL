<?php
ini_set("display_errors","Off");
include("connect.php");
include "header.php";
?>


	<?php
	
	$id=$_GET['idk'];

	$sql = mysql_query("SELECT * FROM pemilik,kamar WHERE pemilik.id_pemilik = kamar.id_pemilik AND kamar.id_kamar='$id'");
	$data = mysql_fetch_array($sql);

	$nominal = $data['harga'];
	$harga = number_format($nominal,2,",",".");

	?>
<style type="text/css">
.gallery-wrap .img-big-wrap img {
    height: 450px;
    width: 458px;
    display: inline-block;
    cursor: zoom-in;
}


.gallery-wrap .img-small-wrap .item-gallery {
    width: 60px;
    height: 40px;
    border: 1px solid #ddd;
    margin: 7px 2px;
    display: inline-block;
    overflow: hidden;
}

.gallery-wrap .img-small-wrap {
    text-align: center;
}
.gallery-wrap .img-small-wrap img {
    max-width: 100%;
    max-height: 100%;
    object-fit: cover;
    border-radius: 4px;
    cursor: zoom-in;
}
</style>
<link href="css/bootstrap.min.css" rel="stylesheet" />
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
  <br>
<div class="card">
  <div class="row">
    <aside class="col-sm-5 border-right">
<article class="gallery-wrap"> 
<div class="img-big-wrap">
  <div> <a href="#"><img src="images/kamar/<?php echo $data[gambar1]; ?>"></a></div>
  <hr>

  <dl class="param param-feature">
  <dt>Fasilitas Kos</dt>
  <dd>
    <?php
                        $fasilitas = mysql_query("SELECT * FROM fasilitas,fasilitaskos WHERE fasilitas.id_fasilitas = fasilitaskos.id_fasilitas AND fasilitaskos.id_kamar='$id'");
                        while ($r_fasilitas = mysql_fetch_array($fasilitas)) {
                            echo '' . $r_fasilitas[nama_fasilitas] . ', ';
                            
                        }
                        ?>
  </dd>
</dl>

<hr>

<dl class="param param-feature">
  <dt>Nilai Bobot Kriteria</dt>
  <dd>

    <p>
                        
                        <?php
                        $analisa = mysql_query("SELECT * 
                                                FROM analisa
                                                LEFT JOIN pemilik ON analisa.id_pemilik = pemilik.id_pemilik
                                                LEFT JOIN kamar ON kamar.id_pemilik = pemilik.id_pemilik 
                                                LEFT JOIN kriteria ON kriteria.id_kriteria = analisa.id_kriteria 
                                                WHERE kamar.id_kamar='$id'");
                        while ($bobot = mysql_fetch_array($analisa)) {
                            echo '' . $bobot[nama_kriteria] . ' : 
                            ';
                            if ($bobot[nilainya]==1) {
                                echo '<b>Sangat Buruk</b>';
                            } else if ($bobot[nilainya]==2) {
                                echo '<b>Buruk</b>';
                            } else if ($bobot[nilainya]==3) {
                                echo '<b>Cukup</b>';
                            } else if ($bobot[nilainya]==4) {
                                echo '<b>Baik</b>';
                            } else {
                                echo '<b>Sangat Baik</b>';
                            }
                            ;
                            echo '<br>';
                            
                        }
                        ?>


                    </p>

  </dd>
</dl>

</div> <!-- slider-product.// -->

</article> <!-- gallery-wrap .end// -->
    </aside>
    <aside class="col-sm-7">
<article class="card-body p-5">
  <h3 class="title mb-3"><?php echo $data[nama_kos]; ?></h3>

<p class="price-detail-wrap"> 
  <span class="price h3 text-warning"> 
    <span class="currency">Rp. <?php echo $harga; ?></span>
  </span> 
  <span>/bulan</span> 
</p> <!-- price-detail-wrap .// -->
<dl class="item-property">
  <dt>Deskripsi</dt>
  <dd><p><?php echo $data[deskripsi]; ?></p></dd>
</dl>
<dl class="param param-feature">
  <dt>Alamat</dt>
  <dd><?php echo $data[alamat]; ?></dd>
</dl>  <!-- item-property-hor .// -->
<dl class="param param-feature">
  <dt>Info Pemilik Kos</dt>
  <dd><?php echo $data[nama]; ?> </dd>
</dl>  <!-- item-property-hor .// -->
<dl class="param param-feature">
  <dt>No.Telepon</dt>
  <dd><?php echo $data[telepon]; ?></dd>
</dl>  <!-- item-property-hor .// -->

<dl class="param param-feature">
  <dt>Hunian Kos Untuk</dt>
  <dd>
    <?php 
                                      if ($data['tipe']=='putra'){
                                        echo '<img src="images/avatar-male2.png" alt="male" style="width:20px; height:20px;"> Putra';
                                      } else if ($data['tipe']=='putri') {
                                        echo '<img src="images/avatar-female.png" alt="male" style="width:20px; height:20px;"> Putri';
                                      } else {
                                        echo '<img src="images/avatar-male2.png" alt="male" style="width:20px; height:20px;"><img src="images/avatar-female.png" alt="male" style="width:20px; height:20px;"> Campur';
                                      }
                                      
                                      ?>
  </dd>
</dl>

<dl class="param param-feature">
  <dt>No.Telepon</dt>
  <dd><?php echo $data[telepon]; ?></dd>
</dl>





<hr>
  

  <hr>
  
  
</article> <!-- card-body.// -->
    </aside> <!-- col.// -->
  </div> <!-- row.// -->
</div> <!-- card.// -->

<br><br><br>

<div class="row">

         <div class="col-lg-3 col-md-4 col-xs-6">
          <a href="#" class="d-block mb-4 h-100">
            <img class="img-fluid img-thumbnail" style="width:200px;height:200px" src="images/kamar/<?php echo $data[gambar1]; ?>" alt="">
          </a>
        </div>
        <div class="col-lg-3 col-md-4 col-xs-6">
          <a href="#" class="d-block mb-4 h-100">
            <img class="img-fluid img-thumbnail" style="width:200px;height:200px" src="images/kamar/<?php echo $data[gambar2]; ?>" alt="">
          </a>
        </div>
        <div class="col-lg-3 col-md-4 col-xs-6">
          <a href="#" class="d-block mb-4 h-100">
            <img class="img-fluid img-thumbnail" style="width:200px;height:200px" src="images/kamar/<?php echo $data[gambar3]; ?>" alt="">
          </a>
        </div>
        <div class="col-lg-3 col-md-4 col-xs-6">
          <a href="#" class="d-block mb-4 h-100">
            <img class="img-fluid img-thumbnail" style="width:200px;height:200px" src="images/kamar/<?php echo $data[gambar4]; ?>" alt="">
          </a>
        </div>
        

      </div>

<div class="col-md-12 removePadding">

        <p><strong>Peta Google Maps</stong></p>

                    <style>
                       #map {
                        height: 400px;
                        width: 500px;
                       }

                        #map {
                          margin-right: 400px;
                        }

                       #floating-panel {
                          position: absolute;
                          top: 10px;
                          left: 25%;
                          z-index: 5;
                          background-color: #fff;
                          padding: 5px;
                          border: 1px solid #999;
                          text-align: center;
                          font-family: 'Roboto','sans-serif';
                          line-height: 30px;
                          padding-left: 10px;
                        }

                        #floating-panel {
                          background: #fff;
                          padding: 5px;
                          font-size: 14px;
                          font-family: Arial;
                          border: 1px solid #ccc;
                          box-shadow: 0 2px 2px rgba(33, 33, 33, 0.4);
                          display: none;
                        }

                        #right-panel {
                          font-family: 'Roboto','sans-serif';
                          line-height: 30px;
                          padding-left: 10px;
                        }

                        #right-panel select, #right-panel input {
                          font-size: 15px;
                        }

                        #right-panel select {
                          width: 100%;
                        }

                        #right-panel i {
                          font-size: 12px;
                        }
                        #right-panel {
                          height: 100%;
                          float: right;
                          width: 390px;
                          overflow: auto;
                        }


                    </style>

                    <div id="floating-panel">
                        <p>CEK JARAK :</p>
                      <strong>Start:</strong>
                      <select id="start">
                        <option value="-7.434842, 109.250192">Kampus</option>
                      </select>
                      <br>
                      <strong>End:</strong>
                      <select id="end">
                        <option value="0">Pilih</option>
                        <option value="<?php echo $data[latitude]; ?>, <?php echo $data[longtitude]; ?>">Hunian Kos</option>
                      </select>
                    </div>
                    <div id="right-panel"></div>
                    <div id="map"></div>

                    <script>
                      function initMap() {
                        var directionsDisplay = new google.maps.DirectionsRenderer;

                        var directionsService = new google.maps.DirectionsService;

                        var map = new google.maps.Map(document.getElementById('map'), {
                          zoom: 18,
                          center: {lat: <?php echo $data[latitude]; ?>, lng: <?php echo $data[longtitude]; ?>}
                        });

                        var marker = new google.maps.Marker({
                          position: {lat: <?php echo $data[latitude]; ?>, lng: <?php echo $data[longtitude]; ?>},
                          map: map
                        });

                        directionsDisplay.setMap(map);
                        directionsDisplay.setPanel(document.getElementById('right-panel'));

                        var control = document.getElementById('floating-panel');
                        control.style.display = 'block';
                        map.controls[google.maps.ControlPosition.TOP_CENTER].push(control);

                        var onChangeHandler = function() {
                          calculateAndDisplayRoute(directionsService, directionsDisplay);
                        };
                        document.getElementById('start').addEventListener('change', onChangeHandler);
                        document.getElementById('end').addEventListener('change', onChangeHandler);
                      }

                      function calculateAndDisplayRoute(directionsService, directionsDisplay) {
                        var start = document.getElementById('start').value;
                        var end = document.getElementById('end').value;
                        directionsService.route({
                          origin: start,
                          destination: end,
                          travelMode: 'DRIVING'
                        }, function(response, status) {
                          if (status === 'OK') {
                            directionsDisplay.setDirections(response);
                          } else {
                            window.alert('Directions request failed due to ' + status);
                          }
                        });
                      }
                    </script>
                    
                    <script async defer
                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBzjlJZbxS887CEslBYYRttpKfP7J6R21I&callback=initMap">
                    </script>
                   
                </div>

</div>
<!--container.//-->



