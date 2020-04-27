<?php
	session_start();
	$user=$_SESSION['username'];
	if (!isset($_SESSION['username'])){
		header("Location:./login.php");
	}
	include("connect.php");
	$id=$_GET['idk'];
	
	$delete_kelas="DELETE FROM pemilik WHERE id_pemilik='$id'";
	mysql_query($delete_kelas,$koneksi);
	header("Location:./pemilik.php");
?>