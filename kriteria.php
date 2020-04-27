<?php
  include "header.php";
include "menu.php";
  ini_set("display_errors","Off");
  include("connect.php");
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
                  
                  <p align="left"><a class='btn btn-primary' href="tambahkriteria.php">Tambah Data Kriteria</a></p>
                                <div class="table-responsive">
                                <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama kriteria</th>
                                            <th>Atribut</th>
                                            <th>Bobot Nilai</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php

                                        $sql=mysql_query("SELECT * FROM kriteria ORDER BY id_kriteria DESC");

                                        $no=1;

                                        while ($row=mysql_fetch_array($sql)){?>

                                          <tr class='td' bgcolor='#FFF'>

                                            <td><?php echo $no;?></td>
                                            <td><?php echo $row['nama_kriteria'];?></td>
                                            <td><?php echo $row['atribut'];?></td>
                                            <td><?php echo $row['bobot_nilai'];?></td>

                                        <?php

                                              
                                              print("
                                                <td>

                                                <a class='btn btn-warning' href=editkriteria.php?idk=$row[id_kriteria]>
                                                Ubah
                                                </a>
                                                <a class='btn btn-danger' href=javascript:KonfirmasiHapus('deletekriteria.php?idk','$row[id_kriteria]')>
                                                Hapus
                                                </a>
                                                </td>
                                              </tr>");
                                              

                                              $no++;

                                        ?>
                                        </tr>
                                        <?php }?>
                                        

                                    </tbody>
                                </table>
                            </div>
                  
                  
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
<script type="text/javascript">
            $(function() {
                $("#datatable").dataTable();
            });
        </script>    
    
<?php
  include "footer.php";
?>