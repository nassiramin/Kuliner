

<?php

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
	//Jika Validasi Terpenuhi
	else {
	//buka koneksi ke engine MySQL
	$Open = mysql_connect("localhost","root","");
		if (!$Open){
		die ("Koneksi ke Engine MySQL Gagal !<br>");
		}
		else{
		print ("Engine Connected<br>");
		}
	//koneksi ke database
	$koneksiDB = mysql_select_db("kuliner");
		if (!$koneksiDB){
		die ("Koneksi ke Database Gagal !");
		}
		else{
		print ("Database Connected<br><br>");
		}



$cek=mysql_num_rows (mysql_query("SELECT id_tempat FROM tempat WHERE id_tempat='$_POST[id_tempat]'"));
if ($cek > 0) {
?>
		<script language="JavaScript">
		alert('ID sudah dipakai !, silahkan diulang kembali');
	document.location='tambah_resto.php?id';
		</script>
<?php
}
//Masukan data ke Table Karyawan
$input	= "INSERT INTO tempat (id_tempat,nama_tempat,alamat,no_telp,deskripsi,id_kategori_tempat,url,open_time,close_time,lat,lng)
	VALUES ('$id_tempat','$nama_tempat','$alamat','$no_telp','$deskripsi','$id_kategori_tempat','$url','$open_time','$close_time','$lat','$lng')" ;
$query_input =mysql_query($input);
	if ($query_input) {
	//Jika Sukses
?>
		<script language="JavaScript">
		alert('Data Resto Berhasil diinput');
		document.location='data.php?id';
		</script>
<?php
	}
	else {
	//Jika Gagal
	echo "Resto Gagal ditambah" ;
	
	}
//Tutup koneksi engine MySQL
	mysql_close($Open);
	}

?>











