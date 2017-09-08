<?php

include("koneksi.php");

if( isset($_GET['id_tempat']) ){

	// ambil id dari query string
	$id_tempat = $_GET['id_tempat'];

	// buat query hapus
	$sql = "DELETE FROM tbl_tempat WHERE id_tempat=$id_tempat";
	$query = mysql_query($sql,$koneksi);

	// apakah query hapus berhasil?
	if( $query ){
		header('Location: data.php');
	} else {
		die("gagal menghapus...");
	}

} else {
	die("akses dilarang...");
}

?>