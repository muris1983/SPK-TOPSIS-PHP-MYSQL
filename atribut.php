<?php

ini_set("display_errors","Off");
include "header.php";
include "menu.php";

include("../connect.php");

?>

<div class="content-wrapper">
        <div class="container">
              <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">DATA ATRIBUT </h1>
                    </div>
                </div>
                <div class="row">

                    <div class="panel-body">
                            <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                              + TAMBAH DATA ATRIBUT
                            </button>
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title" id="myModalLabel">Tambah Data Atribut</h4>
                                        </div>
                                        <div class="modal-body">
                                        
 <form action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label>Atribut</label>
    <input type="text" class="form-control" name="atribut"/>
  </div>
  <div class="form-group">
    <input class="btn btn-default" type="submit" value="Simpan" />
  </div>
  
</form>


                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    
                </div>

                <?php
                                      

                                      $atribut=$_POST['atribut'];
                                      

                                      if(isset($atribut)){
                                        if((!$atribut)){
                                        print "<script>alert ('Harap semua data diisi...!!');</script>";
                                        print"<script> self.history.back('Gagal Menyimpan');</script>"; 
                                        exit();
                                        } 

                                     
                                      $add_kelas="INSERT INTO atribut(nama_atribut) VALUES 
                                      ('$atribut')";
                                      mysql_query($add_kelas,$koneksi);
                                      } 

                                ?>

                <div class="panel panel-default">
                        <div class="panel-heading">
                            List Data Atribut
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Atribut</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php

                                        $sql=mysql_query("SELECT * FROM atribut ORDER BY id_atribut DESC");

                                        $no=1;

                                        while ($row=mysql_fetch_array($sql)){?>

                                          <tr class='td' bgcolor='#FFF'>

                                            <td><?php echo $no;?></td>
                                            <td><?php echo $row['nama_atribut'];?></td>

                                        <?php

                                              
                                              print("
                                                <td>

                                                <a class='btn btn-warning' href=editatribut.php?idk=$row[id_atribut]>
                                                Ubah
                                                </a>
                                                <a class='btn btn-danger' href=javascript:KonfirmasiHapus('deleteatribut.php?idk','$row[id_atribut]')>
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






<?php
	include "footer.php";
?>


