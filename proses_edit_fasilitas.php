<?php

include("koneksi.php");

//proses edit resto
	$id_fasilitas= $_POST['id_fasilitas'];
	$nama_fasilitas= $_POST['nama_fasilitas'];
	$url= $_FILES['url']['name'];
	//Cek Photo
if (empty($url)){
    $query1 = "UPDATE fasilitas SET nama_fasilitas='$nama_fasilitas',' WHERE id_fasilitas='$id_fasilitas'";
    $sql= mysql_query($query1);
    echo "<h3><font color=#8BB2D9><center><blink>Data Fasilitas Berhasil diedit</blink></center></font></h3>
			<input type='button' value='Back To View' onclick=location.href='fasilitas.php?id_fasilitas' title='kembali ke form lihat data'><br><br>";	
  }else{

		//upload Photo
		
		move_uploaded_file ($_FILES['url']['tmp_name'],"upload_foto/icon_fasilitas/".$url);
		
	
	//update
	$query = "UPDATE fasilitas SET nama_fasilitas='$nama_fasilitas',url='$url' WHERE id_fasilitas='$id_fasilitas'";
	$sql = mysql_query ($query);
	//setelah berhasil update
		echo "<h3><font color=#8BB2D9><center><blink>Data fasilitas Berhasil diedit</blink></center></font></h3>
			<input type='button' value='Back To View' onclick=location.href='fasilitas.php?id_fasilitas' title='kembali ke form lihat data'><br><br>";	
}
?>