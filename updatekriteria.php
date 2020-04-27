<?php
	session_start();
	$user=$_SESSION['username'];
	if (!isset($_SESSION['username'])){
		header("Location:./login.php");
	}

	include("../connect.php");

	$id=$_POST['id'];
	$nama=$_POST['nama_kriteria'];
    $atribut=$_POST['atribut'];
    $nilai=$_POST['nilai'];

	$edit_kelas="UPDATE kriteria SET nama_kriteria='$nama',atribut='$atribut',bobot_nilai='$nilai' 
	WHERE id_kriteria='$id'";
	mysql_query($edit_kelas,$koneksi);
	header("Location:./kriteria.php");
	
?>