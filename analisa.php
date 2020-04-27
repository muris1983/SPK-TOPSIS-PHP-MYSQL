<?php
  include "header.php";
  ini_set("display_errors","Off");
  include("connect.php");
?>

    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h1 class="mt-5">DATA ANALISA</h1>

          <p align="left"><a class='btn btn-primary' href="tambahanalisa.php">Tambah Data Analisa</a></p>
          
          
          <div class="panel panel-default">
                        
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="datatable" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Kriteria</th>
                                            <th>Nama Kos</th>
                                            <th>Bobot Nilai</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php

                                        $sql=mysql_query("SELECT * FROM kriteria,pemilik,analisa WHERE kriteria.id_kriteria = analisa.id_kriteria AND pemilik.id_pemilik = analisa.id_pemilik
                                            ORDER BY analisa.id_analisa DESC");

                                        $no=1;

                                        while ($row=mysql_fetch_array($sql)){?>

                                          <tr class='td' bgcolor='#FFF'>

                                            <td><?php echo $no;?></td>
                                            <td><?php echo $row['nama_kriteria'];?></td>
                                            <td><?php echo $row['nama_kos'];?></td>
                                            <td><?php echo $row['nilainya'];?></td>

                                        <?php

                                              
                                              print("
                                                <td>

                                                <a class='btn btn-warning' href=editanalisa.php?idk=$row[id_analisa]>
                                                Ubah
                                                </a>
                                                <a class='btn btn-danger' href=javascript:KonfirmasiHapus('deleteanalisa.php?idk','$row[id_analisa]')>
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