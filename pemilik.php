<?php
  include "header.php";
include "menu.php";
  ini_set("display_errors","Off");
  include("connect.php");
?>


<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">PEMILIK KOS</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Data Pemilik Kos</li>
                        </ol>
                    </div>
                   
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-block">
                  <p align="left"><a class='btn btn-primary' href="tambahpemilik.php">Tambah Data Pemilik</a></p>              
                 <div class="table-responsive">               
                <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Pemilik</th>
                                            <th>Nama Kos</th>
                                            <th>No. Telepon</th>
                                            <th>Foto</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php

                                        $sql=mysql_query("SELECT * FROM pemilik ORDER BY id_pemilik DESC");

                                        $no=1;

                                        while ($row=mysql_fetch_array($sql)){?>

                                          <tr class='td' bgcolor='#FFF'>

                                            <td><?php echo $no;?></td>
                                            <td><?php echo $row['nama'];?></td>
                                            <td><?php echo $row['nama_kos'];?></td>
                                            <td><?php echo $row['telepon'];?></td>
                                            <td>
                                              <?php 

                                              if (empty($row['foto'])){
                                                echo '<img src="images/user.png" width="50">'; 
                                              } else {
                                                echo '<img src="images/pemilik/'.$row['foto'].'" width="50">'; 
                                              }
                                                
                                              ?>
                                            </td>

                                        <?php

                                              
                                              print("
                                                <td>
                                                <a class='btn btn-warning' href=editpemilik.php?idk=$row[id_pemilik]>
                                                Ubah
                                                </a>
                                                <a class='btn btn-danger' href=javascript:KonfirmasiHapus('deletepemilik.php?idk','$row[id_pemilik]')>
                                                Hapus
                                                </a>
                                                <a class='btn btn-primary' href=inputkamaradmin.php?idk=$row[id_pemilik]>
                                                Tambah Kamar Kos
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