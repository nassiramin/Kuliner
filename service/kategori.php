<?php
include "../koneksi.php";
 	
	
	$query = mysql_query("SELECT * from kategori_tempat");
	// $sql = mysql_query($query);
	$obj= new stdClass();
	if (mysql_num_rows($query)>0)
	{
		$json = array();
		while($row = mysql_fetch_object($query)){
			$tmpGambar = $row->url;
			$row->url = "http://192.168.56.1/kuliner/upload_foto/kategori_tempat/" . $tmpGambar;
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