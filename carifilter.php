<?php
ini_set("display_errors","Off");
include("connect.php");
include "header.php";


?>


        <link type="text/css" href="css/ui-lightness/jquery-ui-1.8.21.custom.css" rel="stylesheet" />
        <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui-1.8.21.custom.min.js"></script>
        <script type="text/javascript" src="js/validate.js"></script>
        <br>
<section class="second listingDetail ng-scope" ng-controller="ListingDetailController">
  <div class="container contentAllCK">

        <div class="row">

            <div class="col-md-12 col-md-offset-1 listing-wrapper">
                <div>
                    
                </div>
                <h1 class="listingTitle"><p align="center">PENCARIAN HUNIAN KOS</p></h1>
                
                
                <div class="col-md-12 removePadding showDesktop">
                    
                    <div style="margin-bottom:20px;">
<script type="text/javascript">
    $('.search-check').live('click',function(){
        $('.hidden').hide();
        if($(this).val() == 'ya'){
            $('.hidden').show();
        }
    });
    
    $('#type-sewa').live('change',function(){
        var option = '<option value="0">Semua Harga Sewa</option>';
        if($(this).val() == 'bulan'){
            option = option
                +'<option value="500000">Lebih dari Rp. 500.000</option>'
                +'<option value="300000-500000">Rp. 300.000 - Rp. 500.000</option>'
                +'<option value="250000-300000">Rp. 250.000 - Rp. 300.000</option>'
                +'<option value="250000-200000">Rp. 200.000 - Rp. 250.000</option>';
        }else if($(this).val() == '3bulan'){
            option = option+'<option value="1000000-2500000">Rp. 1.000.000 - Rp. 2.500.000</option>'
                +'<option value="2500000-5000000">Rp. 2.500.000 - Rp. 5.000.000</option>'
                +'<option value="5000000">Lebih dari Rp. 5.000.000</option>';
        }else if($(this).val() == '6bulan'){
            option = option+'<option value="1000000-2500000">Rp. 1.000.000 - Rp. 2.500.000</option>'
                +'<option value="2500000-5000000">Rp. 2.500.000 - Rp. 5.000.000</option>'
                +'<option value="5000000">Lebih dari Rp. 5.000.000</option>';
        }else if($(this).val() == 'tahun'){
            option = option+'<option value="1500000-3000000">Rp. 1.500.000 - Rp. 3.000.000</option>'
                +'<option value="3000000-5000000">Rp. 3.000.000 - Rp. 5.000.000</option>'
                +'<option value="5000000-8000000">Rp. 5.000.000 - Rp. 8.000.000</option>'
                +'<option value="8000000">Lebih dari Rp. 8.000.000</option>';
        }
        $('#harga-sewa').html(option);
    });
