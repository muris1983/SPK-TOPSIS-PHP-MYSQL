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
                        <h3 class="text-themecolor m-b-0 m-t-0">DATA PEMAKAI SISTEM</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">User List</li>
                        </ol>
                    </div>
                   
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-block">
                  
                  
                                <div class="table-responsive">
                                <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Username</th>
                                            <th>Nama Lengkap</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                            <?php

                                            $sql=mysql_query("SELECT * FROM login ORDER BY user DESC");

                                            $no=1;

                                            while ($row=mysql_fetch_array($sql)){?>

                                              <tr class='td' bgcolor='#FFF'>

                                                <td><?php echo $no;?></td>
                                                <td><?php echo $row['user'];?></td>
                                                <td><?php echo $row['nama'];?></td>
                                                <td><?php echo $row['status'];?></td>

                                            <?php

                                                  
                                                  print("
                                                    <td>

                                                    <a class='btn btn-warning' href=edituser.php?idk=$row[user]>
                                                Ubah
                                                </a>
                                                <a class='btn btn-danger' href=javascript:KonfirmasiHapus('deleteuser.php?idk','$row[user]')>
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

    