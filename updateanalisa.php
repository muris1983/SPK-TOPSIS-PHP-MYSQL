<?php
	session_start();
	$user=$_SESSION['username'];
	if (!isset($_SESSION['username'])){
		header("Location:./login.php");
	}

	include("../connect.php");

	$id=$_POST['id'];
	$nama=$_POST['kriteria'];
    $nama_kos=$_POST['nama_kos'];
    $nilai=$_POST['nilainya'];

	$edit_kelas="UPDATE analisa SET id_kriteria='$nama',id_pemilik='$nama_kos',nilainya='$nilai' 
	WHERE id_analisa='$id'";
	mysql_query($edit_kelas,$koneksi);
	header("Location:./analisa.php");
	
?>