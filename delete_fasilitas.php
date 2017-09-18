<?php

include("koneksi.php");

if( isset($_GET['id_fasilitas']) ){

	// ambil id dari query string
	$id_fasilitas = $_GET['id_fasilitas'];

	// buat query hapus
	$sql = "DELETE FROM fasilitas WHERE id_fasilitas=$id_fasilitas";
	$query = mysql_query($sql,$koneksi);

	// apakah query hapus berhasil?
	if( $query ){
		header('Location: fasilitas.php');
	} else {
		die("gagal menghapus...");
	}

} else {
	die("akses dilarang...");
}

?>