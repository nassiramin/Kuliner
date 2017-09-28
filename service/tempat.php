<?php
include "../koneksi.php";
 	
	$id_tempat= $_POST['id_tempat'];
	$query = mysql_query("SELECT * FROM tempat where id_kategori_tempat='$id_tempat'");
	// $sql = mysql_query($query);
	$obj= new stdClass();
	if (mysql_num_rows($query)>0)
	{
		$json = array();
		while($row = mysql_fetch_object($query)){
			array_push($json, $row);
		}
		$obj->status=true;
		$obj->pesan="sukses";
		$obj->data=$json;
	}
	else{
		$obj->status=false;
		$obj->pesan="load data gagal";
	}

	echo json_encode($obj);
	
	
	mysql_close($koneksi);

?>