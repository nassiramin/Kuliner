<?php

include("koneksi.php");

//proses edit resto
	$id_tempat= $_POST['id_tempat'];
	$nama_tempat= $_POST['nama_tempat'];
	$alamat	= $_POST['alamat'];
	$deskripsi	= $_POST['deskripsi'];
	$no_telp	= $_POST['no_telp'];
	$id_kategori_tempat = $_POST ['id_kategori_tempat'];
	$open_time= $_POST['open_time'];
	$close_time= $_POST['close_time'];
	$lat= $_POST['lat'];
	$lng= $_POST['lng'];
	$url= $_FILES['url']['name'];
	$id_harga= $_POST['id_harga'];
	//Cek Photo
if (empty($url)){
    $query1 = "UPDATE tempat SET nama_tempat='$nama_tempat', alamat='$alamat', deskripsi='$deskripsi', no_telp='$no_telp', id_kategori_tempat='$id_kategori_tempat', open_time='$open_time', close_time='$close_time',lat='$lat',lng='$lng', id_harga='$id_harga' WHERE id_tempat='$id_tempat'";
    $sql= mysql_query($query1);
    echo "<h3><font color=#8BB2D9><center><blink>Data Resto Berhasil diedit</blink></center></font></h3>
			<input type='button' value='Back To View' onclick=location.href='data.php?id_tempat' title='kembali ke form lihat data'><br><br>";	
  }else{

		//upload Photo
		
		move_uploaded_file ($_FILES['url']['tmp_name'],"upload_foto/".$url);
		
	
	//update
	$query = "UPDATE tempat SET nama_tempat='$nama_tempat', alamat='$alamat', deskripsi='$deskripsi', no_telp='$no_telp', id_kategori_tempat='$id_kategori_tempat', open_time='$open_time', close_time='$close_time',lat='$lat',lng='$lng', url='$url', id_harga='$id_harga' WHERE id_tempat='$id_tempat'";
	$sql = mysql_query ($query);
	//setelah berhasil update
		echo "<h3><font color=#8BB2D9><center><blink>Data Resto Berhasil diedit</blink></center></font></h3>
			<input type='button' value='Back To View' onclick=location.href='data.php?id_tempat' title='kembali ke form lihat data'><br><br>";	
}
?>