<?php

include("koneksi.php");

if( isset($_GET['id_kategori_tempat']) ){

	// ambil id dari query string
	$id_kategori_tempat = $_GET['id_kategori_tempat'];

	// buat query hapus
	$sql = "DELETE FROM kategori_tempat WHERE id_kategori_tempat=$id_kategori_tempat";
	$query = mysql_query($sql,$koneksi);

	// apakah query hapus berhasil?
	if( $query ){
		header('Location: kategori.php');
	} else {
		die("gagal menghapus...");
	}

} else {
	die("akses dilarang...");
}

?>