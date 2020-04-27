<?php
  include "header.php";
  ini_set("display_errors","Off");
  include("connect.php");
?>

    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h1 class="mt-5">DATA KRITERIA KENYAMANAN</h1>

          <p align="left"><a class='btn btn-primary' href="tambahkenyamanan.php">Tambah Data Kriteria Kenyamanan</a></p>
          
          
          <div class="panel panel-default">
                        
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="datatable" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Kos</th>
                                            <th>Kriteria Kenyamanan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php

                                        $sql=mysql_query("SELECT * 
                                                            FROM kenyamanankos
                                                            LEFT JOIN kenyamanan ON kenyamanan.id_kenyamanan = kenyamanankos.id_kenyamanan
                                                            LEFT JOIN kamar ON kamar.id_kamar = kenyamanankos.id_kamar
                                                            LEFT JOIN pemilik ON kamar.id_pemilik = pemilik.id_pemilik
                                                        ");

                                        $no=1;

                                        while ($row=mysql_fetch_array($sql)){?>

                                          <tr class='td' bgcolor='#FFF'>

                                            <td><?php echo $no;?></td>
                                            <td><?php echo $row['nama_kos'];?></td>
                                            <td><?php echo $row['kenyamanannya'];?></td>

                                        <?php

                                              
                                              print("
                                                <td>
                                                <a class='btn btn-warning' href=editkenyamanan.php?idk=$row[id_kenyamanankos]>
                                                Ubah
                                                </a>
                                                <a class='btn btn-danger' href=javascript:KonfirmasiHapus('deletekenyamanan.php?idk','$row[id_kenyamanankos]')>
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
                $("#datatable").dataTable();
            });
        </script>