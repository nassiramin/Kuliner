<?php
include "../koneksi.php";
 	
	$id_review= $_POST['id_review'];
	$id_user= $_POST['id_user'];
	$id_tempat= $_POST['id_tempat'];
	$isi= $_POST['isi'];
	$suka= $_POST['suka'];
	$rating_tempat= $_POST['rating_tempat'];
	
	$query = mysql_query("UPDATE users SET nama_user='$nama_user', username='$username', password='$password' WHERE id_user='$id_user'") or die (mysql_error());
	$obj= new stdClass();
	if ($query) {
				$obj->status=true;
				$obj->pesan="sukses";
			}
		else{
			$obj->status=false;
			$obj->pesan="update data gagal";
		}

	echo json_encode($obj);
	
	
	mysql_close($koneksi);
	
?>

<?php
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
