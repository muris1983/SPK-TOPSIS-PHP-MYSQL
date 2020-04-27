<?php
  include "header.php";
  ini_set("display_errors","Off");
  include("connect.php");
?>

    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h1 class="mt-5">DATA KAMAR KOS</h1>

          <p align="left"><a class='btn btn-primary' href="tambahkamar.php">Tambah Data Kamar</a></p>
          
          
          <div class="panel panel-default">
                        
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="dataTable" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Pemilik</th>
                                            <th>Nama Kos</th>
                                            <th>gambar1</th>
                                            <th>Deskripsi</th>
                                            <th>Fasilitas</th>
                                            <th>Harga</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php

                                        $sql=mysql_query("SELECT * FROM pemilik, kamar WHERE pemilik.id_pemilik = kamar.id_pemilik ORDER BY kamar.id_kamar DESC");

                                        $no=1;

                                        while ($row=mysql_fetch_array($sql)){?>

                                          <tr class='td' bgcolor='#FFF'>

                                            <td><?php echo $no;?></td>
                                            <td><?php echo $row['nama'];?></td>
                                            <td><?php echo $row['nama_kos'];?></td>
                                            <td><?php echo '<img src="images/kamar/'.$row['gambar1'].'" width="80">'; ?></td>
                                            <td><?php echo substr($row['deskripsi'], 0,20);?></td>
                                            <td><?php echo substr($row['fasilitas'], 0,20);?></td>
                                            <td>Rp. <?php echo number_format($row['harga'],2,",",".");?></td>

                                        <?php

                                              
                                              print("
                                                <td>

                                                <a class='btn btn-warning' href=editkamar.php?idk=$row[id_kamar]>
                                                Ubah
                                                </a>
                                                <a class='btn btn-danger' href=javascript:KonfirmasiHapus('deletekamar.php?idk','$row[id_kamar]')>
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
 <script src="js/jquery-1.11.0.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="datatables/jquery.dataTables.js"></script>
        <script src="datatables/dataTables.bootstrap.js"></script>
        <script type="text/javascript">
            $(function() {
                $("#dataTable").dataTable();
            });
        </script>