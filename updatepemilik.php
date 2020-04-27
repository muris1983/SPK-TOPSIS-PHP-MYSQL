<?php
	session_start();
	$user=$_SESSION['username'];
	if (!isset($_SESSION['username'])){
		header("Location:./login.php");
	}

	include("../connect.php");

	$id=$_POST['id'];
	$nama=$_POST['nama_pemilik'];
    $namakos=$_POST['nama_kos'];
    $telepon=$_POST['telepon'];
    $alamat=$_POST['alamat'];
	$lokasi_file = $_FILES['fupload']['tmp_name'];
    $nama_file   = $_FILES['fupload']['name'];

	$edit_kelas="UPDATE pemilik SET nama='$nama',nama_kos='$namakos',telepon='$telepon',alamat='$alamat',foto='nama_file' 
	WHERE id_pemilik='$id'";
	mysql_query($edit_kelas,$koneksi);
	header("Location:./pemilik.php");
	
?>