</script>
  <div>

    

    <form action="caricustom.php" method="post">

        <div class="row">
          <div class="col-sm-4">
            <h3 class="panel-title" data-toggle="collapse" data-target="#panelOne" aria-expanded="true">Cari Nama Hunian Kos</h3>
            <input type="text" name="nama" class="form-control"/>
            <br>
            <h3 class="panel-title" data-toggle="collapse" data-target="#panelOne" aria-expanded="true">Cari Tipe Hunian Kos</h3>
            <ul class="list-group">
                    <?php
                    $jenis = mysql_query('SELECT DISTINCT tipe FROM kamar ORDER BY tipe ASC');
                    while ($r = mysql_fetch_array($jenis)) {
                        echo '<li class="list-group-item"><input type="checkbox" name="jenis[]" value="'.$r['tipe'].'"/>';
                        echo ' <span> ' . $r['tipe'] . '</span></li>';
                    }
                    ?>
                </ul>
            
            <h3 class="panel-title" data-toggle="collapse" data-target="#panelOne" aria-expanded="true">Cari Keamanan</h3>
                                            <?php
                                            echo "<select class='form-control' name='keamanan'>
                                            <option value=0 selected>- Pilih Keamanan -</option>";
                                            $tampil=mysql_query("SELECT * FROM keamanan ORDER BY id_keamanan DESC");
                                            while($r=mysql_fetch_array($tampil)){
                                            echo "<option value=$r[id_keamanan]>$r[keamanannya]</option>";
                                            }
                                            echo "</select>";
                                            ?>

          </div>
          <div class="col-sm-4">

            <h3 class="panel-title" data-toggle="collapse" data-target="#panelOne" aria-expanded="true">Cari Harga Hunian Kos</h3>

                <select class="form-control" id="type-sewa" name="type_sewa">
                    <option value="0">Semua Jenis Sewa</option>
                    <option value="bulan">Bulanan</option>
                    <option value="3bulan">3 Bulanan</option>
                    <option value="6bulan">6 Bulanan</option>
                    <option value="tahun">Tahunan</option>
                </select>
                <br>
                <select class="form-control" id="harga-sewa" name="harga_sewa">
                    <option value="0">-- Pilih Harga Sewa --</option>
                </select>
                <br>
                <h3 class="panel-title" data-toggle="collapse" data-target="#panelOne" aria-expanded="true">Cari Berdasarkan Jarak</h3>
                
                <select class="form-control" name="jarak">
                    <option value="0">Semua Jarak</option>
                    <option value="1000">Lebih Dari 1 KM</option>
                    <option value="500-1000">500M - 1KM</option>
                    <option value="250-500">250M - 500M</option>
                    <option value="50-250">50M - 250M</option>
                </select>
                <br>
                <h3 class="panel-title" data-toggle="collapse" data-target="#panelOne" aria-expanded="true">Cari Kebersihan</h3>
                                            <?php
                                            echo "<select class='form-control' name='kebersihan'>
                                            <option value=0 selected>- Pilih Kebersihan -</option>";
                                            $tampil=mysql_query("SELECT * FROM kebersihan ORDER BY id_kebersihan DESC");
                                            while($r=mysql_fetch_array($tampil)){
                                            echo "<option value=$r[id_kebersihan]>$r[kebersihannya]</option>";
                                            }
                                            echo "</select>";
                                            ?>
                <br>
                <h3 class="panel-title" data-toggle="collapse" data-target="#panelOne" aria-expanded="true">Cari Kenyamanan</h3>
                                            <?php
                                            echo "<select class='form-control' name='kenyamanan'>
                                            <option value=0 selected>- Pilih Kenyamanan -</option>";
                                            $tampil=mysql_query("SELECT * FROM kenyamanan ORDER BY id_kenyamanan DESC");
                                            while($r=mysql_fetch_array($tampil)){
                                            echo "<option value=$r[id_kenyamanan]>$r[kenyamanannya]</option>";
                                            }
                                            echo "</select>";
                                            ?>

          </div>
          <div class="col-sm-4">

            <h3 class="panel-title" data-toggle="collapse" data-target="#panelOne" aria-expanded="true">Cari Fasilitas Hunian Kos</h3>

            <ul class="list-group">
                    <?php
                    $q_fasilitas = mysql_query('SELECT * FROM fasilitas');
                    while ($r_fasilitas = mysql_fetch_array($q_fasilitas)) {
                        echo '<li class="list-group-item"><input class="single-checkbox" type="checkbox" name="fasilitas[]" value="' . $r_fasilitas['id_fasilitas'] . '"/>';
                        echo ' <span> ' . $r_fasilitas['nama_fasilitas'] . '</span></li>';
                    }
                    ?>
                </ul>

          </div>

          <input class="btn btn-primary" type="submit" value="Cari Data" />

        </div>

        
                        </div>
</form>
                        
                    </div>
                    
                    
                    

                </div>
                
                <div class="clear"></div>
                

                
    
            </div>
        </div>
    </div>
</section>
