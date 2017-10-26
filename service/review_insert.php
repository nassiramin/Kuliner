
<?php
error_reporting(0);
include "../koneksi.php";
 	
	$id_user= $_POST['id_user'];
	$id_tempat	= $_POST['id_tempat'];
	$isi	= $_POST['isi'];
	$suka	= $_POST['suka'];
	$rating_tempat	= $_POST['rating_tempat'];
	
	$query = mysql_query("INSERT INTO review (id_user,id_tempat,isi,suka,rating_tempat) VALUES('$id_user',
		'$id_tempat','$isi','$suka','$rating_tempat')");
	// $sql = mysql_query($query);
	$obj= new stdClass();
	if ($query)
	{
		
		$Q= mysql_query("SELECT rating FROM tempat WHERE id_tempat='$id_tempat'") or die(mysql_error());
		while($row = mysql_fetch_assoc($Q)) 
		{ 
    		$rating=($row["rating"]+$rating_tempat)/2; 
    		$v= mysql_query("UPDATE tempat SET rating='$rating' WHERE id_tempat='$id_tempat' "); 
    		if ($v){
    				$obj->status=true;
					$obj->pesan="sukses";
    		}
    		else{
				$obj->status=false;
				$obj->pesan="load data gagal";
			}
		} 

		
	}
	else{
		$obj->status=false;
		$obj->pesan="load data gagal";
	}

	echo json_encode($obj);
	
	
	mysql_close($koneksi);

?>
