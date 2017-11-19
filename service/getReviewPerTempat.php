<?php
    error_reporting(0);
    include "../koneksi.php";
    $idTempat = $_POST["id_tempat"];

	$query = mysql_query("SELECT t.url, t.nama_user, r.id_user, r.id_tempat, r.isi, r.suka, r.rating_tempat
                    FROM review r
                    JOIN users t ON t.id_user = r.id_user
                    WHERE r.id_tempat = '$idTempat'") or die(mysql_error());
	// $sql = mysql_query($query);
	$obj= new stdClass();
	if (mysql_num_rows($query)>0)
	{
		$json = array();
		while($row = mysql_fetch_object($query)){
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
		$obj->pesan="Belum ada review";
        $obj->data = new stdClass();
	}

	echo json_encode($obj);


	mysql_close($koneksi);

?>