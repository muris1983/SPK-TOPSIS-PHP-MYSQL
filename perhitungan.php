<?php
  include "header.php";
include "menu.php";
  ini_set("display_errors","Off");
  include("connect.php");
?>
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap4.min.js"></script>

<div class="page-wrapper">
            
            <div class="container-fluid">
                
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                   
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-block">
                                
                                
                                
                        <?php

                                function jml_kriteria(){    

                                            $sql = "SELECT * FROM kriteria";
                                            $query = mysql_query($sql);
                                            $count = mysql_num_rows($query);

                                            return $count;
                                            
                                        }

                                function get_kriteria(){

                                            $kriteria = mysql_query("SELECT * FROM kriteria");
                                            $i=1;
                                            while ($dataakriteria = mysql_fetch_array($kriteria))
                                            {
                                                $kri[$i] = $dataakriteria['nama_kriteria'];
                                                $i++;
                                            }
                                            
                                            return $kri;
                                        }

                                function jml_alternatif(){  

                                            $sql = "SELECT * FROM analisa GROUP BY id_pemilik";
                                            $query = mysql_query($sql);
                                            $alternatif = mysql_num_rows($query);

                                            return $alternatif;
                                            
                                        }

                                function get_alt_name(){
                                            
                                            $alternatif = mysql_query("SELECT * FROM pemilik");
                                            $i=0;
                                            while ($dataalternatif = mysql_fetch_array($alternatif))
                                            {
                                                $alt[$i] = $dataalternatif['nama_kos'];
                                                $i++;
                                            }
                                            
                                            return $alt;

                                }

                                function get_alternatif(){

                                            $alternatifkriteria = array();

                                            $queryalternatif = mysql_query("SELECT * FROM pemilik ORDER BY id_pemilik");
                                            $i=0;
                                            while ($dataalternatif = mysql_fetch_array($queryalternatif))
                                            {

                                                $querykriteria = mysql_query("SELECT * FROM kriteria ORDER BY id_kriteria");
                                                $j=0;
                                                while ($datakriteria = mysql_fetch_array($querykriteria))
                                                {
                                                    $queryalternatifkriteria = mysql_query("SELECT * FROM analisa WHERE id_pemilik = '$dataalternatif[id_pemilik]' AND id_kriteria = '$datakriteria[id_kriteria]'");
                                                    $dataalternatifkriteria = mysql_fetch_array($queryalternatifkriteria);
                                                    
                                                    $alternatifkriteria[$i][$j] = $dataalternatifkriteria['nilainya'];

                                                    $j++;
                                                }
                                                $i++;
                                            }
                                            
                                            return $alternatifkriteria;
                                        }

                                function pembagi(){

                                    $pembagi = array();
    
                                    for ($i=0;$i<count($kriteria);$i++)
                                    {
                                        $pembagi[$i] = 0;
                                        for ($j=0;$j<count($alternatif);$j++)
                                        {
                                            $pembagi[$i] = $pembagi[$i] + ($alternatifkriteria[$j][$i] * $alternatifkriteria[$j][$i]);
                                        }
                                        $pembagi[$i] = sqrt($pembagi[$i]);
                                    }

                                            
                                            return $pembagi;
                                }

                                function get_kepentingan(){

                                            $kepentingan = mysql_query("SELECT * FROM kriteria");
                                            $i=0;
                                            while ($datakepentingan = mysql_fetch_array($kepentingan))
                                            {
                                                $kep[$i] = $datakepentingan['bobot_nilai'];
                                                $i++;
                                            }
                                            
                                            return $kep;


                                }

                                function get_costbenefit(){

                                            $costbenefit = mysql_query("SELECT * FROM kriteria");
                                            $i=0;
                                            while ($datacostbenefit = mysql_fetch_array($costbenefit))
                                            {
                                                $cb[$i] = $datacostbenefit['atribut'];
                                                $i++;
                                            }
                                            
                                            return $cb;


                                }

                                function cmp($a, $b){
                                            if ($a == $b) {
                                                return 0;
                                            }
                                            return ($a > $b) ? -1 : 1;
                                        }

                                        function print_ar(array $x){    //just for print array
                                            echo "<pre>";
                                            print_r($x);
                                            echo "</pre></br>";
                                        }



                                $k = jml_kriteria();

                                $kri = get_kriteria();

                                $a = jml_alternatif();

                                $alt = get_alternatif();

                                $alt_name = get_alt_name();

                                $kep = get_kepentingan();

                                $cb = get_costbenefit();


                                ?>

    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h1 class="mt-5">PERHITUNGAN TOPSIS</h1>

          <div class="panel panel-default">
                        
                        <div class="panel-body">
                            <div class="table-responsive">
                                
                            <ul class="nav nav-tabs">
                              <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#home">Matrix Ternormalisasi</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#menu1">Matrix Normalisasi Terbobot</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#menu2">Solusi Ideal positif Negatif</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#menu3">Preferensi</a>
                              </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                              <div class="tab-pane container active" id="home">
                                <hr>
                                <h3 class="page-head-line">HASIL ANALISA</h3>
                                <hr>

                                    <div class="table-responsive">
                              

                                <table class="table table-striped table-bordered table-hover">

                                    <thead>
                                        <tr><th>Alternatif / Kriteria</th>

                                        <?php
                                        for($i=1;$i<=$k;$i++){
                                            echo "<th>".ucwords($kri[$i])."</th>";
                                            
                                        }
                                        ?>
                                        </tr>
                                    </thead>
                                    
                                    <tr>
                                        <?php
                                        for($i=0;$i<$a;$i++){

                                            echo "<tr><td><b>".ucwords($alt_name[$i])."</b></td>";

                                            for($j=0;$j<$k;$j++){
                                                echo "<td>".$alt[$i][$j]."</td>";
                                            }

                                            echo "</tr>";
                                        }
                                        ?>

                                    </tr>
                                    

                                </table>





                            </div>
                                 
                                <hr>
                                <h3 class="page-head-line">PEMBAGI</h3>
                                <hr>

                                    <div class="table-responsive">
                              

                                <table class="table table-striped table-bordered table-hover">

                                    <thead>
                                        <tr><th>#</th>

                                        <?php
                                        for($i=1;$i<=$k;$i++){
                                            echo "<th>".ucwords($kri[$i])."</th>";
                                            
                                        }
                                        ?>
                                        </tr>
                                    </thead>
                                    
                                    <tr><td><b>Pembagi</b></td>

                                    <?php
                                    
                                        for($i=0;$i<$k;$i++){
                                            $pembagi[$i] = 0;
                                            for($j=0;$j<$a;$j++){
                                                $pembagi[$i] = $pembagi[$i] + pow($alt[$j][$i],2);
                                            }
                                            $pembagi[$i] = round(sqrt($pembagi[$i]),4);
                                            echo "<td>".$pembagi[$i]."</td>";
                                        }
                                                                        
                                    ?>

                                    </tr>
                                </table>

                                



                            </div>
                            <hr>
                            <h3 class="page-head-line">MATRIX TERNORMALISASI</h3>
                            <hr>

                                    <div class="table-responsive">
                              

                                <table class="table table-striped table-bordered table-hover">

                                    <thead>
                                        <tr><th>Alternatif / Kriteria</th>

                                        <?php
                                        for($i=1;$i<=$k;$i++){
                                            echo "<th>".ucwords($kri[$i])."</th>";
                                            
                                        }
                                        ?>
                                        </tr>
                                    </thead>
                                    
                                    <tr>
                                        <?php
                                        for($i=0;$i<$a;$i++){
                                            echo "<tr><td><b>".ucwords($alt_name[$i])."</b></td>";
                                            for($j=0;$j<$k;$j++){
                                                $nor[$i][$j] = round(($alt[$i][$j] / $pembagi[$j]),4);
                                                echo "<td>".$nor[$i][$j]."</td>";
                                            }
                                            echo "</tr>";
                                        }
                                        ?>

                                    </tr>
                                    

                                </table>





                            </div>

                              </div>

                              <div class="tab-pane container fade" id="menu1">
                                <hr>
                                <h3 class="page-head-line">MATRIX NORMALISASI TERBOBOT</h3>
                                <hr>


                                    <div class="table-responsive">
                              

                                <table class="table table-striped table-bordered table-hover">

                                    <thead>
                                        <tr><th>Alternatif / Kriteria</th>

                                        <?php
                                        for($i=1;$i<=$k;$i++){
                                            echo "<th>".ucwords($kri[$i])."</th>";
                                            
                                        }
                                        ?>
                                        </tr>
                                    </thead>
                                    
                                    <tr>
                                        <?php
                                        for($i=0;$i<$a;$i++){
                                            echo "<tr><td><b>".ucwords($alt_name[$i])."</b></td>";
                                            for($j=0;$j<$k;$j++){
                                                $bob[$i][$j] = round(($nor[$i][$j] * $kep[$j]),4);
                                                echo "<td>".$bob[$i][$j]."</td>";
                                            }
                                            echo "</tr>";
                                        }
                                        ?>

                                    </tr>
                                    

                                </table>





                            </div>

                              </div>

                              <div class="tab-pane container fade" id="menu2">
                                <hr>
                                <h3 class="page-head-line">Min Max Berdasarkan Cost Benefit Kriteria</h3>
                                <hr>

                                <div class="table-responsive">
                              

                                <table class="table table-striped table-bordered table-hover">

                                    <thead>
                                        <tr><th>#</th>

                                        <?php
                                        for($i=1;$i<=$k;$i++){
                                            echo "<th>".ucwords($kri[$i])."</th>";
                                            
                                        }
                                        ?>
                                        </tr>
                                    </thead>
                                    
                                    <tr><td><b>A+</b></td>

                                    <?php
                                    
                                        for($i=0;$i<$k;$i++){
                                            for($j=0;$j<$a;$j++){
                                                $temp[$j] = $bob[$j][$i];
                                            }
                                            if($cb[$i]=='benefit')
                                                $aplus[$i] = max($temp);
                                            if($cb[$i]=='cost')
                                                $aplus[$i] = min($temp);
                                            echo "<td>".$aplus[$i]."</td>";
                                        }
                                                                        
                                    ?>

                                    </tr>

                                    <tr><td><b>A-</b></td>

                                    <?php
                                    
                                        for($i=0;$i<$k;$i++){
                                            for($j=0;$j<$a;$j++){
                                                $temp[$j] = $bob[$j][$i];
                                            }
                                            if($cb[$i]=='benefit')
                                                $amin[$i] = min($temp);
                                            if($cb[$i]=='cost')
                                                $amin[$i] = max($temp);
                                            echo "<td>".$amin[$i]."</td>";
                                        }
                                                                        
                                    ?>

                                    </tr>


                                </table>


                                <table class="table table-striped table-bordered table-hover">

                                    <thead><tr><th>#</th><th>D+</th><th>D-</th></tr></thead>
                                    
                                    
                                    <?php
                                    
                                        for($i=0;$i<$a;$i++){
                                            echo "<tr><td><b>".ucwords($alt_name[$i])."</b></td>";
                                            $dplus[$i] = 0;
                                            for($j=0;$j<$k;$j++){
                                                $dplus[$i] = $dplus[$i] + pow(($aplus[$j] - $bob[$i][$j]),2);
                                            }
                                            $dplus[$i] = round(sqrt($dplus[$i]),4);
                                            echo "<td>".$dplus[$i]."</td>";
                                            $dmin[$i] = 0;
                                            for($j=0;$j<$k;$j++){
                                                $dmin[$i] = $dmin[$i] + pow(($amin[$j] - $bob[$i][$j]),2);
                                            }
                                            $dmin[$i] = round(sqrt($dmin[$i]),4);
                                            echo "<td>".$dmin[$i]."</td>";echo "</tr>";
                                        }
                                                                        
                                    ?>

                                    </tr>

                                    

                                    


                                </table>


                            </div>

                              </div>
                              <div class="tab-pane container fade" id="menu3">
                                <hr>
                                <h3 class="page-head-line">Preferensi</h3>
                                <hr>

                                <?php

                                    echo "<table class='table table-striped table-bordered table-hover'>";
                                    echo "<thead><tr><th></th><th>V</th></tr></thead>";
                                    for($i=0;$i<$a;$i++){
                                        echo "<tr><td><b>".ucwords($alt_name[$i])."</b></td>";
                                        $v[$i][0] = round(($dmin[$i] / ($dplus[$i]+$dmin[$i])),4);
                                        $v[$i][1] = $alt_name[$i];
                                        echo "<td>".$v[$i][0]."</td>";
                                    }
                                    echo "</table><hr>";
                                    usort($v, "cmp");
                                    $i = 0;
                                    while (list($key, $value) = each($v)) {
                                        $hsl[$i] = array($value[1],$value[0]); 
                                        $i++;
                                    }
                                    // ======================================================================== //
                                    echo "<b>Hasil Akhir Analisa</b></br>";
                                    echo "Berikut ini hasil analisa diurutkan berdasarkan hasil nilai tertinggi. </br>Jadi dapat disimpulkan bahwa Alternatif terbaik adalah <b>".ucwords(($hsl[0][0]))."</b> dengan nilai <b>".$hsl[0][1]."</b>.";
                                    echo "<table class='table table-striped table-bordered table-hover'>";
                                    echo "<thead><tr><th>No.</th><th>Alternatif</th><th>Hasil Akhir</th></tr></thead>";
                                    echo "<tbody>";
                                    for($i=0;$i<$a;$i++){
                                        echo "<tr><td>".($i+1).".</td><td>".ucwords(($hsl[$i][0]))."</td><td>".$hsl[$i][1]."</td></tr>";
                                    }
                                    echo "</tbody></table><hr>";
                                    
                                    ?>


                              </div>
                            </div>


                            </div>
                        </div>
                    </div>
          
        </div>
      </div>
    </div>

                            
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>


<?php
include 'footer.php';
?>