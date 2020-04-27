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

                                    for($i=0;$i<$k;$i++){
                                            $pembagi[$i] = 0;
                                            for($j=0;$j<$a;$j++){
                                                $pembagi[$i] = $pembagi[$i] + pow($alt[$j][$i],2);
                                            }
                                            $pembagi[$i] = round(sqrt($pembagi[$i]),4);
                                            
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