   <?php 


include "koneksi.php";

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
	$id_harga= $_POST['id_harga'];
	$url= $_FILES['url']['name'];



	if (strlen($url)>0) {
		//upload Photo
		if (is_uploaded_file($_FILES['url']['tmp_name'])) {
			move_uploaded_file ($_FILES['url']['tmp_name'],"upload_foto/".$url);
		}
	}

 if (empty($_POST['id_tempat'])|| empty($_POST['nama_tempat'])) {
?>
	<script language="JavaScript">
		alert('Data Harap Dilengkapi');
	</script>
<?php

 }
 else
 {
 // save the data to the database
 mysql_query("INSERT INTO tempat (nama_tempat,alamat,no_telp,deskripsi,id_kategori_tempat,url,open_time,close_time,lat,lng,id_harga)
	VALUES ('$nama_tempat','$alamat','$no_telp','$deskripsi','$id_kategori_tempat','$url','$open_time','$close_time','$lat','$lng','$id_harga') ");


 $id_tempat = mysql_insert_id();
 $fasilitas=$_POST['fasilitas'];
 


	 if(count($fasilitas) > 0)
			{
			 $total_fasilitas = implode(",", $fasilitas);
			}

 foreach( $fasilitas as $v )
{
   mysql_query("INSERT INTO relasi_tempat_fasilitas (id_tempat,id_fasilitas) VALUES( '$id_tempat', '$v' )");
}

 ?>
		<script language="JavaScript">
		alert('Data Resto Berhasil diinput');
		document.location='data.php?id';
		</script>
<?php
 }



?>



