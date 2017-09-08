<?php 
	include "koneksi.php";
	
	$lat = $_GET['lat'];
	$lng = $_GET['lng'];	
	
	// sesuaikan ip/laptop atau ip emulator bawaan andorid studio 10.0.2.2
	$url = "http://192.168.181.2/Kuliner/upload_foto/";
	
	// perhitungan haversine formula pada sintak SQL
	$query = mysql_query("SELECT id_tempat, nama, gambar, (6371 * ACOS(SIN(RADIANS(lat)) * SIN(RADIANS($lat)) + COS(RADIANS(lng - $lng)) * COS(RADIANS(lat)) * COS(RADIANS($lat)))) AS jarak FROM tbl_tempat HAVING jarak < 6371 ORDER BY jarak ASC");
	
	$json = array();
	
	$no = 0;
	
	while($row = mysql_fetch_assoc($query)){
		$json[$no]['id_tempat'] = $row['id_tempat'];
		$json[$no]['nama'] = $row['nama'];
		$json[$no]['gambar'] = $url.$row['gambar'];
		$json[$no]['jarak'] = $row['jarak'];
		
		$no++;
	}
	
	echo json_encode($json);
	echo mysql_error();
	
	mysql_close($koneksi);
	
?>