<?php
include("connect.php");
include "header.php";
include "menu.php";
include "function.php";
?>

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
                                
                                
<div class="container">
      <div class="row">
        <div class="col-lg-12">

                                        <?php
                                        
                                            for($i=0;$i<$k;$i++){
                                                $pembagi[$i] = 0;
                                                for($j=0;$j<$a;$j++){
                                                    $pembagi[$i] = $pembagi[$i] + pow($alt[$j][$i],2);
                                                }
                                                $pembagi[$i] = round(sqrt($pembagi[$i]),4);
                                                
                                            }
                                                                            
                                        ?>

                                        <?php
                                        for($i=0;$i<$a;$i++){
                                            
                                            for($j=0;$j<$k;$j++){
                                                $nor[$i][$j] = round(($alt[$i][$j] / $pembagi[$j]),4);
                                                
                                            }
                                            
                                        }
                                        ?>

                                        <?php
                                        for($i=0;$i<$a;$i++){
                                            
                                            for($j=0;$j<$k;$j++){
                                                $bob[$i][$j] = round(($nor[$i][$j] * $kep[$j]),4);
                                                
                                            }
                                            
                                        }
                                        ?>

                                        <?php
                                    
                                        for($i=0;$i<$k;$i++){
                                            for($j=0;$j<$a;$j++){
                                                $temp[$j] = $bob[$j][$i];
                                            }
                                            if($cb[$i]=='benefit')
                                                $aplus[$i] = max($temp);
                                            if($cb[$i]=='cost')
                                                $aplus[$i] = min($temp);
                                            
                                        }
                                                                        
                                        ?>

                                        <?php
                                        
                                            for($i=0;$i<$k;$i++){
                                                for($j=0;$j<$a;$j++){
                                                    $temp[$j] = $bob[$j][$i];
                                                }
                                                if($cb[$i]=='benefit')
                                                    $amin[$i] = min($temp);
                                                if($cb[$i]=='cost')
                                                    $amin[$i] = max($temp);
                                                
                                            }
                                                                            
                                        ?>

                                        <?php
                                        
                                            for($i=0;$i<$a;$i++){
                                                
                                                $dplus[$i] = 0;
                                                for($j=0;$j<$k;$j++){
                                                    $dplus[$i] = $dplus[$i] + pow(($aplus[$j] - $bob[$i][$j]),2);
                                                }
                                                $dplus[$i] = round(sqrt($dplus[$i]),4);
                                                
                                                $dmin[$i] = 0;
                                                for($j=0;$j<$k;$j++){
                                                    $dmin[$i] = $dmin[$i] + pow(($amin[$j] - $bob[$i][$j]),2);
                                                }
                                                $dmin[$i] = round(sqrt($dmin[$i]),4);
                                                
                                            }
                                                                            
                                        ?>
                  
                                        <h1 class="mt-5">TOP RANGKING KOS TERBAIK</h1>

                                        <?php

                                   

                                    for($i=0;$i<$a;$i++){
                                        
                                        $v[$i][0] = round(($dmin[$i] / ($dplus[$i]+$dmin[$i])),4);
                                        $v[$i][1] = $alt_name[$i];
                                        
                                    }
                                    

                                    usort($v, "cmp");
                                    $i = 0;
                                    while (list($key, $value) = each($v)) {
                                        $hsl[$i] = array($value[1],$value[0]); 
                                        $i++;
                                    }
                                    // ======================================================================== //
                                    echo "<b>Hasil Akhir Analisa Metode Topsis Dengan Nilai bobot preferensi sebagai : W adalah = (5,4,3,3,2,2)</b></br>";
                                    echo "Jadi dapat disimpulkan bahwa Alternatif terbaik menggunakan metode topsis adalah <b>".ucwords(($hsl[0][0]))."</b> dengan nilai Metode Topsis <b>".$hsl[0][1]."</b>.<br><br>";
                                    echo "<table id='dataTable' class='display' style='width:100%''>";
                                    echo "<thead><tr>
                                    <th>Rangking</th>
                                    <th>Hunian Kos</th>
                                    <th>Hasil Nilai Metode Topsis</th>
                                    <th>Lihat Kos</th>
                                    </tr></thead>";
                                    echo "<tbody>";
                                    for($i=0;$i<$a;$i++){
                                        echo "<tr>
                                        <td>".($i+1).".</td>
                                        <td>".ucwords(($hsl[$i][0]))."</td>
                                        <td>".$hsl[$i][1]."</td>
                                        <td><a href='detailkamartopsis.php?idk=".ucwords(($hsl[$i][0]))."' class='btn btn-lg btn-outline-primary text-uppercase'>Lihat Kos</a></td>
                                        </tr>";
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
    

     
        <script type="text/javascript">
            $(function() {
                $("#dataTable").dataTable();
            });
        </script>