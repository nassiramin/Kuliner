<?php
error_reporting(0);
include "../koneksi.php";
 	
	$id_tempat= $_POST['id_tempat'];
	$query = mysql_query("SELECT * from tempat Where id_tempat='$id_tempat'");
	// $sql = mysql_query($query);
	$obj= new stdClass();
	if (mysql_num_rows($query)>0)
	{
		$row = mysql_fetch_object($query);
		

		$obj->status=true;
		$obj->pesan="sukses";
		$obj->data=$row;
	}
	else{
		$obj->status=false;
		$obj->pesan="load data gagal";
	}

	echo json_encode($obj);
	
	
	mysql_close($koneksi);

?>