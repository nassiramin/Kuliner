<?php
include "../koneksi.php";
error_reporting(0);
 	
	$id_tempat= $_POST['id_tempat'];
	$query = mysql_query("SELECT * FROM tempat where id_kategori_tempat='$id_tempat'");
	// $sql = mysql_query($query);
	$obj= new stdClass();
	if (mysql_num_rows($query)>0)
	{
		$json = array();
		while($row = mysql_fetch_object($query)){
			$id= $row->id_tempat;
			$queryJumlahReview = mysql_query("SELECT * FROM review where id_tempat='$id'");
			$jumReview= mysql_num_rows($queryJumlahReview);
			$row->jumlah_review=$jumReview;
			array_push($json, $row);
		}
		$tmp = new stdClass();
		$tmp->list = $json;
		$obj->status=true;
		$obj->pesan="sukses";
		$obj->data=$tmp;
	}
	else{
		$obj->status=false;
		$obj->pesan="load data gagal";
	}

	echo json_encode($obj);
	
	
	mysql_close($koneksi);

?>