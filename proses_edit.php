<?php

include("koneksi.php");

//proses edit resto
	$id_tempat= $_POST['id_tempat'];
	$nama= $_POST['nama'];
	$alamat_tempat	= $_POST['alamat_tempat'];
	$deskripsi_tempat	= $_POST['deskripsi_tempat'];
	$no_tempat	= $_POST['no_tempat'];
	$id_kategori = $_POST ['id_kategori'];
	$open_time= $_POST['open_time'];
	$close_time= $_POST['close_time'];
	$lat= $_POST['lat'];
	$lng= $_POST['lng'];
	$wifi=$_POST['wifi'];
	$smoking=$_POST['smoking'];
	$happy_hours=$_POST['happy_hours'];
	$live_musik=$_POST['live_musik'];
	$rooftop=$_POST['rooftop'];
	$outdoor=$_POST['outdoor'];
	$gambar= $_FILES['gambar']['name'];
	//Cek Photo
if (empty($gambar)){
    $query1 = "UPDATE tbl_tempat SET nama='$nama', alamat_tempat='$alamat_tempat', deskripsi_tempat='$deskripsi_tempat', no_tempat='$no_tempat', id_kategori='$id_kategori', open_time='$open_time', close_time='$close_time',lat='$lat',lng='$lng', wifi='$wifi', smoking='$smoking',happy_hours='$happy_hours',live_musik='$live_musik',rooftop='$rooftop',outdoor='$outdoor' WHERE id_tempat='$id_tempat'";
    $sql= mysql_query($query1);
    echo "<h3><font color=#8BB2D9><center><blink>Data Resto Berhasil diedit</blink></center></font></h3>
			<input type='button' value='Back To View' onclick=location.href='data.php?id_tempat' title='kembali ke form lihat data'><br><br>";	
  }else{

		//upload Photo
		
		move_uploaded_file ($_FILES['gambar']['tmp_name'],"upload_foto/".$gambar);
		
	
	//update
	$query = "UPDATE tbl_tempat SET nama='$nama', alamat_tempat='$alamat_tempat', deskripsi_tempat='$deskripsi_tempat', no_tempat='$no_tempat', id_kategori='$id_kategori', open_time='$open_time', close_time='$close_time',lat='$lat',lng='$lng', wifi='$wifi', smoking='$smoking',happy_hours='$happy_hours',live_musik='$live_musik',rooftop='$rooftop',outdoor='$outdoor',gambar='$gambar' WHERE id_tempat='$id_tempat'";
	$sql = mysql_query ($query);
	//setelah berhasil update
		echo "<h3><font color=#8BB2D9><center><blink>Data Resto Berhasil diedit</blink></center></font></h3>
			<input type='button' value='Back To View' onclick=location.href='data.php?id_tempat' title='kembali ke form lihat data'><br><br>";	
}
?>