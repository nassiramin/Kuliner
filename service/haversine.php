<?php
	include "../koneksi.php";

	$lat = $_POST['lat'];
	$lng = $_POST['lng'];

	// perhitungan haversine formula pada sintak SQL
	$query = mysql_query("SELECT * ,
		(6371 * ACOS(SIN(RADIANS(lat)) * SIN(RADIANS($lat)) + COS(RADIANS(lng - $lng)) * COS(RADIANS(lat)) * COS(RADIANS($lat))))
		AS jarak FROM tempat HAVING jarak < 6371 ORDER BY jarak ASC");

		$obj = new stdClass();
		$tmpObj = new stdClass();
		$json = array();

		$no = 0;

		if (mysql_num_rows($query) > 0)
		{
			// while($row = mysql_fetch_assoc($query)){
				// $json[$no]['id_tempat'] = $row['id_tempat'];
				// $json[$no]['nama_tempat'] = $row['nama_tempat'];
				// $json[$no]['url'] = $row['url'];
				// $json[$no]['jarak'] = $row['jarak'];
			//
			// 	$no++;
			// }

			while($row = mysql_fetch_object($query)){
				$id= $row->id_tempat;
				$queryJumlahReview = mysql_query("SELECT * FROM review where id_tempat='$id'");
				$jumReview= mysql_num_rows($queryJumlahReview);
				$row->jumlah_review=$jumReview;
				array_push($json, $row);
			}

			$tmpObj->list = $json;

			$obj->status= true;
			$obj->pesan= "sukses";
			$obj->data= $tmpObj;
		}else{
			$obj->status= false;
			$obj->pesan= "load data gagal";
			$obj->data= null;
		}
		echo json_encode($obj);
		echo mysql_error();

		mysql_close($koneksi);
?>
